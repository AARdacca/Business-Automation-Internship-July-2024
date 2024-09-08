# Product Management System

This is PHP-based Product Management website.

## Testing Accounts

### Admin Account
- **Default Login Credentials**
  - **Username:** admin
  - **Password:** admin

### Functionalities

#### Admin Panel
- **Create Accounts**: Admins can create new user accounts.
- **Product Management**: 
  - **Add New Products**: Create new product entries.
  - **Edit Products**: Update existing product details.
  - **Delete Products**: Remove products from the system.
- **Category Management**:
  - **Create Categories**: Add new categories to organize products.
  - **Edit Categories**: Modify existing category details.
  - **Delete Categories**: Remove categories from the system.

#### User Functions
- **View Reports**: Users can view various reports related to products and categories.
- **Add/Edit/Delete**: Users have the capability to modify and delete entries as per their access level.

## Testing
The system has been thoroughly tested and functions as expected. All core features, including account creation, product management, and category management, have been verified for performance and stability.

## Prerequisites and Installation process for ➡ <b>XAMPP</b> ⬅

### Prerequisites

- PHP (ensure your version matches that required by the project)
- [XAMPP](https://www.apachefriends.org/index.html) for Windows, Linux, or macOS

### Installation

#### Database Setup

#### Requirements
- **XAMPP**: Ensure that XAMPP is installed on your machine. You can download it from [Apache Friends](https://www.apachefriends.org/index.html).

#### Initial Setup

1. **Start XAMPP**:
   - Open the XAMPP Control Panel.
   - Start the **Apache** and **MySQL** modules. Ensure both modules show as 'running'.

2. **Create Database**:
   - Open a web browser and go to `http://localhost/phpmyadmin`.
   - Click on the 'Databases' tab.
   - Enter `oswa_inv` in the "Create database" field.
   - Click the 'Create' button.

3. **Import Database**:
   - Within phpMyAdmin, select the `oswa_inv` database from the left sidebar.
   - Click on the 'Import' tab in the top menu.
   - In the "File to import" section, click 'Choose File' and select the `oswa_inv.sql` file located in your project folder.
   - Scroll down and click the 'Go' button at the bottom of the page to import the database.

#### Verification

- After importing, you can verify that all tables have been created properly by clicking on the `oswa_inv` database in phpMyAdmin and reviewing the list of tables. Ensure there are no error messages during the import process.

#### Project Destination Setup

1. **Download and Extract:**
   - Download the project zip file.
   - Extract the zip file into the `htdocs` directory of your XAMPP installation. This directory is typically found at `C:/xampp/htdocs` on Windows, or `/opt/lampp/htdocs` on Linux.

2. **Start XAMPP:**
   - Launch the XAMPP Control Panel.
   - Start the Apache service. MySQL is not required unless your project specifically uses a database.

3. **Access the Project:**
   - Open a web browser.
   - Navigate to `http://localhost/Product_Management_System/`