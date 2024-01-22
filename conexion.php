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

$resulTandGraf = mysqli_query($conn, "SELECT nomTanda, saldoAct FROM tandas");
$dataT = array();

$resulPagGraf = mysqli_query($conn, "SELECT persona, monto FROM pagos");
$dataP = array();

while($row = mysqli_fetch_assoc($resulTandGraf)){
  $dataT[] = $row; 
}
while($row2 = mysqli_fetch_assoc($resulPagGraf)){
    $dataP[] = $row2; 
  }
// encode a JSON
$dataJSON = json_encode($dataT);
$datapJSON = json_encode($dataP);

// Realizar la inserción
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST["accion"];
    if($accion == 1){
        $fecha = $_POST["datos"]["fecha"];
        $fechaf = $_POST["datos"]["fechaf"];
        $nombrer = $_POST["datos"]["nombrer"];
        $tipo = $_POST["datos"]["tipo"];
        $inicio = new DateTime($fecha);
        $fin = new DateTime($fechaf);
        
        $diferencia = $fin->diff($inicio); 
        $dias = $diferencia->days;
        
        $turnos = floor($dias / 7) + 1;

        $insertTanda = "INSERT INTO tandas(nomTanda, fechaIni, fechaFin, tipo, turnos) VALUES('$nombrer', '$fecha', '$fechaf', '$tipo', '$turnos')";
    
        $result = mysqli_query($conn, $insertTanda);

        if($result){
            echo json_encode(array("result" => true));
        }

    }
    if ($accion == 2) {
        $registros = $_POST["datos"];
        $personap = $_POST["datos"]["personap"];
        $montop = $_POST["datos"]["montop"];
        $nombrep = $_POST["datos"]["nombrep"];
        $tipoP = $_POST["datos"]["tipoP"];
    
        // Insertar el pago en la tabla pagos
        $insertPago = "INSERT INTO pagos(fecha, nomPaog, persona, monto, tipoP) VALUES(NOW(), '$nombrep', '$personap', '$montop', '$tipoP')";
        $result = mysqli_query($conn, $insertPago);
    
        if ($result) {
            // Obtener el ID del último pago insertado
            $idPago = mysqli_insert_id($conn);
    
            // Obtener la tanda correspondiente
            $idTanda = $_POST["datos"]["idTanda"]; // Asegúrate de tener este valor disponible
    
            // Obtener el saldo actual de la tanda
            $selectSaldo = "SELECT saldoAct FROM tandas WHERE idTanda = $idTanda";
            $resultSaldo = mysqli_query($conn, $selectSaldo);
            $filaSaldo = mysqli_fetch_assoc($resultSaldo);
            $saldoActual = $filaSaldo['saldoAct'];
            if($tipoP == "Entrega"){
                $nuevoSaldo = $saldoActual - $montop;
            }else{ 
                $nuevoSaldo = $saldoActual + $montop;
            }
            // Actualizar el campo saldoAct en la tabla tandas
            $updateSaldo = "UPDATE tandas SET saldoAct = $nuevoSaldo WHERE idTanda = $idTanda";
            $resultUpdateSaldo = mysqli_query($conn, $updateSaldo);
    
            if ($resultUpdateSaldo) {
                echo json_encode(array("result" => true, "registro" => $registros));
            } else {
                echo json_encode(array("result" => false, "error" => "Error al actualizar el saldo"));
            }
        } else {
            echo json_encode(array("result" => false, "error" => "Error al insertar el pago"));
        }
    }

}



// $conn->close();
?>
