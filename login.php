<?php
session_start();
include 'cdn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="bg-light py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-12 col-md-11 col-lg-8 col-xl-7 col-xxl-6">
        <div class="bg-white p-4 p-md-5 rounded shadow-sm">
          <div class="row">
            <div class="col-12">
              <div class="mb-5">
                <h3>Log in</h3>
              </div>
            </div>
          </div>
          <form action="function.php" method="POST">
            <input type="hidden" name="action" value="login">
            <div class="row gy-3 gy-md-4 overflow-hidden">
              <div class="col-12">
                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
              </div>
              <div class="col-12">
                <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                <input type="password" class="form-control" name="password" id="password" value="" required>
              </div>
              <div class="col-12">
                <div class="form-check">
                  <!-- <input class="form-check-input" type="checkbox" value="" name="remember_me" id="remember_me">
                  <label class="form-check-label text-secondary" for="remember_me">
                    Keep me logged in
                  </label> -->
                </div>
              </div>
              <div class="col-12">
                <div class="d-grid">
                  <button class="btn btn-lg btn-primary" type="submit">Log in now</button>
                </div>
              </div>
            </div>
          </form>
          <div class="row">
            <div class="col-12">
              <hr class="mt-5 mb-4 border-secondary-subtle">
              <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end">
                <a href="register.php" class="link-secondary text-decoration-none">Create new account</a>
                <a href="#!" class="link-secondary text-decoration-none">Forgot password</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
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