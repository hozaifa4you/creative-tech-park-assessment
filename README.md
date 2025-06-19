# Creative Tech Park Assessment

Pre interview assessment for the Creative Tech Park.

## Instructions

1. Clone the repository to your local machine. [Here](https://github.com/hozaifa4you/creative-tech-park-assessment)

2. Requirements:

   -  PHP 8.4
   -  Composer
   -  Node.js and npm
   -  MySQL

3. Install the required dependencies by running:

   ```bash
   composer install
   npm install
   ```

4. Migrations:

   -  Run the migrations to set up the database schema:

   ```bash
   php artisan migrate
   ```

5. Seed the database with sample data:

   ```bash
   php artisan db:seed
   ```

6. Start the development server:

   ```bash
   composer run dev
   ```

## Notes

There are sone features and functionalities that are not implemented in this assessment, such as:

### Features

-  User and Admin separate dashboard
-  User profile management
-  Admin Category management
-  Admin Product management
-  20% Dynamic Dashboard analytics

### Attentions

-  Only `admin` type user can access the admin dashboard.
-  Admin dashboard login page - `/admin-panel/login`
-  User dashboard login page - `/login`
-  Admin dashboard page `/dashboard`
-  User dashboard page `/user-dashboard`

> This assessment is a work in progress and is not fully functional. It is intended to demonstrate the ability to set up a Laravel application with basic user authentication and product management features.
