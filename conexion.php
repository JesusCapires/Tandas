<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "tanda";

// Conexión a la base de datos
$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Conexion fallida: " . $conn->connect_error);
}

// Realizar la inserción
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST["accion"];
    if($accion == 1){
        $fecha = $_POST["datos"]["fecha"];
        $fechaf = $_POST["datos"]["fechaf"];
        $nombrer = $_POST["datos"]["nombrer"];
        $tipo = $_POST["datos"]["tipo"];
    
        $insertTanda = "INSERT INTO tandas(nomTanda, fechaIni, fechaFin, tipo) VALUES('$nombrer', '$fecha', '$fechaf', '$tipo')";
    
        $result = mysqli_query($conn, $insertTanda);

        if($result){
            echo json_encode(array("result" => true));
        }

    }
    if($accion == 2){
        $registros = $_POST["datos"];
        $personap = $_POST["datos"]["personap"];
        $montop = $_POST["datos"]["montop"];
        $nombrep = $_POST["datos"]["nombrep"];
        
        $insertPago = "INSERT INTO pagos(fecha, nomPaog, persona, monto) VALUES(NOW(), '$nombrep', '$personap', '$montop')";
    
        $result = mysqli_query($conn, $insertPago);

        if($result){
            echo json_encode(array("result" => true, "registro" => $registros));
        }

    }

}



// $conn->close();
?>
