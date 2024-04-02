# EP
# 1. Installing Xampp on Windows:
# Download XAMPP from the official website:
# Run the installer and follow the on-screen instructions.
# After installation, launch XAMPP Control Panel.
# Start the Apache and MySQL services by clicking on the Start button next to each service.

# 2.Accessing phpMyAdmin
# Open your web browser.
# Type localhost/phpmyadmin in the address bar and hit Enter.
# You should now see the phpMyAdmin dashboard.

# 3.Creating a Database and Table
# Firstly, in phpMyAdmin, click on the Databases tab.
# Enter a name for your database in the Create database field and click Create.
# Select the newly created database from the left sidebar.
# Click on the "SQL" tab.
# Copy and paste the following SQL query to create a table:
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
# Click Go to execute the query.

# 4.Insert dummy data/values
# In the SQL tab, copy and paste the following SQL query to insert dummy data into the Employees table:
# sql
INSERT INTO Employees (Name, DoB, Address, Postcode, Phone, Email, Role, Password) VALUES
('John Doe', '1990-01-01', '123 Main St', '12345', '773746966', 'john@example.com', 'Internal Staff', 'AAAAbbbb123'),
('Jane Smith', '1995-05-05', '121 Road St', '22222', '147424558', 'jane2@example.com', 'Trainer', 'JanesPassword1'),('James Wallace', '1996-03-27', '151 Road St', '28222', '190424558', 'james7@example.com', 'Consultant', 'JamesPassword123');

# Click Go to execute the query.

# Now when accessing the website only with the valid credentials can a user be logged in to the system