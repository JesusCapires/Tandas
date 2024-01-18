<?php

include "conexion.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {

  $usuario = $_POST['usuario'];
  $password = $_POST['password'];

  $sql = "SELECT idUsr FROM usuarios WHERE nomusr='$usuario' AND passusr='$password'";

  $result = $conn->query($sql);

  if($result->num_rows > 0) {
    
    header("Location: index.php");
    exit();

  } else {

    $error = "Usuario o contraseña mal ingresado";

  }

}

?>

  <!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="static/login.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <title>Login</title>
</head>
<body>
  <div class="login-container">
    <div class="login-card">
      <div class="profile-image-container">
        <img src="static/images/cuenta.png" alt="Perfil">
      </div>
      <form method="POST">
        <div class="input-container">
            <i class="fas fa-user input-icon" style="color: #812CC6;"></i>
            <input type="text" name="usuario" placeholder="Usuario" class="input-field m"> 
        </div>
        <div class="input-container">
            <i class="fas fa-lock input-icon" style="color: #812CC6;"></i>
            <input type="password" name="password" placeholder="Contraseña" class="input-field">
        </div>
        <button type="submit" class="login-button">LOGIN</button>
      </form>
    </div>
  </div>
  <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>