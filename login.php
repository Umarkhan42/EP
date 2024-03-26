<?php

echo 'If no errors are displayed, the connection is successful.';
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db.php'; // Make sure to include your database connection settings

    // Get the username and password from the form
    $email = mysqli_real_escape_string($conn, $_POST["username-email"]); // Adjusted to match form field name
    $password = mysqli_real_escape_string($conn, $_POST["password"]); // Adjust based on your form field names

    // Prepare the query using the form data
    $query = "SELECT * FROM Employees WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Start the session
        session_start();
        $_SESSION['email'] = $email;
        // Redirect to success.php
        header("Location: updateinfo.php");
    } else {
        // Invalid credentials, redirect back to the login page with an error message
        header("Location: index.php");
        exit();
    }
}
?>