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

if(empty($nombre_paciente))
	{
		$nombre_paciente_error = 'Nombre del paciente requerido';
	}
	else
	{
		if(!preg_match("/^[a-zA-Z-' ]*$/", $nombre_paciente))
		{
			$nombre_paciente_error = 'Solo se permiten letras y espacios en blanco';
		}
	}

	if(empty($fecha_muestra))
	{
		$fecha_muestra_error = 'Fecha de la toma de muestra requerida';
	}

	if(empty($edad_paciente))
	{
		$edad_paciente_error = 'Edad del paciente requerida';
	}
	else
	{
		if(!preg_match("/^[^0-200]*$/", $edad_paciente))
		{
			$edad_paciente_error = 'Solo se permiten números';
		}
	}

	if(empty($sexo_paciente))
	{
		$sexo_paciente_error = 'Sexo del paciente requerido';
	}

	if(empty($resultado_muestra))
	{
		$resultado_muestra = 'Resultado de la muestra requerido';
	}

	if($name_error == '' && $email_error == '' && $website_error == '' && $comment_error == '' && $gender_error == '')
	{
		//put insert data code here 

		$data = array(
			'nombre_paciente'      =>	$nombre_paciente,
			'fecha_muestra'		   =>	$fecha_muestra,
			'edad_paciente'		   =>	$edad_paciente,
			'sexo_paciente'		   =>	$sexo_paciente,
			'resultado_muestra'	   =>	$resultado_muestra,
      'comentarios_paciente' =>	$comentarios_paciente
		);

		$sql = "INSERT INTO `pacientes` (`nombre_paciente`, `edad_paciente`, `sexo_paciente`, `fecha_muestra`, `resultado_muestra`, `comentarios_paciente`) VALUES ('$nombre_paciente', '$edad_paciente', '$sexo_paciente', '$fecha_muestra', '$resultado_muestra', '$comentarios_paciente')";

		$rs = mysqli_query($con, $sql);

		$success = '<div class="alert alert-success">Datos del paciente guardados</div>';
	}

	$output = array(
		'success'		            =>	$success,
		'nombre_paciente_error'	    =>	$nombre_paciente_error,
		'fecha_muestra_error'	    =>	$fecha_muestra_error,
		'edad_paciente_error'	    =>	$edad_paciente_error,
		'sexo_paciente_error'	    =>	$sexo_paciente_error,
		'resultado_muestra_error'	=>	$resultado_muestra_error
	);

	echo json_encode($output);
	
}

?>