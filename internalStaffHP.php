<?php
session_start();
include 'db.php'; // Include your database connection script
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="cssFolder/reset.css">
    <link rel="stylesheet" type="text/css" href="cssFolder/global.css">  
    <link rel="stylesheet" type="text/css" href="cssFolder/mainpage.css">  

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    
    <title>About me</title>
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

           
            <a href="timeoff.php">
                <div class="g1970-parent">
                    <img
                    class=""
                    loading="lazy"
                    alt=""
                    src="./public/g1970.svg"
                    />
                </div>
            </a>
            <a href="employeeManagement.php">
                <div class="image-8-wrapper">
                    <img
                    class="image-8-icon"
                    loading="lazy"
                    alt=""
                    src="./public/image-8@2x.png"
                    />
                </div>
            </a>

              
        </aside>

        <header>
            <div class="header-child">
                <img class="pfp" src="./public/stock-cut.svg" alt="">
                <p>Welcome Back User</p>
            </div>

            <img class="fdm-logo" src="./public/fdmlogoblack-2@2x.png" alt="">
        </header>
        
        <section class="annoucements">
            <div class="annoucements-content">
                <h1 class="announcements-header">Announcements</h1><br>

                <?php
                    $sql = "SELECT * FROM announcements";
                    $valid = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($valid) > 0){
                        while ($found = mysqli_fetch_assoc($valid)) {
                            echo "<h2>" . $found["Title"] . "</h2>";
                            echo "<p>" . $found["Content"] . "</p>" . "<br>";
                        }
                    }

                ?>

                

            </div>
        </section>

        <section class="projectManagement">
            <div class="projectManagement-content">
                <h1 class="projectManagement-header">Project Management</h1><br>
                <p>Select Region / Global Project</p>

                <form action="post">
                    <label for="selectproject"></label>
                    <input type="text" id="selectproject" name="selectproject">
                    
                    <p>Rate project</p>

                    <img
                    class="star-icon"
                    loading="lazy"
                    alt=""
                    src="./public/star-1.svg"
                    />

                    <p>Review project</p>

                    <label for="reviewproject"></label>
                    <textarea type="text" id="reviewproject" name="reviewproject"></textarea><br>
                  
                    <input type="submit" value="Submit">
                    <input type="reset" value="Reset">

                  </form>
        </section>

        <section class="todo">
            <div class="todo-content">
                <h1 class="todo-header">To Do</h1><br>
                <p>Attend 9:00am meeting</p>
                <p>Complete Training Programme</p>
                <p>Emails</p>
                <p>Organise call with HR</p>
                <p>Attend 9:00am meeting</p>
            </div>
        </section>

        <section class="deskSupport">
            <div class="deskSupport-content">
                <h1 class="deskSupport-header">Support Desk</h1><br>
                <div>
                    <label for="help"></label>
                    <input type="text" placeholder="How can we help?" id="help" name="help">
                </div>
                <p>FAQ</p>
            </div>
        </section>
    </div>
</body>
</html>