<?php

// 
if(isset($_POST['nombre_paciente'])){

$host = "localhost";
$username = "root";
$passwd = "";
$dbname = "inventario_muestras";

//Database connection code - localhost, db_user, db_pass and db_name
$con = mysqli_connect($host, $username, $passwd, $dbname);

//Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

// Define error parameters
$nombre_paciente_error = '';
$fecha_muestra_error = '';
$edad_paciente_error = '';
$sexo_paciente_error = '';
$resultado_muestra_error = '';

// get the post records
$nombre_paciente = $_POST['nombre_paciente'];
$fecha_muestra = $_POST['fecha_muestra'];
$edad_paciente = $_POST['edad_paciente'];
$sexo_paciente = $_POST['sexo_paciente'];
$resultado_muestra = $_POST['resultado_muestra'];
$comentarios_paciente = $_POST['comentarios_paciente'];

// database insert SQL code
$sql = "INSERT INTO `pacientes` (`nombre_paciente`, `edad_paciente`, `sexo_paciente`, `fecha_muestra`, `resultado_muestra`, `comentarios_paciente`) VALUES ('$nombre_paciente', '$edad_paciente', '$sexo_paciente', '$fecha_muestra', '$resultado_muestra', '$comentarios_paciente')";

// insert in database
$rs = mysqli_query($con, $sql);

}
?>