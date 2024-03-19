<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/inventario_ciad/styles/header.css">
    <link rel="stylesheet" href="/inventario_ciad/styles/buttons.css">
    <link rel="stylesheet" href="/inventario_ciad/styles/formulario.css">
    <link rel="stylesheet" href="/inventario_ciad/styles/web_body.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/add-r.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;400;500;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="/inventario_ciad/images/logo.png">
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
                <img src="/inventario_ciad/images/logo.png" class="ciad_logo"
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
        <div class="editar_muestra_button_container">
            <form>
                <button class="editar_muestra_button"
                type="submit" formaction="editar_muestra.php">Editar muestra</button>
            </form>
        </div>
    </div>

    <div>
        <form name="form_datos_paciente" method="post" action="">
            <fieldset>
            <legend class="form_datos_paciente_header">Datos del paciente a editar</legend>
            
            <div style="margin-bottom: 10px;">
                <input type="hidden" name="codigoPaciente" value="<?php echo $codigoPaciente; ?>">
            </div>

            <div style="margin-bottom: 10px;">
                <label for="nombre">Nombre del Paciente:</label>
                <input type="text" name="nombrePaciente" value="<?php echo $row['nombrePaciente']; ?>" ><br>
            </div>

            <div style="margin-bottom: 10px;">
                <label for="fecha">Fecha de la Muestra:</label>
                <input type="date" name="fechaMuestra" value="<?php echo $row['fechaMuestra']; ?>" ><br>
            </div>

            <div style="margin-bottom: 10px;">
                <label for="codigopostal">Código Postal del Paciente:</label>
                <input type="number" name="cpPaciente" value="<?php echo $row['cpPaciente']; ?>" ><br>
            </div>

            <div style="margin-bottom: 10px;">
                <label for="edad">Edad del Paciente:</label>
                <input type="number" name="edadPaciente" value="<?php echo $row['edadPaciente']; ?>" ><br>
            </div>

            <div style="margin-bottom: 10px;">
                <label for="sexo">Sexo del Paciente:</label>
                <input type="text" name="sexoPaciente" value="<?php echo $row['sexoPaciente']; ?>" ><br>
            </div>

            <div style="margin-bottom: 10px;">
                <label for="resultado">Resultado de la Muestra:</label>
                <input type="text" name="resultadoMuestra" value="<?php echo $row['resultadoMuestra']; ?>" ><br>
            </div>

            <div style="margin-bottom: 10px;">
                <label for="comentariosPaciente">Comentarios del Paciente:</label>
                <br>
                <textarea name="comentariosPaciente" class="comentarios_paciente"><?php echo $row['comentariosPaciente']; ?></textarea><br>
            </div>
            
                <input type="submit" value="Guardar Cambios">
            </fieldset>
        </form>

        <body>
</body>
    </div>
</body>
</html>

<?php
// Configuración de la base de datos
$host     = "localhost";
$username = "root";
$passwd   = "";
$dbname   = "inventario_muestras";

$con      = mysqli_connect($host, $username, $passwd, $dbname);

if (!$con) {
    die(mysqli_connect_error());
} else {
    echo "Edición de paciente <br> <br>";
}

// Obtener el código del paciente de la URL
if (isset($_GET['codigoPaciente'])) {
    $codigoPaciente = $_GET['codigoPaciente'];

    // Obtener datos actuales del paciente
    $sql = "SELECT * FROM pacientes WHERE codigoPaciente = '$codigoPaciente'";
    $result = mysqli_query($con, $sql);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "No se encontró el paciente con el código: $codigoPaciente";
        exit();
    }
} else {
    echo "El código del paciente no está presente en la URL.";
    exit();
}

// Verificar si se envió el formulario POST para editar el paciente
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores actualizados del formulario
    $nombrePaciente = $_POST['nombrePaciente'];
    $fechaMuestra = $_POST['fechaMuestra'];
    $cpPaciente = $_POST['cpPaciente'];
    $edadPaciente = $_POST['edadPaciente'];
    $sexoPaciente = $_POST['sexoPaciente'];
    $resultadoMuestra = $_POST['resultadoMuestra'];
    $comentariosPaciente = $_POST['comentariosPaciente'];

    // Actualizar datos en la base de datos
    $update_sql = "UPDATE pacientes SET
                   nombrePaciente = '$nombrePaciente',
                   fechaMuestra = '$fechaMuestra',
                   cpPaciente = $cpPaciente,
                   edadPaciente = $edadPaciente,
                   sexoPaciente = '$sexoPaciente',
                   resultadoMuestra = '$resultadoMuestra',
                   comentariosPaciente = '$comentariosPaciente'
                   WHERE codigoPaciente = '$codigoPaciente'";

    if (mysqli_query($con, $update_sql)) {
        echo "Registro actualizado correctamente";
    } else {
        echo "Error al actualizar el registro: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>