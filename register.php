<?php
include "config.php";
// include "header.php";
include 'cdn.php';
session_start();
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
  <section class="py-3 py-md-5 py-xl-8">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="mb-5">
            <h2 class="display-5 fw-bold text-center">Sign up</h2>
            <p class="text-center m-0">Already have an account? <a href="login.php" class="link-primary text-decoration-none">Sign in</a></p>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-12 col-lg-10 col-xl-8">
          <div class="row gy-5 justify-content-center">
            <div class="col-12 col-lg-5">
              <form action="function.php" method="POST">
                <input type="hidden" name="action" value="reg_user">
                <div class="row gy-3 overflow-hidden">
                  <div class="col-12">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control border-0 border-bottom rounded-0" name="firstName" id="firstName" placeholder="First Name" >
                      <label for="firstName" class="form-label">First Name</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control border-0 border-bottom rounded-0" name="lastName" id="lastName" placeholder="Last Name" >
                      <label for="lastName" class="form-label">Last Name</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-floating mb-3">
                      <input type="email" class="form-control border-0 border-bottom rounded-0" name="email" id="email" placeholder="name@example.com" >
                      <label for="email" class="form-label">Email</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-floating mb-3">
                      <input type="password" class="form-control border-0 border-bottom rounded-0" name="password" id="password" value="" placeholder="Password" data-bs-toggle="modal" data-bs-target="#password_modal">
                      <label for="password" class="form-label">Password</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="1" name="iAgree" id="iAgree" >
                      <label class="form-check-label text-secondary" for="iAgree">
                        I agree to the <a href="#!" class="link-primary text-decoration-none">terms and conditions</a>
                      </label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="d-grid">
                      <button class="btn btn-lg btn-dark rounded-0 fs-6" type="submit">Sign up</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-12 col-lg-2 d-flex align-items-center justify-content-center gap-3 flex-lg-column">
              <div class="bg-dark h-100 d-none d-lg-block" style="width: 1px; --bs-bg-opacity: .1;"></div>
              <div class="bg-dark w-100 d-lg-none" style="height: 1px; --bs-bg-opacity: .1;"></div>
              <div>or</div>
              <div class="bg-dark h-100 d-none d-lg-block" style="width: 1px; --bs-bg-opacity: .1;"></div>
              <div class="bg-dark w-100 d-lg-none" style="height: 1px; --bs-bg-opacity: .1;"></div>
            </div>
            <div class="col-12 col-lg-5 d-flex align-items-center">
              <div class="d-flex gap-3 flex-column w-100 ">
               <img src="assets/img/chat.jpg" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- forget password modal -->
  <!-- <div class="modal fade" id="password_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div> -->
</body>
</html>

<?php
  if (isset($_SESSION['status']) && $_SESSION['status'] == 200) 
  {
    $message = str_replace("'", "", $_SESSION['message']);
    echo
    "<script>
        toastr.success('" . $message . "', {timeOut: 5000})
        </script>";
  } 
  else if (isset($_SESSION['status']) && $_SESSION['status'] != 200) 
  {
    $message = str_replace("'", "", $_SESSION['message']);
    echo "<script>
        toastr.error('" . $message . "', {timeOut: 5000})
        </script>";
  }

  unset($_SESSION['status']);
  unset($_SESSION['data']);
  unset($_SESSION['message']);
?>