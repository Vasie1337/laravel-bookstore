# Laravel Bookstore Application

A modern web application for managing a bookstore, built with Laravel and Tailwind CSS.

## Features

- **User Authentication**: Register, login, and manage user accounts
- **Role-based Access Control**: Admin and regular user roles
- **Book Management**: Browse, search, and view detailed book information
- **Admin Dashboard**: Manage users, books, and orders
- **Responsive Design**: Mobile-friendly interface using Tailwind CSS

## Tech Stack

- **Backend**: PHP 8.x, Laravel 10.x
- **Frontend**: Blade templates, Tailwind CSS, Alpine.js
- **Database**: MySQL/PostgreSQL
- **Authentication**: Laravel Breeze

## Requirements

- PHP 8.0 or higher
- Composer
- Node.js and NPM
- MySQL or PostgreSQL database

## Installation

1. Clone the repository

2. Install PHP dependencies:
   ```
   composer install
   ```

3. Create a copy of the `.env` file:
   ```
   cp .env.example .env
   ```

4. Generate an application key:
   ```
   php artisan key:generate
   ```

5. Configure your database in the `.env` file:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=bookstore_db
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. Run migrations and seed the database:
   ```
   php artisan migrate
   php artisan migrate --seed
   ```

7. Create a symbolic link for storage:
   ```
   php artisan storage:link
   ```

8. Copy sample book images to the public directory:
   ```
   php artisan books:copy-sample-images
   ```

9. Install and compile frontend dependencies:
   ```
   npm install
   npm run dev
   ```

10. Start the development server:
   ```
   php artisan serve
   ```

11. Visit `http://localhost:8000` in your browser

## Development Workflow

To work effectively with this application:

1. Run these two commands in separate terminal windows:
   ```
   # Terminal 1: Laravel development server
   php artisan serve
   
   # Terminal 2: Vite development server (compiles assets)
   npm run dev
   ```

2. If Tailwind CSS changes are not visible:
   ```
   # Clear Laravel caches
   php artisan view:clear
   php artisan config:clear
   php artisan cache:clear
   
   # Hard refresh your browser (Ctrl+F5 or Cmd+Shift+R)
   ```

## Default Users

After seeding the database, two users will be created:

1. Admin User:
   - Email: admin@example.com
   - Password: password
   - Role: admin

2. Regular User:
   - Email: user@example.com
   - Password: password
   - Role: user

## Usage

### Admin Features

- Manage books: Add, edit, and delete books
- Manage users: View and manage user accounts
- View and process orders

### User Features

- Browse books
- Search for specific books
- View book details
- Purchase books

## Customization

The application uses Tailwind CSS for styling. You can customize the theme by editing the `tailwind.config.js` file.

## License

[MIT License](LICENSE)
