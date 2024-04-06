<?php
session_start();
include 'db.php'; // Make sure to include your database connection settings

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2FA</title>
    <link rel="stylesheet" href="cssFolder/2FA.css">
    <script src="https://cdn.emailjs.com/dist/email.min.js"></script>
    <script defer src="authenticator.js"></script>
</head>
<body>
    <img src="assets\FDM_Group_Logo.png" alt="Logo" class="logo"> 
    <div class="container">
        <h1>Two-Factor Authentication</h1>
        <p>Enter your FDM email</p>
        <input type="email" id="email" maxlength="30">

        <button id="sendCodeButton" onclick="sendCode()">Send Code</button>
        <p>Enter 6 digit code sent to email</p>
        <div id="role" style="display: none;"><?php echo $_SESSION['role']; ?></div>
        <input type="text" id="input_code" maxlength="6">
        <button id="verifyButton" onclick="verifyCode(document.getElementById('input_code').value)">Verify</button>
        <p id="errorMessage" class="error-message"></p>
        <p id="resendMessage">Didn't receive the code? <a href="#" onclick="resendCode()">Resend</a></p>
        <p id="timer"></p>
    </div>
</body>
</html>