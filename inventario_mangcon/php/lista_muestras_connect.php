<?php

// 
if(isset($_POST['tipoMuestra'])){

    $host = "localhost";
    $username = "root";
    $passwd = "";
    $dbname = "inventario_vegetales";

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
  }

//Database connection code - localhost, db_user, db_pass and db_name
$con       = mysqli_connect($host, $username, $passwd, $dbname);
$tableName = "muestras";
$columns   = [`tipoMuestra`, `procedencia`, `municipio`, `coordenadas`, `predio`, `fechaTomaMuestra`, `claveInterna`, `nombreProductor`, `tipoRiego`, `temporada`, `tipoManejo`, `observaciones`];
$fetchData = fetch_data($con, $tableName, $columns);

function fetch_data($con, $tableName, $columns){
    if (empty($con)){
        $msg = "Error en la conexión con la base de datos.";
    }elseif (empty($columns) || !is_array($columns)){
        $msg = "El nombre de las columnas debe ser definido en un array indexado.";
    }elseif(empty($tableName)){
        $msg = "El nombre de la tabla está vacío";
    }else{
        
        $columnName = implode(', ', $columns);
        $sql = "SELECT ".$columnName." FROM $tableName"."ORDER BY tipoMuestra DESC";
        $rs = mysqli_query($con, $sql);

        if($rs== true){
            if ($rs->num_rows > 0){
                $row = mysqli_fetch_all($rs, MYSQLI_ASSOC);
                $msg = $row;
            } else {
                $msg = "No data found";
            }
        }
    }
    return $msg;
}

header("Location: /inventario_vegetales/lista_muestras.php");
}
?>