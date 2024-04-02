<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/inventario_mangcon/styles/header.css">
    <link rel="stylesheet" href="/inventario_mangcon/styles/buttons.css">
    <link rel="stylesheet" href="/inventario_mangcon/styles/formulario.css">
    <link rel="stylesheet" href="/inventario_mangcon/styles/web_body.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/add-r.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;400;500;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="/inventario_mangcon/images/logo.png">
    <script src="/js/jquery.js"></script>
    <script src="/js/jquery.validate.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario de 912 Mangueras y Conexiones</title>
</head>
<body style="height: 1000px;">

<div class="sidebar">
        <div class="ciad_logo_container">
            <form>
                <img src="/inventario_mangcon/images/logo.jpg" class="ciad_logo"
                type="submit" formaction="index.html">
            </form>
        </div>
        <div class="lista_muestras_button_container">
            <form>
                <button class="lista_muestras_button"
                type="submit" formaction="lista_muestras.php">Lista de artículos</button>
            </form>
        </div>
        <div class="agregar_muestra_button_container">
            <form>
                <button class="agregar_muestra_button"
                type="submit"
                formaction="agregar_muestra.php">Agregar artículo</button>
            </form>
        </div>
        <div class="agregar_muestra_button_container">
            <form>
                <button class="agregar_muestra_button"
                type="submit"
                formaction="agregar_muestra.php">Buscar artículo</button>
            </form>
        </div>
        <!--<div class="editar_muestra_button_container">
            <form>
                <button class="editar_muestra_button"
                type="submit" formaction="editar_muestra.php">Editar muestra</button>
            </form>
        </div>-->
</div>

    <div>
        <form name="form_datos_muestra" method="post" action="">
        <fieldset>
                <legend class="form_datos_muestra_header">Información del artículo</legend>

                <div style="margin-bottom: 10px;">
                    <label for="concepto">Concepto:</label>
                    <input type="text" name="concepto" id="concepto" style="margin-left:20px;">
                </div>

                <div style="margin-bottom: 10px;">
                    <label for="precio_publico">Precio al público con IVA incluido:</label>
                    <input type="text" name="precio_publico" id="precio_publico" >
                </div>

                <div style="margin-bottom: 10px;">
                    <label for="ult_actual">Última actualización:</label>
                    <input type="date" name="ult_actual" id="ult_actual" >
                </div>

                <div style="margin-bottom: 10px;">
                    <label for="cant_sug_stock">Cantidad sugerida en stock:</label>
                    <input type="text" name="cant_sug_stock" id="cant_sug_stock" >
                </div>

                <p>&nbsp;</p>
                <p>
                    <input type="submit" name="Submit" id="submit" class="submit_button" value="Guardar">
                </p>
            </fieldset>
        </form>
    </div>
</body>
</html>

<?php
// Configuración de la base de datos
$host = "localhost";
$username = "root";
$passwd = "";
$dbname = "inv_912";

$con      = mysqli_connect($host, $username, $passwd, $dbname);

if (!$con) {
    die(mysqli_connect_error());
} else {
    echo "Edición de artículo <br> <br>";
}

// Obtener el código la muestra de la URL
if (isset($_GET['concepto'])) {
    $concepto = $_GET['concepto'];

    // Obtener datos actuales dla muestra
    $sql = "SELECT * FROM articulos WHERE concepto = '$concepto'";
    $result = mysqli_query($con, $sql);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "No se encontró la muestra con el código: $concepto";
        exit();
    }
} else {
    echo "El código la muestra no está presente en la URL.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inicializar un array para almacenar los campos y valores a actualizar
    $campos_actualizar = array();

    // Obtener los valores actualizados del formulario y construir el array
    $precio_publico = $_POST['precio_publico'];
    if (!empty($precio_publico)) {
        $campos_actualizar[] = "precio_publico = '$precio_publico'";
    }

    $ult_actual = $_POST['ult_actual'];
    if (!empty($ult_actual)) {
        $campos_actualizar[] = "ult_actual = '$ult_actual'";
    }

    $cant_sug_stock = $_POST['cant_sug_stock'];
    if (!empty($cant_sug_stock)) {
        $campos_actualizar[] = "cant_sug_stock = '$cant_sug_stock'";
    }

    // Verificar si hay campos para actualizar
    if (!empty($campos_actualizar)) {
        // Construir la consulta de actualización
        $update_sql = "UPDATE articulos SET " . implode(", ", $campos_actualizar) . " WHERE concepto = '$concepto'";

        // Ejecutar la consulta de actualización
        if (mysqli_query($con, $update_sql)) {
            echo "<p style='margin-left:210px;'>Registro actualizado correctamente</p>";
        } else {
            echo "<p style='margin-left:210px;'>Error al actualizar el registro: </p>" . mysqli_error($con);
        }
    } else {
        echo "<p style='margin-left:210px;'>No se proporcionaron datos para actualizar.</p>";
    }
}

mysqli_close($con);
?>