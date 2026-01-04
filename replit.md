# Ejaza Platform | منصة إجازة

A modern chalet and resort booking platform built with native PHP, featuring Material Design 3 interface with Arabic/English support.

## Overview
- **Purpose**: Chalet and resort booking platform
- **Stack**: Native PHP 8.4 with SQLite database
- **UI**: Material Design 3, RTL/LTR support
- **Languages**: Arabic (default), English

## Project Structure
```
ejaza-platform/
├── admin/          # Admin dashboard pages
├── assets/         # CSS, JS, images
│   ├── css/        # Stylesheets
│   ├── js/         # JavaScript
│   ├── img/        # Images
│   └── uploads/    # User uploaded images (protected)
├── includes/       # Config, functions, headers
│   ├── config.php  # Language settings, translations
│   ├── db_connect.php  # PDO database connection
│   └── functions.php   # Helper functions
├── owner/          # Property owner dashboard
├── user/           # User dashboard
├── partials/       # Reusable components (header, footer, sidebar)
├── database.sqlite # SQLite database file
├── setup_db.php    # Database initialization script
└── *.php           # Public pages (index, login, register, etc.)
```

## Running the Application
The application runs using PHP's built-in development server:
```bash
php -S 0.0.0.0:5000
```

## Database
- **Type**: SQLite (database.sqlite)
- **Tables**: users, chalets, bookings, favorites
- **Setup**: Run `php setup_db.php` to initialize/reset database

## Test Accounts
| Role  | Email             | Password |
|-------|-------------------|----------|
| Admin | admin@ejaza.com   | admin123 |
| Owner | owner@ejaza.com   | owner123 |
| User  | user@ejaza.com    | user123  |

## Key Features
- Multi-language support (AR/EN) with RTL/LTR
- Dark/Light mode toggle
- Role-based dashboards (Admin, Owner, User)
- Smart search with filters (location, price, amenities)
- Secure booking management
- Property owner chalet management with image upload
- User favorites and booking history

## Security
- Password hashing with bcrypt
- PDO prepared statements for SQL injection prevention
- CSRF protection on forms
- Secure image upload with MIME validation
- .htaccess protection on uploads directory

## Configuration
- Language settings are in `includes/config.php`
- Translations are managed in the `$trans` array in config.php
- Database path configured in `includes/db_connect.php`
