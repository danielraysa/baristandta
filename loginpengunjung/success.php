
<?php
  session_start();
  setlocale (LC_TIME, 'INDONESIAN');
  date_default_timezone_set("Asia/Jakarta");
?>
<html>
<head>
  <title>Login dan Pendaftaran Pengunjung</title>
  <link rel="stylesheet" type="text/css" href="login.css" >
  <script src="../plugins/jquery/jquery.js"></script>
</head>
<body>

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <a id="login-form-link" href="#"><h2 id="login-text" class="active">Register</h2></a>
    
    <!-- <a role="button" href="signup.php"><h2 class="inactive underlineHover">Sign Up</h2></a> -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="../report/LOGOKEMENPRN.jpg" id="icon" alt="User Icon" />
    </div>
<BR>

    <!-- Login Form -->
    <form id="login-form" method="post" action="action-check.php" role="form" style="display: block;">
      <b>ID Pendaftaran</b> (untuk disimpan)
      <input type="text" class="fadeIn second" value="<?php echo $_SESSION['temp_id']; ?>" readonly>
      <br>
      Come back again at
      <input type="text" class="fadeIn second" name="username" value="<?php echo strftime("%d %B %Y %T", strtotime($_SESSION['temp_date'])); ?>" readonly>
      <BR>
      <!--<input type="submit" class="fadeIn fourth" name="login" value="Return">-->
      <a href="download.php" type="button" class="fadeIn third">Download Data Pendaftaran</a>
      <br>
      <a href="index.php" type="button" class="fadeIn third">Return to Login</a>
    </form>
    <!-- Register Form -->
  
  </div>
</div>

</body>
</html>