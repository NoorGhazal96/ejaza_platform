<?php
/**
 * Helper Functions
 * Note: formatPrice() and __() are defined in config.php
 */

if (!function_exists('isLoggedIn')) {
    function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }
}

if (!function_exists('getCurrentUser')) {
    function getCurrentUser() {
        if (!isLoggedIn()) return null;
        
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$_SESSION['user_id']]);
        return $stmt->fetch();
    }
}

if (!function_exists('requireLogin')) {
    function requireLogin() {
        if (!isLoggedIn()) {
            header('Location: /login.php');
            exit;
        }
    }
}

if (!function_exists('requireRole')) {
    function requireRole($role) {
        requireLogin();
        if ($_SESSION['user_role'] !== $role) {
            header('Location: /index.php');
            exit;
        }
    }
}

if (!function_exists('sanitize')) {
    function sanitize($data) {
        return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('generateBookingRef')) {
    function generateBookingRef() {
        return 'BK-' . strtoupper(substr(md5(uniqid()), 0, 6));
    }
}

if (!function_exists('calculateNights')) {
    function calculateNights($checkIn, $checkOut) {
        $date1 = new DateTime($checkIn);
        $date2 = new DateTime($checkOut);
        return $date2->diff($date1)->days;
    }
}

if (!function_exists('uploadImage')) {
    function uploadImage($file, $targetDir = 'assets/uploads/') {
        if (!isset($file['tmp_name']) || empty($file['tmp_name']) || $file['error'] !== UPLOAD_ERR_OK) {
            return null;
        }
        
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $allowedMimeTypes = [
            'image/jpeg' => ['jpg', 'jpeg'],
            'image/png' => ['png'],
            'image/gif' => ['gif'],
            'image/webp' => ['webp']
        ];
        
        $maxSize = 5 * 1024 * 1024;
        if ($file['size'] > $maxSize) {
            return false;
        }
        
        $originalExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if (!in_array($originalExtension, $allowedExtensions)) {
            return false;
        }
        
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $detectedMime = $finfo->file($file['tmp_name']);
        
        if (!array_key_exists($detectedMime, $allowedMimeTypes)) {
            return false;
        }
        
        if (!in_array($originalExtension, $allowedMimeTypes[$detectedMime])) {
            $originalExtension = $allowedMimeTypes[$detectedMime][0];
        }
        
        $safeFilename = uniqid('img_', true) . '.' . $originalExtension;
        $targetPath = $targetDir . $safeFilename;
        
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }
        
        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            return $targetPath;
        }
        
        return false;
    }
}
?>
