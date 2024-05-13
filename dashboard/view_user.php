<?php 
    include('header.php');
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $base_url = $protocol . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
    include '../config.php'; 
?>
    </header>
    <div class="body flex-grow-1 px-3 pb-3">
        <?php include(dirname(__FILE__).'/users/view_user.php'); ?>
    </div>
    <?php include(dirname(__FILE__).'/footer.php'); ?>
  </body>
</html>