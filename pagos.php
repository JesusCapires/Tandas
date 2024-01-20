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
        <h1 class="pago">Pagos</h1>
        <button class="login-button" data-toggle="modal" data-target="#pagosModal">Crear</button>
    </div>
    <?php if ($result->num_rows > 0) { ?>
    <table id="tablePagos" class="table-bordered">
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Persona</th>
            <th>Monto</th>
            <th>Tipo</th>
        </tr>
    </thead>
    <tbody>
    <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['fecha']; ?></td>
            <td><?php echo $row['persona']; ?></td>
            <td><?php echo $row['monto']; ?></td>
            <td><?php echo $row['tipoP']; ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<?php } ?>

<div class="modal fade" id="pagosModal"  role="dialog" aria-labelledby="pagosModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="pagosModalLabel">Registrar pago</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form id="formPagos">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="nombrep">Nombre:</label>
                                <input type="text" class="form-control" placeholder= "Nombre" id="nombrep" name="nombrep" required>
                            </div>
                            <div class="form-group col-md-6">
                            <label for="personap">Persona:</label>
                            <input type="text" class="form-control" id="personap" name="personap" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="montop">Monto:</label>
                                <input type="text" class="form-control" id="montop" name="montop" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="idTanda">Tanda:</label>
                                <select class="form-control" id="idTanda" name="idTanda" required>
                                    <?php
                                    $tandas = "SELECT idTanda, nomTanda FROM tandas";
                                    $result = $conn->query($tandas);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<option value='" . $row['idTanda'] . "'>" . $row['nomTanda'] . "</option>";
                                        }
                                    } else {
                                        echo "<option value=''>No hay tandas disponibles</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="tipoP">Tipo de pago:</label>
                                <select class="form-control" id="tipoP" name="tipoP" required>
                                    <option value="Entrega">Entrega</option>
                                    <option value="Recibo">Recibo</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>        
            </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-serializejson/jquery.serializejson.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        let idiomEsp = {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            }
        }
        let table = new DataTable('#tablePagos', {
            responsive: true,
            language: idiomEsp
        });
        // Inicializar el plugin
        $("#formPagos").validate({
            rules: {
                nombref: {
                required: true,
                },
                personap: {
                required: true
                },
                montop: {
                required: true
                }
            },
            messages: {
                nombref: {
                required: "El nombre es obligatorio",
                },
                personap: {
                required: "La persona es obligatoria",
                },
                montop: {
                required: "El monto es obligatoria",
                }
            },
            submitHandler: function(form) {
                alert("Enviando formulario...");
                let datos = $("#formPagos").serializeJSON();
                let accion = 2;
                $.ajax({
                    url: 'conexion.php',
                    type: 'POST',
                    data: {datos, accion},
                    datatype: 'json',
                    success: function (respuesta) {
                        const obj = JSON.parse(respuesta);
                        console.log(obj.result);
                        console.log(accion);
                        if(obj.result){
                            Swal.fire({
                                icon: "success",
                                title: "Registro exitosso",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                        // table.destroy();
                        // table.row.add(obj.registro).draw();

                    },
                    error: function(xhr, status, error){
                        console.log(xhr);
                    }
                })
            }
        }
);
        
    </script>
</body>
</html>