# React-Crud-PHP-MySQL

This is a full-stack web application demonstrating **CRUD (Create, Read, Update, Delete)** operations. The project uses **React** for the frontend, **PHP** for the RESTful API backend, and **MySQL** for data persistence.

-----

## 🚀 Features

  * **Create:** Add new records to the MySQL database.
  * **Read:** Fetch and display all records from the database on the frontend.
  * **Update:** Modify existing records.
  * **Delete:** Remove records from the database.
  * **Modern UI:** Built using **React** for a dynamic user experience.
  * **API-Driven:** Communication between the frontend and backend via a **PHP-based REST API**.

-----

## 🛠️ Tech Stack

| Component | Technology | Description |
| :--- | :--- | :--- |
| **Frontend** | **React.js** (via `create-react-app`) | User Interface and Client-Side Logic. |
| **Backend** | **PHP** | API endpoints for handling CRUD requests. |
| **Database** | **MySQL** | Data storage. |
| **Styling** | **CSS/HTML** | Basic styling for the application. |

-----

## ⚙️ Prerequisites

Before you begin, ensure you have the following installed on your system:

  * **Node.js** and **npm** (for the React frontend)
  * **PHP** (version 7.4+ is recommended)
  * A local server environment like **XAMPP, WAMP, or MAMP** (which includes PHP and MySQL/MariaDB)

-----

## 📋 Installation and Setup

Follow these steps to get the project running on your local machine.

### 1\. Database Setup

1.  **Start your local server** (e.g., Apache/NGINX and MySQL via XAMPP).

2.  Open **phpMyAdmin** or your preferred MySQL client.

3.  **Create a new database**. You can name it `react_php_crud` (or choose your own name).

4.  You will need a table for your data (e.g., a `users` table). Based on the structure, you should create a table using SQL.

    *Example SQL for a `users` table:*

    ```sql
    CREATE TABLE `users` (
        `id` INT(11) NOT NULL AUTO_INCREMENT,
        `name` VARCHAR(255) NOT NULL,
        `email` VARCHAR(255) NOT NULL,
        PRIMARY KEY (`id`)
    );
    ```

5.  **Configure the Database Connection:** Navigate to the `api/db_connect.php` file (or similar connection file in the `api` folder) and update the database credentials (hostname, username, password, and database name) to match your local setup.

### 2\. Backend (PHP API) Setup

1.  Place the contents of the `api` folder inside your local server's web directory (e.g., `htdocs` for XAMPP, or `www` for WAMP).
2.  The backend API should be accessible via a URL, for example: `http://localhost/react-crud-php-mysql/api/`. (The exact path depends on where you placed the `api` folder).

### 3\. Frontend (React) Setup

1.  Navigate into the frontend project directory:

    ```bash
    cd React-Front-End
    ```

2.  Install the required Node packages:

    ```bash
    npm install
    ```

3.  Configure the **API Endpoint**:

      * Find the configuration file (likely in `src/` or `src/components/`) where the base URL for the API is defined.
      * Update it to point to your PHP API, e.g.: `const API_BASE_URL = 'http://localhost/react-crud-php-mysql/api/';`

-----

## 🏃 Usage (Running the Application)

Once all installations and configurations are complete, you can run the application:

### 1\. Start the PHP Backend

Ensure your local server (Apache/NGINX) is running.

### 2\. Start the React Frontend

In the `React-Front-End` directory, run the start command:

```bash
npm start
```

This will usually open the application in your browser at `http://localhost:3000`. You can now perform Create, Read, Update, and Delete operations.
