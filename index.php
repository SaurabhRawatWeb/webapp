<?php
session_start();
if(isset($_SESSION["userName"]) && isset($_SESSION["phone"]))
{
  $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
  $download = '';
  $base_url = $protocol . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
  // print_r($base_url); exit;
?>
<?php include 'header.php' ?>
  <div class="container card shadow" style="background-color:#fafcfc;">
    <div class="row">
      <div class="col-4">
      </div>
      <div class="col-8">
        <div class="chat">
          <div class="msg border px-3 py-3 text-end ">
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-4">
      </div>
      <div class="col-8 d-flex">
          <input type="text" class="form-control" placeholder="Write msg Here" id="input_msg">
          <button class=" bg-primary text-light" onclick="update()">Send</button>
      </div>
    </div>
  </div>
<script src="<?= $base_url; ?>/js/script.js?ver=<?= date('H:i:s'); ?>"></script>
<?php
}
else
{

  header("location: login.php");


}
?>