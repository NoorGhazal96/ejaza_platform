# 🌴 Ejaza Platform | منصة إجازة

![Project Status](https://img.shields.io/badge/Status-In%20Development-orange)
![Tech Stack](https://img.shields.io/badge/PHP-Native-777BB4)
![Design](https://img.shields.io/badge/Design-Material%20Design%203-blue)
![Language](https://img.shields.io/badge/Lang-Ar%20%7C%20En-green)

**Ejaza Platform** is a modern, native PHP web application for booking chalets and resorts. It features a responsive **Material Design 3** interface, full multi-language support (RTL/LTR), and role-based dashboards for Admins, Property Owners, and Users.

منصة "إجازة" هي نظام لحجز الشاليهات والاستراحات، مبني بتقنيات الويب الأساسية مع واجهة عصرية تدعم العربية والإنجليزية والوضع الليلي.

---

## ✨ Key Features (المميزات الرئيسية)

* **🎨 Modern UI/UX:** Built from scratch using CSS Variables and Material Design 3 principles.
* **🌙 Dark/Light Mode:** Toggle themes instantly with local storage persistence.
* **🌍 Localization:** Complete support for Arabic (RTL) and English (LTR) via `config.php`.
* **👥 Role-Based Access:**
    * **Admin Panel:** Manage users, bookings, and site settings.
    * **Owner Portal:** Add chalets, manage availability, and view earnings.
    * **User Dashboard:** Browse listings, manage favorites, and booking history.
* **🔍 Smart Search:** Filter by location, date range (Flatpickr integration), and guest count.

---

## 📂 Folder Structure

```text
ejaza-platform/
├── admin/                  # Admin Dashboard & Logic
├── assets/                 # CSS (M3 Styles), JS, Images
├── includes/               # Config & Translations
├── owner/                  # Property Owner Dashboard
├── user/                   # User Dashboard
├── partials/               # Reusable Components (Header, Footer, Sidebar)
├── index.php               # Landing Page
├── search.php              # Search Results
├── chalet-details.php      # Property Details
└── ... (Auth pages)
