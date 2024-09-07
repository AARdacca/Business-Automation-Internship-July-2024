# Todo Laravel App Project Setup Guide

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

## Step 4: Installation Instructions

Follow these steps to download and set up the `todo-laravel-app` on your local server environment.

### Prerequisites

- Ensure you have `git` installed on your system. You can download it from [Git Downloads](https://git-scm.com/downloads).
- Make sure you have a local server environment like XAMPP installed. If not, you can download it from [XAMPP Downloads](https://www.apachefriends.org/download.html).

### Optional Step: Clone the Repository

1. Open your command prompt (CMD) or terminal.
2. Navigate to the XAMPP `htdocs` directory:
   ```bash
    cd /path/to/xampp/htdocs
    ```
    ```bash
    git clone https://github.com/AARdacca/TaskList-Laravel.git
    ```
    ```bash
    cd todo-laravel-app
    ```
    ```bash
    mv todo-laravel-app ../
    ```
    ```bash
    cd ..
    ```

### Step 1: Download the Repository

1. Go to the GitHub repository URL where the `todo-laravel-app` is hosted.
2. Click on the green **Code** button, then select **Download ZIP** from the dropdown menu.
3. Save the ZIP file to your desired location on your computer.

### Step 2: Extract the ZIP File

1. Navigate to the location where you downloaded the ZIP file.
2. Right-click on the ZIP file and choose **Extract All...**.
3. Choose the location where you want to extract the files and confirm by clicking the **Extract** button.

### Step 3: Place the Application in `htdocs`

1. Open the folder where you extracted the files.
2. Find the `todo-laravel-app` directory.
3. Copy this directory.
4. Navigate to your XAMPP installation directory (usually `C:\xampp` on Windows).
5. Open the `htdocs` folder inside the XAMPP directory.
6. Paste the `todo-laravel-app` directory inside `htdocs`.

### Step 4: Confirm that `todo-laravel-app` directory is directly under htdocs.

# Todo Laravel App Project Setup Instructions
This is a Laravel-based e-commerce website.
Laravel Version 11.
## Extracting and Placing the Project
1. After downloading the zipped project, extract it.
2. Move the extracted `Todo Laravel App` project folder into the `htdocs` directory of your local server environment.

## Opening and Setting Up the Project
1. Open the `Todo Laravel App` folder using PowerShell, or use VS Code which has a pre-installed PowerShell terminal.
2. Execute the following commands in your terminal to set up the project environment:

    ```powershell
    composer install
    npm install
    npm run build
    cp .env.example .env
    ```

## Finalizing Setup
1. Generate the application key:
   
    ```powershell
    php artisan key:generate
    ```
2. Run database migrations:
   
    ```powershell
    php artisan migrate
    ```
3. Then accept the default database: 

    ```powershell
    yes
    ```
3. Start the Laravel development server:
   
    ```powershell
    php artisan serve
    ```
4. Open the provided link in your browser to view the application.

Follow these instructions to properly set up and configure your Todo Laravel App project.

## Further Assistance

If you need any further assistance or have any queries, please feel free to contact me.

## Contact

### Ali Ahasan
[GitHub](https://github.com/AARdacca)  
[LinkedIn](https://www.linkedin.com/in/aliahasanraiyan/)  
Call: +880 1973 301868.