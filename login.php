<?php
session_start();
include 'action/config.php';
if (isset($_POST['email'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  if ($user->login($email,$password)) {
    $user->redirect('home/?page=dashboard');
  }else
  {
    $error = "Login Failed";
  }
}
if ($user->logged() !="") {
  $user->redirect('home/?page=dashboard');
}
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
   <title>Login &mdash; Starnews</title>

   <!-- General CSS Files -->
   <link rel="stylesheet" href="assets/admin//modules/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="assets/admin//modules/fontawesome/css/all.min.css">

   <!-- CSS Libraries -->
   <link rel="stylesheet" href="assets/admin//modules/bootstrap-social/bootstrap-social.css">

   <!-- Template CSS -->
   <link rel="stylesheet" href="assets/admin//css/style.css">
 </head>

 <body>
   <div id="app">
     <section class="section">
       <div class="container mt-5">
         <div class="row">
           <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
             <div class="login-brand">
               <img src="assets/admin//img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
             </div>

             <div class="card card-primary">
               <div class="card-header"><h4>Login</h4></div>
              <?php if(isset($error))
               {
                     ?>
                       <div class="col-md-12">
                         <div class="alert alert-danger">
                             <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                         </div>
                       </div>
                     <?php
               }
               ?>
               <div class="card-body">
                 <form method="POST" action="" class="needs-validation" novalidate="">
                   <div class="form-group">
                     <label for="email">Email</label>
                     <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                     <div class="invalid-feedback">
                       Please fill in your email
                     </div>
                   </div>

                   <div class="form-group">
                     <div class="d-block">
                     	<label for="password" class="control-label">Password</label>

                     </div>
                     <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                     <div class="invalid-feedback">
                       please fill in your password
                     </div>
                   </div>

                   <div class="form-group">
                     <div class="custom-control custom-checkbox">
                       <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                       <label class="custom-control-label" for="remember-me">Remember Me</label>
                     </div>
                   </div>

                   <div class="form-group">
                     <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                       Login
                     </button>
                   </div>
                 </form>
               </div>
             </div>
             <div class="simple-footer">
               Copyright &copy; Starnews 2019
             </div>
           </div>
         </div>
       </div>
     </section>
   </div>

   <?php include 'AdminTemplates/partials/_script.php' ?>
 </body>
 </html>
