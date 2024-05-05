
<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
session_start();
include "config.php";
$msg = $_GET["msg"];
$phone = $_SESSION["phone"];
$name = $_SESSION["userName"];
// print_r($phone); exit;

$q = "SELECT * FROM `users` WHERE phone='$phone' AND `uname` = '$name';";
if ($rq = mysqli_query($db, $q)) 
{
  if (mysqli_num_rows($rq) == 1) 
  {
    $q = "INSERT INTO `msg`(`name`,`phone`, `msg`) VALUES ('$name','$phone','$msg')";
    $rq = mysqli_query($db, $q);
  }
}
?>