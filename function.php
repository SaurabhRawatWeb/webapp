<?php
include 'config.php';
session_start();
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// echo '<pre>';
// print_r($_POST);
// exit;

$action = isset($_POST['action']) && !empty($_POST['action']) ? $_POST['action'] : '';
if(empty($_POST['action']))
{
    $action = isset($_GET['action']) && !empty($_GET['action']) ? $_GET['action'] : '';
}

// registration
if($action == 'reg_user')
{
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $iAgree = isset($_POST['iAgree']) && $_POST['iAgree'] == '1';

    if(empty($firstName))
    {
        $_SESSION['status'] = 403;
        $_SESSION['message'] = 'Error: Empty First Name!';
        header("location: register.php");
        exit;
    }
    elseif(empty($lastName))
    {
        $_SESSION['status'] = 403;
        $_SESSION['message'] = 'Error: Empty Last Name!';
        header("location: register.php");
        exit;
    }
    elseif(empty($email))
    {
        $_SESSION['status'] = 403;
        $_SESSION['message'] = 'Error: Empty Email Name!';
        header("location: register.php");
        exit;
    }
    elseif(empty($password))
    {
        $_SESSION['status'] = 403;
        $_SESSION['message'] = 'Error: Empty Password Name!';
        header("location: register.php");
        exit;
    }
    elseif(!$iAgree) 
    {
        $_SESSION['status'] = 403;
        $_SESSION['message'] = 'Error: Accept Terms And Conditions!';
        header("location: register.php");
        exit;
    }
    else
    {
        $insert_query = "INSERT INTO `users` (`u_fname`, `u_lname`, `u_email`, `u_password`) VALUES ('$firstName', '$lastName', '$email', '$password')";

        if(mysqli_query($conn, $insert_query))
        {
            $_SESSION['status'] = 200;
            $_SESSION['message'] = 'Registration Successful';
            header("location: register.php");
            exit;
        }
        else
        {
            $_SESSION['status'] = 403;
            $_SESSION['message'] = 'Error: Unable to complete registration. Please try again later.';
            header("location: register.php");
            exit;
        }
    }
}

//login
if($action == 'login')
{
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $hashedPassword = md5($password);
    $sqlQ = "SELECT * FROM `users` WHERE `u_email`= '$email' && `u_password`= '$hashedPassword'";
  
    $result = mysqli_query($conn, $sqlQ);
  
    if ($result) 
    {
        if (mysqli_num_rows($result) == 1) 
        {
            $row = mysqli_fetch_assoc($result);
            $_SESSION["u_fname"] = $row['u_fname'];
            $_SESSION["user_id"] = $row['id'];
            $_SESSION["u_lname"] = $row['u_lname'];
            $_SESSION["u_email"] = $row['u_email'];
            $_SESSION["u_phone"] = $row['u_phone'];
            $_SESSION["u_address"] = $row['u_address'];
            $redirectUrl = "dashboard/index.php";
            $loginSuccess = true;
        } 
        else 
        {
            $loginSuccess = false;
        }
    }
    else 
    {
        $_SESSION['status'] = 400;
        $_SESSION['message'] = 'Error: SQL query failed!';
        header("location:login.php");
        exit;
    }
}
?>

<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
    <script>
        <?php if (isset($loginSuccess) && $loginSuccess): ?>
            Swal.fire({
                icon: "success",
                title: "Login Successfully",
                text: "You are now logged in.",
                showConfirmButton: false,
                timer: 2000
            }).then(function() 
            {
                window.location.href = "<?php echo $redirectUrl; ?>";
            });
        <?php elseif (isset($loginSuccess) && !$loginSuccess): ?>
            Swal.fire({
                icon: "error",
                title: "Error: Invalid email or password!",
                text: "Please check your credentials and try again.",
                showConfirmButton: false,
                timer: 2000
            }).then(function() 
            {
                window.location.href = "login.php";
            });
        <?php endif; ?>
    </script>
</body> 
</html>
