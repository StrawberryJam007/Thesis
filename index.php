<?php

include 'asset/config.php';
session_start();

if (isset($_POST['submit'])) {

   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $password = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `admin` WHERE username = '$username' AND password = '$password'") or die('query failed');

   if (mysqli_num_rows($select) > 0) {
      $row = mysqli_fetch_assoc($select);

      header('location:admin/index.html');
   } else {
      $message[] = 'incorrect password or username!';
   }
}

?>
<?php
if (isset($message)) {
   foreach ($message as $message) {
      echo '<div class="alert alert-danger" role="alert" onclick="this.remove();">
      <p class="text-center">' . $message . '</p>
   </div>';
   }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Maternity-Record-Management-System</title>
   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="asset/fontawesome/css/all.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="asset/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
   <div class="login-box">
      <!-- Alert this using db -->

      <!-- /.login-logo -->
      <div class="card card-outline card-info">
         <div class="card-header text-center">
            <a href="index.html" class="brand-link">
               <img src="asset/img/Logo.jpg" alt="Logo" width="200">
            </a>
         </div>

         <div class="card-body">
            <form action="" method="post">
               <div class="input-group mb-3">
                  <input type="text" name="username" class="form-control" placeholder="Username">
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-user"></span>
                     </div>
                  </div>
               </div>
               <div class="input-group mb-3">
                  <input type="password" name="password" class="form-control" placeholder="Password">
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                     </div>
                  </div>

               </div>
               <div class="row">

                  <div class="col-6 offset-3">
                     <button type="submit" name="submit" class="btn btn-block btn-bg" style="background-color: rgb(96, 228, 155);">Login</button>
                  </div>
               </div>
            </form>

            </form>
            <!-- /.card-body -->
         </div>
         <!-- /.card -->
      </div>
      <!-- /.login-box -->
</body>

</html>