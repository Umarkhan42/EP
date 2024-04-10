# EP

# 1. Installing Xampp on Windows:

Download XAMPP from the official website:
Run the installer and follow the on-screen instructions.
After installation, launch XAMPP Control Panel.
Start the Apache and MySQL services by clicking on the Start button next to each service.

# 2.Accessing phpMyAdmin

Open your web browser.
Type localhost/phpmyadmin in the address bar and hit Enter.
You should now see the phpMyAdmin dashboard.

# 3.Creating a Database and Table

Firstly, in phpMyAdmin, click on the Databases tab.
Enter 'fdmlogin' for your database name in the Create database field and click Create.
Select the newly created database from the left sidebar.
Click on the "SQL" tab.
Copy and paste the following SQL queries to create the tables:

# sql

CREATE TABLE Employees (
ID INT AUTO_INCREMENT PRIMARY KEY,
Name VARCHAR(255),
DoB DATE,
Address VARCHAR(255),
Postcode VARCHAR(10),
Phone VARCHAR(15),
Email VARCHAR(255),
Role VARCHAR(50),
Password VARCHAR(255)
);

CREATE TABLE Announcements (
ID INT AUTO_INCREMENT PRIMARY KEY,
Title VARCHAR(255),
Content TEXT
);

CREATE TABLE Requests (
ID INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255),
type VARCHAR(50),
start DATE,
end DATE,
reason TEXT,
approved VARCHAR(50) DEFAULT 'Pending'
);

CREATE TABLE SkillDevTask (
ID INT AUTO_INCREMENT PRIMARY KEY,
Group_User VARCHAR(255),
Task VARCHAR(255),
CompletionDate DATE,
TaskStatus VARCHAR(50) DEFAULT 'Pending'
);

CREATE TABLE todoconsultants (
ID INT AUTO_INCREMENT PRIMARY KEY,
list VARCHAR(255)
);

CREATE TABLE todointernalstaff (
ID INT AUTO_INCREMENT PRIMARY KEY,
list VARCHAR(255)
);

CREATE TABLE todotrainer (
ID INT AUTO_INCREMENT PRIMARY KEY,
list VARCHAR(255)
);

# Click Go to execute the query.

# 4.Insert dummy data/values

In the SQL tab, copy and paste the following SQL query to insert dummy data into the Employees table:

# sql

INSERT INTO employees (Name, DoB, Address, Postcode, Phone, Email, Role, Password)
VALUES ('Alex Scott', '2004-06-02', '123 hopestat', 'E1 4NX', '07122983745', 'alexscott456@gmail.com', 'Internal Staff', 'group32'),('Akhil Radhakrishnan', '1990-01-01', '123 Main St', '54321', '773746966', 'arkhero0308@gmail.com', 'Consultant', '123'),('Umar', '1980-04-04', '124 Road st', '22222', '147424554', 'umarakhan2003@gmail.com', 'Trainer', '123');

# Click Go to execute the query.

# Now when accessing the website only with the valid credentials can a user be logged in to the system

# 5. Importance of Using a Database

FDM has a large workforce with over 5000 employees hence why we have decided to make use of a database to store user information in a secure and safe location that can be constantly updated by authorised personnel.

..
