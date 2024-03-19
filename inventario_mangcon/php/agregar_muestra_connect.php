<?php

// 
if(isset($_POST['tipoMuestra'])){

$host = "localhost";
$username = "root";
$passwd = "";
$dbname = "inventario_vegetales";

//Database connection code - localhost, db_user, db_pass and db_name
$con = mysqli_connect($host, $username, $passwd, $dbname);

//Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

// get the post records
$tipoMuestra = $_POST['tipoMuestra'];
$procedencia = $_POST['procedencia'];
$municipio = $_POST['municipio'];
$coordenadas = $_POST['coordenadas'];
$predio = $_POST['predio'];
$fechaTomaMuestra = $_POST['fechaTomaMuestra'];
$claveInterna = $_POST['claveInterna'];
$nombreProductor = $_POST['nombreProductor'];
$tipoRiego = $_POST['tipoRiego'];
$temporada = $_POST['temporada'];
$tipoManejo = $_POST['tipoManejo'];
$observaciones = $_POST['observaciones'];

// database insert SQL code
$sql = "INSERT INTO `muestras` (`tipoMuestra`, `procedencia`, `municipio`, `coordenadas`, `predio`, `fechaTomaMuestra`, `claveInterna`, `nombreProductor`, `tipoRiego`, `temporada`, `tipoManejo`, `observaciones`) 
VALUES ('$tipoMuestra', '$procedencia', '$municipio', '$coordenadas','$predio', '$fechaTomaMuestra', '$claveInterna', '$nombreProductor', '$tipoRiego', '$temporada', '$tipoManejo', '$observaciones')";

// insert in database
$rs = mysqli_query($con, $sql);

header("Location: /inventario_vegetales/agregar_muestra.php");
}
?>