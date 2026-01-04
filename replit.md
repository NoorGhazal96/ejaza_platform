# Ejaza Platform | منصة إجازة

A modern chalet and resort booking platform built with native PHP, featuring Material Design 3 interface with Arabic/English support.

## Overview
- **Purpose**: Chalet and resort booking platform
- **Stack**: Native PHP
- **UI**: Material Design 3, RTL/LTR support
- **Languages**: Arabic (default), English

## Project Structure
```
ejaza-platform/
├── admin/          # Admin dashboard pages
├── assets/         # CSS, JS, images
│   ├── css/        # Stylesheets
│   ├── js/         # JavaScript
│   └── img/        # Images
├── includes/       # Config, functions, headers
├── owner/          # Property owner dashboard
├── user/           # User dashboard
├── partials/       # Reusable components (header, footer, sidebar)
└── *.php           # Public pages (index, login, register, etc.)
```

## Running the Application
The application runs using PHP's built-in development server:
```bash
php -S 0.0.0.0:5000
```

## Key Features
- Multi-language support (AR/EN) with RTL/LTR
- Dark/Light mode toggle
- Role-based dashboards (Admin, Owner, User)
- Smart search with filters
- Booking management

## Configuration
- Language settings are in `includes/config.php`
- Translations are managed in the `$trans` array in config.php
