# Institute Management System - Installation Guide

Follow these steps to set up and run the specific project on a new computer.

## 1. Prerequisites
Before you begin, ensure the new computer has the following installed:
- **PHP** (Version 8.1 or higher)
- **Composer** (Dependency Manager for PHP)
- **SQLite** (Usually enabled by default in PHP) or MySQL if preferred

## 2. Setup Steps

### Step 1: Extract/Copy Files
Copy the entire project folder to the new computer. Avoid copying the `vendor` folder if possible (it's large and should be re-installed), but if you compressed the whole folder, that's fine too.

### Step 2: Install Dependencies
Open a terminal (Command Prompt or PowerShell) in the project folder and run:
```bash
composer install
```
*Note: If you copied the `vendor` folder, you can skip this, but it's recommended to run it anyway.*

### Step 3: Configure Environment
1. Check if there is a `.env` file in the project root.
2. If not, copy `.env.example` and rename it to `.env`:
   ```bash
   cp .env.example .env
   # Or on Windows Command Prompt: copy .env.example .env
   ```
3. Open the `.env` file and verify the database settings. For **SQLite** (recommended for simplicity), it should look like this:
   ```ini
   DB_CONNECTION=sqlite
   # DB_HOST, DB_PORT, etc. can be left as is or commented out
   ```

### Step 4: Setup Database
1. If using SQLite, create an empty file named `database.sqlite` inside the `database` folder if it doesn't exist.
   - On Windows, you can just create a new text file and rename it, or use: `type nul > database/database.sqlite`
2. Run database migrations to create the tables:
   ```bash
   php artisan migrate:fresh --seed
   ```
   *The `--seed` flag will also populate the database with the test users (admin, teacher, student).*

### Step 5: Generate Application Key
If you created a fresh `.env` file, run this command to generate a security key:
```bash
php artisan key:generate
```

## 3. Running the Application

### Option A: Laravel Development Server (Standard)
Run the following command:
```bash
php artisan serve
```
Access the app at: `http://127.0.0.1:8000`

### Option B: PHP Built-in Server (If port 8000 is blocked)
Run:
```bash
php -S localhost:8080 -t public
```
Access the app at: `http://localhost:8080`

## 4. Default Login Credentials

**Admin Account**
- Email: `admin@institut.com`
- Password: `password`

**Teacher Account**
- Email: `john.smith@institut.com`
- Password: `password`

**Student Account**
- Email: `alice.brown@student.com`
- Password: `password`

## 5. Troubleshooting

- **"Vite manifest not found"**: We are using CDN for Bootstrap, so you shouldn't see this. If you do, ensure `resources/views/layouts/app.blade.php` does NOT contain `@vite(...)`.
- **Database errors**: Ensure the `database/database.sqlite` file exists and is writable.
- **Permission errors**: Ensure `storage` and `bootstrap/cache` directories are writable.

---
**Enjoy the Institute Management System!**
