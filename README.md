## Description
FP-pemweb is a web application developed as a final project for a web programming course. The application demonstrates various web development techniques and best practices, including front-end development, back-end integration, and database management.

## Technologies Used

- Front-end : HTML, CSS, JavaScript, Tailwind CSS
- Back-end: PHP
- Library : vlucas/phpdotenv 
- Database: MySQL

## Getting Started

### Prerequisites

Before you begin, ensure you have the following installed on your machine:

- PHP
- Composer
- Mysql OR MariaDB

### Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/muhBilal/FP-pemweb.git
    ```

2. Navigate to the project directory:
    ```bash
    cd {application_name}
    ```

3. Install the dependencies:
    ```bash
    composer install
    ```

4. Install the dependencies:
    ```bash
    cp .env.example .env
    ```

5. Set up your environment variables. Create a `.env` file in the root directory and add the following:
    ```env
    DB_SERVERNAME=your_database_host
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password
    DB_DATABASE=your_database_name
    APP_URL=your_secret_key
    ```

### Running the Application

1. Start the MYSQL service

2. import Database get from database/pemweb.php

3. move the folder in var/www or htdocs if using windows
 
4. Open your web browser and navigate to `http://localhost/{your_app_name}` to see the application in action.

5. this url for application
   - [http://localhost/application_name/pages/admin/tari-daerah/index.php](http://localhost/application_name/pages/admin/tari-daerah/index.php)  => Admin
   - [http://localhost/application_name/pages/home.php](http://localhost/application_name/pages/home.php) => user


### Warning
Dont running this project with app server (php -S localhost:...)
