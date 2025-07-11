#  Project: Simple User Form with MySQL + PHP + JavaScript

This project allows users to submit their name and age using a one-line form. The submitted data is stored in a MySQL database and displayed in a table. Each record includes a toggle button to change its status value between 0 and 1 in real-time.

---

## Folder Structure

Place all these files inside:
C:\xampp\htdocs\user_form_project

### Required Files:

- index1.php
- db.php
- process.php
- toggle.php
- style.css
- script.js

---

## ⚙ Step-by-Step Installation Instructions

### 1. Install XAMPP

Download and install XAMPP from [https://www.apachefriends.org](https://www.apachefriends.org)

###  2. Start Apache and MySQL

- Open XAMPP Control Panel
- Click Start for both Apache and MySQL
- Make sure they turn green

---

###  3. Create the Project Folder

Create this folder:

C:\xampp\htdocs\user_form_project

Put all your project files inside it.

---

### 4. Create MySQL Database and Table

1. Open [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
2. Click New, and enter:

   user_form_project
   
3. Click Create
4. Go to the SQL tab and paste:
SQL

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    age INT NOT NULL,
    status TINYINT(1) DEFAULT 0
);

5. Click Go

---

###  5. Configure db.php

Make sure db.php has this content:
PHP

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_form_project";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

---

##  How It Works

- Open:  
  http://localhost/user_form_project/index1.php

- Fill in the form: Name and Age
- Click Submit
- Your data will be stored in the database and appear below
- Each row has a Toggle button to change the status between 0 and 1 live
