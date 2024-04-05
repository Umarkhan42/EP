<?php
include "config.php";
$List = $_POST['list'];
$ID = $_POST['id'];
mysqli_query($con, "UPDATE `todotrainer` SET `list`='$List' WHERE Id=$ID");
header("location:trainerHP.php");
?>