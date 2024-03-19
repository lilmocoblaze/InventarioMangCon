<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/inventario_vegetales/styles/header.css">
    <link rel="stylesheet" href="/inventario_vegetales/styles/buttons.css">
    <link rel="stylesheet" href="/inventario_vegetales/styles/formulario.css">
    <link rel="stylesheet" href="/inventario_vegetales/styles/web_body.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/add-r.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;400;500;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="/inventario_vegetales/images/logo.png">
    <script src="/js/jquery.js"></script>
    <script src="/js/jquery.validate.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Registro</title>
</head>
<body style="height: 1000px;">

    <div class="sidebar">
        <div class="ciad_logo_container">
            <form>
                <img src="/inventario_vegetales/images/logo.png" class="ciad_logo"
                type="submit" formaction="index.html">
            </form>
        </div>
        <div class="lista_muestras_button_container">
            <form>
                <button class="lista_muestras_button"
                type="submit" formaction="lista_muestras.php">Lista de muestras</button>
            </form>
        </div>
        <div class="agregar_muestra_button_container">
            <form>
                <button class="agregar_muestra_button"
                type="submit" formaction="agregar_muestra.php">Agregar muestra</button>
            </form>
        </div>
        <!--<div class="editar_muestra_button_container">
            <form>
                <button class="editar_muestra_button"
                type="submit" formaction="editar_muestra.php">Editar muestra</button>
            </form>
        </div>-->
    </div>
</body>
</html>

<?php
// Tu código de conexión a la base de datos
$host     = "localhost";
$username = "root";
$passwd   = "";
$dbname   = "inventario_vegetales";

$conn = mysqli_connect($host, $username, $passwd, $dbname);

if (!$conn) {
    die(mysqli_connect_error());
}

// Obtener el código del paciente a eliminar de la URL
if (isset($_GET['claveInterna'])) {
    $claveInternaEliminar = $_GET['claveInterna'];

    // Realizar la eliminación en la base de datos
    $delete_sql = "DELETE FROM muestras WHERE claveInterna = '$claveInternaEliminar'";

    if (mysqli_query($conn, $delete_sql)) {
        echo "Registro eliminado correctamente";
    } else {
        echo "Error al eliminar el registro: " . mysqli_error($conn);
    }
} else {
    echo "La clave interna de la muestra no está presente en la URL.";
}

mysqli_close($conn);
?>