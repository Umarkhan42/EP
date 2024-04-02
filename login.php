<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db.php'; // Make sure to include your database connection settings

    // Verify reCAPTCHA response
    $recaptchaResponse = $_POST['g-recaptcha-response'];
    $recaptchaSecret = '6Lc91JspAAAAAEZeJVix3RZyDb1_vGV-iZamKCbr'; //replace with your reCAPTCHA secret key

    // Verify reCAPTCHA response with Google
    $recaptchaUrl = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptchaData = array(
        'secret' => $recaptchaSecret,
        'response' => $recaptchaResponse
    );
    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($recaptchaData)
        )
    );
    $context = stream_context_create($options);
    $recaptchaResult = file_get_contents($recaptchaUrl, false, $context);
    $recaptchaResponseData = json_decode($recaptchaResult);

    //check if reCAPTCHA verification was successful
    if ($recaptchaResponseData && $recaptchaResponseData->success) {
        //get the username and password from the form
        $email = mysqli_real_escape_string($conn, $_POST["username-email"]); // Adjusted to match form field name
        $password = mysqli_real_escape_string($conn, $_POST["password"]); // Adjust based on your form field names

        // Prepare the query using the form data
        $query = "SELECT * FROM Employees WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            // Fetch user's role from the database result
            $row = mysqli_fetch_assoc($result);
            $role = $row['Role'];

            // Start the session
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $role;
            header("Location: 2FA.php");

            // Redirect based on user's role
            // switch ($role) {
            //     case 'Internal Staff':
            //         header("Location: internalstaffHP.php");
            //         break;
            //     case 'Consultant':
            //         header("Location: consultantsHP.php");
            //         break;
            //     case 'Trainer':
            //         header("Location: trainerHP.php");
            //         break;
            //     default:
            //         // Default redirection if role is not recognized
            //         header("Location: index.php");
            //         break;
            // }
            exit();
        } else {
            // Invalid credentials, redirect back to the login page with an error message
            header("Location: index.php?error=invalid");
            exit();
        }
    } else {
        // reCAPTCHA verification failed, redirect back to the login page with an error message
        header("Location: index.php?error=captcha");
        exit();
    }
}
?>
