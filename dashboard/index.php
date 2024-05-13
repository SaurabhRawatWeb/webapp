
<?php include 'header.php' ?>
      
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Message</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>   
</div>
<?php include 'footer.php'; ?>
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