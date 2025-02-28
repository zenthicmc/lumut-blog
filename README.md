# Laravel Blog Installation Guide

## Prerequisites

Make sure you have the following installed on your system:

- PHP >= 8.0
- Composer
- MySQL
- Laravel 10
- Node.js & NPM (for frontend assets, optional)

## Installation Steps

1. **Clone the Repository**
   ```sh
   git clone https://github.com/your-repo/laravel-blog.git
   cd laravel-blog
   ```

2. **Install Dependencies**
   ```sh
   composer install
   npm install  # Optional, for frontend assets
   ```

3. **Setup Environment**
   ```sh
   cp .env.example .env
   ```
   Edit `.env` file and set database connection:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_user
   DB_PASSWORD=your_database_password
   ```

4. **Setup Database**
   Create and import the following database schema in MySQL:
   ```sql
   CREATE TABLE IF NOT EXISTS `account` (
     `username` VARCHAR(45) NOT NULL,
     `password` VARCHAR(250) NOT NULL,
     `name` VARCHAR(45) NOT NULL,
     `role` VARCHAR(45) NOT NULL,
     PRIMARY KEY (`username`)
   ) ENGINE = InnoDB;

   CREATE TABLE IF NOT EXISTS `post` (
     `idpost` INT NOT NULL AUTO_INCREMENT,
     `title` TEXT NOT NULL,
     `content` TEXT NOT NULL,
     `date` DATETIME NOT NULL,
     `username` VARCHAR(45) NOT NULL,
     PRIMARY KEY (`idpost`),
     INDEX `fk_post_account_idx` (`username` ASC),
     CONSTRAINT `fk_post_account`
       FOREIGN KEY (`username`)
       REFERENCES `account` (`username`)
       ON DELETE NO ACTION
       ON UPDATE NO ACTION
   ) ENGINE = InnoDB;
   ```

5. **Run Migrations & Seeders** (If necessary)
   ```sh
   php artisan migrate --seed
   ```

6. **Set Storage & Cache Permissions**
   ```sh
   php artisan storage:link
   chmod -R 777 storage bootstrap/cache
   ```

7. **Start Laravel Development Server**
   ```sh
   php artisan serve
   ```
   Open your browser and visit `http://127.0.0.1:8000`

## Default User Accounts

| Role    | Username | Password |
|---------|---------|----------|
| Admin   | admin   | admin    |
| Author  | author  | author   |

## Additional Commands

- **To Compile Frontend Assets** (if using Vite/Bootstrap):
  ```sh
  npm run dev
  ```

- **To Run Tests**
  ```sh
  php artisan test
  ```

## Troubleshooting

- If you encounter permission issues, run:
  ```sh
  sudo chmod -R 777 storage bootstrap/cache
  ```
- If `.env` changes don't take effect:
  ```sh
  php artisan config:clear
  ```
