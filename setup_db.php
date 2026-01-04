<?php
/**
 * Database Setup Script
 * Creates SQLite database with all required tables
 * Run once: php setup_db.php
 */

$dbPath = __DIR__ . '/database.sqlite';

try {
    $pdo = new PDO('sqlite:' . $dbPath);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Creating database tables...\n";
    
    // Users table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            full_name TEXT NOT NULL,
            email TEXT UNIQUE NOT NULL,
            password TEXT NOT NULL,
            phone TEXT,
            role TEXT DEFAULT 'user' CHECK(role IN ('admin', 'owner', 'user')),
            status TEXT DEFAULT 'active' CHECK(status IN ('active', 'pending', 'suspended')),
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )
    ");
    echo "✓ Users table created\n";
    
    // Chalets table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS chalets (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            owner_id INTEGER NOT NULL,
            name_ar TEXT NOT NULL,
            name_en TEXT,
            description_ar TEXT,
            description_en TEXT,
            price REAL NOT NULL,
            location TEXT,
            area REAL,
            image_url TEXT,
            rating REAL DEFAULT 0,
            reviews_count INTEGER DEFAULT 0,
            status TEXT DEFAULT 'pending' CHECK(status IN ('active', 'pending', 'inactive')),
            has_pool INTEGER DEFAULT 0,
            has_wifi INTEGER DEFAULT 0,
            has_parking INTEGER DEFAULT 0,
            has_bbq INTEGER DEFAULT 0,
            has_ac INTEGER DEFAULT 0,
            checkin_time TEXT DEFAULT '14:00',
            checkout_time TEXT DEFAULT '12:00',
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (owner_id) REFERENCES users(id)
        )
    ");
    echo "✓ Chalets table created\n";
    
    // Bookings table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS bookings (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER NOT NULL,
            chalet_id INTEGER NOT NULL,
            check_in DATE NOT NULL,
            check_out DATE NOT NULL,
            guests INTEGER DEFAULT 1,
            total_price REAL NOT NULL,
            status TEXT DEFAULT 'pending' CHECK(status IN ('pending', 'confirmed', 'completed', 'cancelled')),
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES users(id),
            FOREIGN KEY (chalet_id) REFERENCES chalets(id)
        )
    ");
    echo "✓ Bookings table created\n";
    
    // Favorites table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS favorites (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER NOT NULL,
            chalet_id INTEGER NOT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            UNIQUE(user_id, chalet_id),
            FOREIGN KEY (user_id) REFERENCES users(id),
            FOREIGN KEY (chalet_id) REFERENCES chalets(id)
        )
    ");
    echo "✓ Favorites table created\n";
    
    // Check if admin already exists
    $stmt = $pdo->query("SELECT COUNT(*) FROM users WHERE role = 'admin'");
    $adminExists = $stmt->fetchColumn() > 0;
    
    if (!$adminExists) {
        // Insert test users
        $adminPassword = password_hash('admin123', PASSWORD_DEFAULT);
        $ownerPassword = password_hash('owner123', PASSWORD_DEFAULT);
        $userPassword = password_hash('user123', PASSWORD_DEFAULT);
        
        $pdo->exec("
            INSERT INTO users (full_name, email, password, phone, role, status) VALUES
            ('مدير النظام', 'admin@ejaza.com', '$adminPassword', '0500000001', 'admin', 'active'),
            ('محمد العقاري', 'owner@ejaza.com', '$ownerPassword', '0500000002', 'owner', 'active'),
            ('أحمد الضيف', 'user@ejaza.com', '$userPassword', '0500000003', 'user', 'active')
        ");
        echo "✓ Test users created\n";
        echo "  - Admin: admin@ejaza.com / admin123\n";
        echo "  - Owner: owner@ejaza.com / owner123\n";
        echo "  - User: user@ejaza.com / user123\n";
    }
    
    // Check if chalets exist
    $stmt = $pdo->query("SELECT COUNT(*) FROM chalets");
    $chaletsExist = $stmt->fetchColumn() > 0;
    
    if (!$chaletsExist) {
        // Get owner ID
        $stmt = $pdo->query("SELECT id FROM users WHERE role = 'owner' LIMIT 1");
        $ownerId = $stmt->fetchColumn();
        
        // Insert sample chalets
        $pdo->exec("
            INSERT INTO chalets (owner_id, name_ar, name_en, description_ar, description_en, price, location, area, rating, reviews_count, status, has_pool, has_wifi, has_parking, has_bbq, has_ac) VALUES
            ($ownerId, 'شاليه النسيم الفاخر', 'Al Naseem Luxury Chalet', 'شاليه فاخر مع مسبح خاص وإطلالة رائعة على البحر. يتميز بالخصوصية التامة والتصميم العصري.', 'Luxury chalet with private pool and stunning sea view. Features complete privacy and modern design.', 850, 'الرياض', 500, 4.8, 124, 'active', 1, 1, 1, 1, 1),
            ($ownerId, 'استراحة الواحة', 'Al Waha Resort', 'استراحة عائلية واسعة مع حديقة خضراء ومنطقة ألعاب للأطفال. مثالية للعائلات الكبيرة.', 'Spacious family resort with green garden and kids play area. Perfect for large families.', 650, 'جدة', 400, 4.5, 89, 'active', 1, 1, 1, 0, 1),
            ($ownerId, 'شاليه الصفا', 'Al Safa Chalet', 'شاليه هادئ في موقع مميز، قريب من جميع الخدمات. مثالي لقضاء عطلة نهاية الأسبوع.', 'Quiet chalet in prime location, close to all services. Ideal for weekend getaways.', 450, 'الدمام', 300, 4.2, 56, 'active', 0, 1, 1, 1, 1)
        ");
        echo "✓ Sample chalets created\n";
    }
    
    echo "\n✅ Database setup completed successfully!\n";
    echo "Database file: $dbPath\n";
    
} catch (PDOException $e) {
    die("❌ Database Error: " . $e->getMessage() . "\n");
}
?>
