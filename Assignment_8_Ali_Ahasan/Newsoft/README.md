# Newsoft Website Project Setup Guide

This is a guide.

## Prerequisites

- Operating System: Windows, Linux, or macOS
- Administrative access to your computer

## Step 1: Download XAMPP

1. Visit the official XAMPP download page at [Apache Friends](https://www.apachefriends.org/index.html).
2. Choose the version of XAMPP that is compatible with your operating system.
3. Click on the download link to start the download process.

## Step 2: Install XAMPP

### Windows:

1. Run the downloaded installer file as an administrator.
2. Follow the on-screen instructions.
   - Choose the components you want to install. Ensure that **Apache** and **MySQL** are selected.
   - Select the folder where you want XAMPP to be installed.
3. Complete the installation.


## Step 3: Start XAMPP

1. Launch the XAMPP Control Panel:
   - **Windows/Linux**: Use the desktop shortcut or menu entry to start the control panel.
   - **macOS**: Open XAMPP through your Applications folder.
2. Start the **Apache** and **MySQL** modules by clicking the `Start` buttons next to each module.


# Newsoft Website Project Setup Instructions
This is a Laravel-based e-commerce website.
Laravel Version 11.
## Extracting and Placing the Project
1. After downloading the zipped project, extract it.
2. Move the extracted `Newsoft` project folder into the `htdocs` directory of your local server environment.

## Opening and Setting Up the Project
1. Open the `Newsoft` folder using PowerShell, or use VS Code which has a pre-installed PowerShell terminal.
2. Execute the following commands in your terminal to set up the project environment:

    ```powershell
    composer install
    npm install
    npm run build
    cp .env.example .env
    ```

## Database Configuration
### For MySQL:
<!-- 1. Edit the `.env` file with the following changes to switch from SQLite to MySQL:
   
    ```plaintext
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=newsoft
    DB_USERNAME=root
    DB_PASSWORD=
    ```
2. Create a database named `newsoft` in phpMyAdmin. -->

Create a database named `newsoft` in phpMyAdmin.

<!-- ### For SQLite:
1. If you prefer to use SQLite, simply update your `.env` file with:
   
    ```plaintext
    DB_CONNECTION=sqlite
    ```
   Uncomment the database path for SQLite in the `.env` file if necessary. -->

## Finalizing Setup
1. Generate the application key:
   
    ```powershell
    php artisan key:generate
    ```
2. Run database migrations:
   
    ```powershell
    php artisan migrate
    ```
3. Start the Laravel development server:
   
    ```powershell
    php artisan serve
    ```
4. Open the provided link in your browser to view the application.

Follow these instructions to properly set up and configure your Newsoft project.

## Further Assistance

If you need any further assistance or have any queries, please feel free to contact me.

## Contact

### Ali Ahasan
[GitHub](https://github.com/AARdacca)  
[LinkedIn](https://www.linkedin.com/in/aliahasanraiyan/)  
Call: +880 1973 301868.