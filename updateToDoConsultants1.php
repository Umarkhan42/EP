<?php
include "config.php";
$List = $_POST['list'];
$ID = $_POST['id'];
mysqli_query($con, "UPDATE `todoconsultants` SET `list`='$List' WHERE Id=$ID");
header("location:consultantsHP.php");
?>