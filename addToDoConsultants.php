<?php
$LIST = $_POST['list'];
include "config.php";
mysqli_query($con, "INSERT INTO `todoconsultants`(`list`) VALUES ('$LIST')");
header("location:consultantsHP.php");
?>