<?php
include "db.php";
// include "header.php";
include 'cdn.php';
session_start();

if(isset($_POST["name"]) && isset($_POST["phone"]))
{
  
  $name=$_POST["name"];
  $phone=$_POST["phone"];

  $q="SELECT * FROM `users` WHERE uname='$name' && phone='$phone'";
  
  if($rq=mysqli_query($db,$q)){

    if(mysqli_num_rows($rq)==1){
      
      $_SESSION["userName"]=$name;
      $_SESSION["phone"]=$phone;
      header("location: index.php");



    }else{


      $q="SELECT * FROM `users` WHERE phone='$phone'";
      if($rq=mysqli_query($db,$q)){
        if(mysqli_num_rows($rq)==1){
          echo "<script>alert($phone+' is already taken by another person')</script>";
        }else{

          $q="INSERT INTO `users`(`uname`, `phone`) VALUES ('$name','$phone')";
          if($rq=mysqli_query($db,$q)){
            $q="SELECT * FROM `users` WHERE uname='$name' && phone='$phone'";
            if($rq=mysqli_query($db,$q)){
              if(mysqli_num_rows($rq)==1){

                $_SESSION["userName"]=$name;
                $_SESSION["phone"]=$phone;
                header("location: index.php");

              }
            }

          }

        }
      }
    }
  }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ChatRoom</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="login text-light mt-5 shadow card " style="background-color:#000000; margin:auto; color:#ffff;">
    <div class="row">
      <h1 class="text-center py-3 border-bottom">CHATBOT</h1>
    </div>
      <h2 class="text-light pt-5">Login</h2>
      <p  class="text-light">This ChatRoom is the best example to demonstrate the concept of ChatBot and it's completely for begginners.</p>
      <form action="" method="post" class="mt-5">

        <h3  class="text-light">UserName</h3>
        <input type="text" placeholder="Short Name" name="name" required>

        <h3  class="text-light mt-3">Mobile No:</h3>
        <input type="number" placeholder="with country code" min="1111111" max="999999999999999" name="phone" required>
        <div class="div text-center mt-5">

          <button type="button" class="btn text-light btn-info"><i class="fas fa-sign-in"></i> Login </button>
        </div>

      </form>
    </div>
  </div></body>
</html>