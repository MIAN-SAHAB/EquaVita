# EquaVita Home Watch

EquaVita Home Watch is a highly secure, enterprise-grade application for generating legally defensible "Insurance Proof Packs" for homeowners with vacant properties.

## Tech Stack
- **Backend**: Laravel 11 (PHP 8.3+)
- **Frontend/PWA**: React with TypeScript and Vite
- **Styling**: Bootstrap 5
- **Database**: MySQL 8.0 (Development: SQLite supported)
- **Authentication**: Laravel Sanctum (API) and Laravel Breeze (Web)
- **Queues**: Laravel Horizon with Redis
- **Storage**: AWS S3 (private storage with pre-signed URLs)

## Setup Instructions

Follow these steps to get the project running locally on your desktop:

### 1. Prerequisites
Ensure you have the following installed:
- PHP 8.3+
- Composer
- Node.js & npm

### 2. Installation

```bash
# Install PHP dependencies
composer install

# Install JS dependencies
npm install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 3. Database Setup

The project is configured to use MySQL 8.0 in production, but you can use SQLite for local development.

```bash
# Create SQLite database (if using sqlite)
touch database/database.sqlite

# Run migrations and seed roles
php artisan migrate --seed
```

### 4. Running the Application

Start the Laravel development server and the Vite dev server:

```bash
# Run Laravel server
php artisan serve

# In a new terminal, run Vite
npm run dev
```

## Security Features
- **AES-256-GCM Encryption**: All sensitive fields (lockbox, alarm, emergency contacts, GPS, keys) are encrypted at rest.
- **Immutable Audit Logs**: The `audit_logs` table is append-only, enforced by database-level triggers.
- **RBAC**: 5 distinct roles (Super Administrator, Accountant, Field Worker, Client, Public Guest).
