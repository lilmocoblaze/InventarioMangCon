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

// database insert SQL code
$sql = "UPDATE pacientes SET nombrePaciente='prueba2' WHERE codigoPaciente='prueba' ";

// insert in database
$rs = mysqli_query($con, $sql);

header("Location: /inventario_ciad/lista_muestras.php");
}
?>