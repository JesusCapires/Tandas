<?php
include "conexion.php";
$sql = "SELECT * FROM pagos";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/tandas.css">
    <link rel="stylesheet" href="static/index.css">
    <link rel="stylesheet" href="static/informes.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

    <title>Pagos</title>
</head>
<body class="bodyPag">
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
    <div class="itemshead">
        <h1 class="informe">Informes</h1>
    </div>
    <div class="tandass">
        <canvas id="myChart"> 

        </canvas>
    </div>
    <div class="pagoss">
        <canvas id="myChartP"> 

        </canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-serializejson/jquery.serializejson.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        let chartData = <?php echo $dataJSON; ?>;
        let chartPagData = <?php echo $datapJSON; ?>;
        const ctx = document.getElementById('myChart').getContext('2d');
        const ctxPag = document.getElementById('myChartP').getContext('2d');
        const options = {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                beginAtZero: true
                }
            }
        };

        const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: chartData.map(item => item.nomTanda),
            datasets: [{
            label: 'Saldo',
            data: chartData.map(item => item.saldoAct),
            backgroundColor: 'rgba(53, 0, 70, 0.733)'
            }]
        },
        options: options
        });

        const myChartP = new Chart(ctxPag, {
        type: 'bar',
        data: {
            labels: chartPagData.map(item => item.persona),
            datasets: [{
            label: 'Monto',
            data: chartPagData.map(item => item.monto),
            backgroundColor: 'rgba(53, 0, 70, 0.733)'
            }]
        },
        options: options
        });
</script>
</body>
</html>