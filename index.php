<?php
  
  require_once("config/conexion.php");

  if(isset($POST["enviar"]) and $POST["enviar"]=="si"){
    require_once ("models/Usuario.php");
    /*TODO: Inicializando Clase */
    $usuario = new Usuario();
    $usuario->login();
  }
  ?>


<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Document</title>

 <!-- CSS Bootstrap y Font Awesome -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

 <!-- Theme style -->
 <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

 <!-- jQuery y popper.js -->
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>
<body class="hold-transition login-page">
 <div class="login-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="../../index3.html" method="post">
          <div class="input-group mb-3">
            <input type="email" name='correo' id='correo' class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name='passwd' id='passwd' class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <input type="hidden" name='enviar' value='si'>
              <button type='submit' class='btn btn-primary btn-block'>Acceder</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

 <?php
  if(isset($GET["m"])){
    switch($GET["m"]){
      case "1";
        ?>
        <div class="alert alert-danger" role="alert">
          Los datos ingresados son incorrectos!
        </div>
        <?php
        break;
      case "2";
        ?>
          <div class="alert alert-warning" role="alert">
            El formulario tiene los campos vacios!
          </div>
        <?php
        break;    
    }
  }
?>

        <div class="social-auth-links text-center mt-2 mb-3">
          <a href="#" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
          </a>
          <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
          </a>
        </div>
        <!-- /.social-auth-links -->

        <p class="mb-1">
          <a href="forgot-password.html">I forgot my password</a>
        </p>
        <p class="mb-0">
          <a href="register.html" class="text-center">Register a new membership</a>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
 </div>
 <!-- /.login-box -->

 <!-- Bootstrap Switch -->
 <script src="../../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

 <!-- Script de inicio -->
 <script>
    $(function () {
      $("input[data-bootstrap-switch]").each(function () {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
      });
    });
 </script>
</body>
</html>