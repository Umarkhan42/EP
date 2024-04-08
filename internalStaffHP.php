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
    <script src="script.js" defer></script> 

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
                <br><a href="index.php" id="log">Logout</a><br>
            </div>

            <img class="fdm-logo" src="./public/fdmlogonew.svg" alt="">
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
                <p class="p1">Select Region / Global Project</p>

                <form action="post">
                    <label for="selectproject"></label>
                    <input type="text" id="selectproject" name="selectproject">
                    
                    <p class="p1"><br>Rate project</p>

                    <img
                    class="star-icon"
                    loading="lazy"
                    alt=""
                    src="./public/star-1.svg"
                    />

                    <p class="p1"><br>Review project</p>

                    <label for="reviewproject"></label>
                    <textarea type="text" id="reviewproject" name="reviewproject"></textarea><br><br>
                  
                    <input type="submit" value="Submit">
                    <input type="reset" value="Reset">

                  </form>
        </section>

        <section class="todo">
            <div class="todo-content">
                <h1 class="todo-header">To Do <img class="toDo-icon" alt="" src="./public/toDo.png"/></h1><br>

                <form action="addToDoInternalStaff.php" method="POST">
                <div>
                    <input type="text" name="list" class="form-control">
                </div>
                <div>
                    <button class="addButton">Add</button><br>
                </div>
            </form>
            
            <?php
            include "config.php";
            $rawData = mysqli_query($con, "select * from todointernalstaff");
            ?>
            
            <div>
                <table class="table">
                    <tbody>
                        <?php
                            while($row = mysqli_fetch_array($rawData)){
                        ?>
                        <tr>
                            <td class="list"><?php echo $row['list'] ?></td>
                            <td class="delete"><a href="deleteToDoInternalStaff.php ? ID=<?php echo $row['Id'] ?>">Delete</a></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            </div>
        </section>

        <section class="deskSupport">
                <div class="deskSupport-content">
                    <h1 class="deskSupport-header">Contact Us</h1><br>
                    <form id="contactForm">
                        <div>
                            <label for="username">Name:</label>
                            <input type="text" placeholder="Your Name" id="username" name="username">
                        </div>
                        <div>
                            <br><label for="issue">Describe your issue:</label><br>
                            <textarea id="issue" name="issue" rows="4" cols="50" placeholder="Please describe your issue in detail."></textarea>
                        </div>
                        <div>
                            <br><button type="submit" id="send-btn">Send</button>
                        </div>
                    </form>
                </div>
        </section>
        <script src="https://cdn.emailjs.com/dist/email.min.js"></script>
        <script src="supportDesk.js"></script>

        <button class="chatbot-toggler">
            <span class="material-symbols-rounded"></span>
            <img src="assets/whitechatbot-removebg-preview.png" alt="Chatbot Logo" width= 40px height = 40px>
            <span class="material-symbols-outlined"></span>
        </button>
          <div class="chatbot">
            <header>
              <h2>Chatbot</h2>
              <span class="close-btn material-symbols-outlined">close</span>
            </header>
            <ul class="chatbox">
              <li class="chat incoming">
                <span class="material-symbols-outlined">
                    <img src="assets\FDM_Group_Logo.png" alt="Logo" class="logo" width = 40px height = 40px> 
                </span>
                <p>Hi there 👋<br>How can I help you today?</p>
              </li>
            </ul>
            <div class="chat-input">
              <textarea placeholder="Enter a message..." spellcheck="false" required></textarea>
              <span id="send-btn1" class="material-symbols-rounded"></span>
            </div>
          </div>
    </div>
</body>
</html>