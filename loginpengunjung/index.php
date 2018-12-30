<html>
<head>
  <title>Login dan Pendaftaran Pengunjung </title>
  <link rel="stylesheet" type="text/css" href="login.css" >
  <script src="../plugins/jquery/jquery.js"></script>
</head>
<body>

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <a id="login-form-link" href="#"><h2 id="login-text" class="active">Login</h2></a>
    <a id="register-form-link" href="#"><h2 id="register-text" class="inactive underlineHover">Pendafataran Produk</h2></a>
    <!-- <a role="button" href="signup.php"><h2 class="inactive underlineHover">Sign Up</h2></a> -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="../report/LOGOKEMENPRN.jpg" id="icon" alt="User Icon" />
    </div>
<BR>

    <!-- Login Form -->
    <form id="login-form" method="post" action="action-check.php" role="form" style="display: block;">
      <input type="text" class="fadeIn second" name="username" placeholder="Username">
      <input type="password" class="fadeIn second" name="password" placeholder="Password">
      <BR>
      <input type="submit" class="fadeIn fourth" name="login" value="Log In">
    </form>
    <!-- Register Form -->
    <form id="register-form" method="post" action="register-action.php" role="form" style="display: none;">
      <input type="text" class="fadeIn second" name="namaproduk" placeholder="Nama Produk">
      <BR>
      <select class="fadeIn second" name="jenisproduk">
      <option value="">Jenis Produk</option>
        <option value="Makanan/Minuman">Makanan/Minuman</option>
        <option value="Non Makanan/Minuman">Non Makanan/Minuman</option>
      </select>
      <BR>
      <input type="text" class="fadeIn second" name="namaperusahaan" placeholder="Nama Perusahaan">
      <BR>
      <input type="submit" class="fadeIn fourth" name="register" value="Daftar Sekarang">
    </form>
    <!-- Remind Passowrd -->
   
  
  </div>
</div>
<script>
  $(function() {
    $('#login-form-link').click(function(e) {
    $("#login-form").delay(50).fadeIn(50);
    $("#register-form").fadeOut(50);
    $('#register-text').removeClass('active');
    $('#register-text').addClass('inactive underlineHover');
    $('#login-text').addClass('active');
    $(this).addClass('active');
    e.preventDefault();
    });
    $('#register-form-link').click(function(e) {
    $("#register-form").delay(50).fadeIn(50);
    $("#login-form").fadeOut(50);
    $('#login-text').removeClass('active');
    $('#login-text').addClass('inactive underlineHover');
    $('#register-text').addClass('active');
    $(this).addClass('active');
    e.preventDefault();
    });
  });
</script>
</body>
</html>