<?php
session_start();
include 'db.php'; // Include your database connection script

if (!isset ($_SESSION['email'])) {
    // Redirect to login page if not logged in
    header('Location: index.php');
    exit();
}

$email = $_SESSION['email'];

// Fetch user data from the database
$query = "SELECT * FROM Employees WHERE email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
if ($user = $result->fetch_assoc()) {
    // User data is now in $user array
} else {
    echo "User not found.";
    // Consider handling this case, maybe redirect to an error page or logout
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="cssFolder/reset.css">    
    <link rel="stylesheet" type="text/css" href="cssFolder/updateinfo.css">   
    <link rel="stylesheet" type="text/css" href="cssFolder/global.css">   
    <title>Document</title>
</head>

<body>
    <div class="container">



        <aside>
        <a href="updateinfo.php">
                <div class="icons-wrapper">
                    <img 
                    class="" 
                    loading="lazy" 
                    alt="" 
                    src="./public/icons.svg" />
                </div>
            </a>
            <div class="frame-wrapper">
                <img class="" loading="lazy" alt="" src="./public/group-34.svg" />
            </div>
            <div class="vector-wrapper">
                <img class="" loading="lazy" alt="" src="./public/vector.svg" />
            </div>
            <div class="messages-icon">
                <img class="" loading="lazy" alt="" src="./public/group-33.svg" />
            </div>


            <div class="frame-container">
                <img class="" loading="lazy" alt="" src="./public/group-32.svg" />
            </div>
            <div class="g1970-parent">
                <img class="" loading="lazy" alt="" src="./public/g1970.svg" />
            </div>

            <div class="home2">
                <?php 
                    switch ($user['Role']) {
                        case 'Internal Staff':
                            echo '<a href="internalstaffHP.php"><img src="./public/home.png" alt=""></a>';
                            break;
                        case 'Consultant':
                            echo '<a href="consultantsHP.php"><img src="./public/home.png" alt=""></a>';
                            break;
                        case 'Trainer':
                            echo '<a href="trainerHP.php"><img src="./public/home.png" alt=""></a>';
                            break;
                        default:
                            // Default action if role is not recognized
                            echo '<a href="index.php"><img src="./public/home.png" alt=""></a>';
                            break;
                    }
                ?>
            </div>

        </aside>


        <section class="current">
            <div class="content">
                <h3>Current Information</h3>
                <ul>
                    <li><strong>Name:</strong>
                        <?php echo htmlspecialchars($user['Name']); ?>
                    </li>
                    <li><strong>Date of Birth:</strong>
                        <?php echo htmlspecialchars($user['DoB']); ?>
                    </li>
                    <li><strong>Address:</strong>
                        <?php echo htmlspecialchars($user['Address']); ?>
                    </li>
                    <li><strong>Postcode:</strong>
                        <?php echo htmlspecialchars($user['Postcode']); ?>
                    </li>
                    <li><strong>Phone Number:</strong>
                        <?php echo htmlspecialchars($user['Phone']); ?>
                    </li>
                    <li><strong>Email:</strong>
                        <?php echo htmlspecialchars($user['Email']); ?>
                    </li>
                </ul>
            </div>
        </section>

        </section>


        <section class="update">
            <form id="updateForm" action="update.php" method="POST">
                <h3>Update personal information</h3>
                <label for="name">Name:</label><br>
                <input type="text" id="name" name="name" placeholder="Enter your name"><br><br>

                <label for="dob">Date of Birth:</label><br>
                <input type="date" id="dob" name="dob"><br><br>

                <label for="address">Address:</label><br>
                <input type="text" name="address" placeholder="Enter your address"></input><br><br>

                <label for="postcode">postcode:</label><br>
                <input type="text" name="postcode" placeholder="Enter your postcode"></input><br><br>

                <label for="phone">Phone Number:</label><br>
                <input type="tel" id="phone" name="phone" placeholder="Enter your phone number"><br><br>

                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" placeholder="Enter your email"><br><br>

                <input type="submit" value="Save Changes">
            </form>

        </section>

        <div class="blank2"></div>

    </div>

</body>

</html>