<?php
session_start();

if(isset($_SESSION["email"]) && isset($_SESSION["password"]))
{
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $download = '';
    $base_url = $protocol . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
    // print_r($base_url); exit;

?>

<?php include 'header.php'; ?>

<?php
}
    else
    {
        header("location:login.php");

    }
?>