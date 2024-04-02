<?php

// 
if(isset($_POST['concepto'])){

$host = "localhost";
$username = "root";
$passwd = "";
$dbname = "inv_912";

//Database connection code - localhost, db_user, db_pass and db_name
$con = mysqli_connect($host, $username, $passwd, $dbname);

//Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

// get the post records
$concepto = $_POST['concepto'];
$precio_publico = $_POST['precio_publico'];
$ult_actual = $_POST['ult_actual'];
$cant_sug_stock = $_POST['cant_sug_stock'];

// database insert SQL code
$sql = "INSERT INTO `articulos` (`concepto`, `precio_publico`, `ult_actual`, `cant_sug_stock`) 
VALUES ('$concepto', '$precio_publico', '$ult_actual', '$cant_sug_stock')";

// insert in database
$rs = mysqli_query($con, $sql);

header("Location: /inventario_mangcon/agregar_muestra.php");
}
?>