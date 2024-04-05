<?php
$LIST = $_POST['list'];
include "config.php";
mysqli_query($con, "INSERT INTO `todotrainer`(`list`) VALUES ('$LIST')");
header("location:trainerHP.php");
?>