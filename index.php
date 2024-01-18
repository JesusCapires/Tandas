<?php
include "conexion.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Tandas</title>
</head>
<body class = "bodyInd">
<nav class="navbar navbar-expand-lg navbar-dark">
    <img src="static/images/logo.png" width="60" height="60" class="d-inline-block align-top mr-4" alt="">
    <a class="text-white">
    Tandas
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <!-- <span class="navbar-toggler-icon"></span> -->
        <img src="static/images/menu.png" whidth = "30" height = "30">
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent" >
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Inicio<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="tandas.php">Tandas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="pagos.php">Pagos</a>
            </li>            
            <li class="nav-item">
                <a class="nav-link text-white" href="historial.php">Historial</a>
            </li>            
            <li class="nav-item">
                <a class="nav-link text-white" href="informes.php">Informes</a>
            </li>
        </ul>
    </div>
</nav>

  <h1>DASHBOARD Tandas Silver</h1>

  <!-- <script src="static/index.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>