# Task Management

An application built on laravel for managing personal tasks: create, read, update, and delete items with title, description, status (pending, in progress, completed), and optional due date. It uses session-based authentication so each user only sees and edits their own tasks, enforced with a `TaskPolicy`.

## Requirements

- PHP 8.2 or newer version
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) 18+ and npm for frontend

## Setup

### 1. Install dependencies

From this directory (`Task-Management/`):

```bash
composer install
npm install
```

### 2. Environment

```bash
copy .env.example .env
```

On macOS or Linux use `cp .env.example .env`

Generate the application key:

```bash
php artisan key:generate
```

### 3. Run the application

In a separate terminal:

```bash
php artisan serve
```

Open [http://127.0.0.1:8000](http://127.0.0.1:8000). Register a new account, sign in and utilize the features.


## Folder and File Strucutre

## Main Folders

- `app/` – Main application code (controllers, models)
- `config/` – Configuration files
- `database/` – Migrations, seeders
- `public/` – Entry point (`index.php`) and public files
- `resources/` – Views (Blade), CSS, JS
- `routes/` – App routes (`web.php`, `api.php`)
- `storage/` – Logs, cache, uploads
- `tests/` – Test files
- `vendor/` – Installed packages

## Important Files

- `.env` – Environment settings
- `artisan` – Laravel CLI tool
- `composer.json` – PHP dependencies


## Useful commands

| Command | Purpose |
|---------|---------|
| `php artisan migrate:fresh --seed` | Reset database and re-run seeders |
| `php artisan db:seed --class=TaskSeeder` | Seed specific data |
| `php artisan test` | Run tests |
| `php artisan serve` | Start local development server |
| `php artisan make:controller NameController` | Create a controller |
| `php artisan make:model ModelName -mrc` | Create model with migration, controller, resource |
| `php artisan make:seeder SeederName` | Create a seeder |
| `php artisan migrate` | Run migrations |
| `php artisan migrate:rollback` | Rollback last migration |
| `php artisan migrate:refresh` | Reset and re-run migrations |
| `php artisan make:migration create_table_name` | Create a migration |
| `php artisan tinker` | Run interactive shell |
