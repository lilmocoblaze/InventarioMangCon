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

    <div>
        <form name="form_datos_muestra" method="post" action="">
            <fieldset>
            <legend class="form_datos_muestra_header">Datos de la Muestra a editar</legend>
                <div style="margin-bottom: 10px;">
                    <label for="tipoMuestra">Tipo de muestra:</label>
                    <input type="radio" id="suelo" name="tipoMuestra" value="Suelo">
                    <label for="Suelo">Suelo</label>
                    <input type="radio" id="lixiviado" name="tipoMuestra" value="Lixiviado">
                    <label for="Lixiviado">Lixiviado</label>
                    <input type="radio" id="granoDeMaiz" name="tipoMuestra" value="Grano de Maiz">
                    <label for="Maiz">Grano de Maíz</label>
                </div>
                
                <div style="margin-bottom: 10px;">
                    <label for="procedencia">Procedencia:</label>
                    <select name="procedencia" id="procedencia">
                        <option value="no">Seleccione uno...</option>
                        <option value="Aguascalientes">Aguascalientes</option>
                        <option value="Baja California">Baja California</option>
                        <option value="Baja California Sur">Baja California Sur</option>
                        <option value="Campeche">Campeche</option>
                        <option value="Chiapas">Chiapas</option>
                        <option value="Chihuahua">Chihuahua</option>
                        <option value="CDMX">Ciudad de México</option>
                        <option value="Coahuila">Coahuila</option>
                        <option value="Colima">Colima</option>
                        <option value="Durango">Durango</option>
                        <option value="Estado de México">Estado de México</option>
                        <option value="Guanajuato">Guanajuato</option>
                        <option value="Guerrero">Guerrero</option>
                        <option value="Hidalgo">Hidalgo</option>
                        <option value="Jalisco">Jalisco</option>
                        <option value="Michoacán">Michoacán</option>
                        <option value="Morelos">Morelos</option>
                        <option value="Nayarit">Nayarit</option>
                        <option value="Nuevo León">Nuevo León</option>
                        <option value="Oaxaca">Oaxaca</option>
                        <option value="Puebla">Puebla</option>
                        <option value="Querétaro">Querétaro</option>
                        <option value="Quintana Roo">Quintana Roo</option>
                        <option value="San Luis Potosí">San Luis Potosí</option>
                        <option value="Sinaloa">Sinaloa</option>
                        <option value="Sonora">Sonora</option>
                        <option value="Tabasco">Tabasco</option>
                        <option value="Tamaulipas">Tamaulipas</option>
                        <option value="Tlaxcala">Tlaxcala</option>
                        <option value="Veracruz">Veracruz</option>
                        <option value="Yucatán">Yucatán</option>
                        <option value="Zacatecas">Zacatecas</option>
                    </select>      
                </div>

                <div style="margin-bottom: 10px;">
                    <label for="municipio">Municipio:</label>
                    <input type="text" name="municipio" id="municipio">
                </div>

                <div style="margin-bottom: 10px;">
                    <label for="coordenadas">Coordenadas de dónde se tomó la muestra:</label>
                    <input type="text" name="coordenadas" id="coordenadas">
                </div>

                <div style="margin-bottom: 10px;">
                    <label for="predio">Predio:</label>
                    <input type="text" name="predio" id="predio">
                </div>

                <div style="margin-bottom: 10px;">
                    <label for="fecha">Fecha en la que se tomó la muestra:</label>
                    <input type="date" name="fechaTomaMuestra" id="fechaTomaMuestra">
                </div>

                <div style="margin-bottom: 10px;">
                    <label for="nombreProductor">Nombre del Productor:</label>
                    <input type="text" name="nombreProductor" id="nombreProductor">
                </div>

                <div style="margin-bottom: 10px;">
                    <label for="tipoRiego">Tipo de riego:</label>
                    <input type="radio" id="temporal" name="tipoRiego" value="Temporal">
                    <label for="temporal">Temporal</label>
                    <input type="radio" id="riegoControlado" name="tipoRiego" value="Riego controlado">
                    <label for="riegoControlado">Riego controlado</label>
                    <input type="radio" id="noAplica" name="tipoRiego" value="No aplica">
                    <label for="noAplica">No aplica</label>
                </div>

                <div style="margin-bottom: 10px;">
                    <label for="temporada">Temporada(Año):</label>
                    <input type="number" name="temporada" id="temporada">
                </div>

                <div style="margin-bottom: 10px;">
                    <label for="tipoManejo">Tipo de riego:</label>
                    <input type="radio" id="practicasAgro" name="tipoManejo" value="Prácticas Agroecológicas">
                    <label for="practicasAgro">Prácticas Agroecológicas</label>
                    <input type="radio" id="convencional" name="tipoManejo" value="Convencional">
                    <label for="convencional">Convencional</label>
                    <input type="radio" id="noAplica" name="tipoManejo" value="No aplica">
                    <label for="noAplica">No aplica</label>
                </div>

                <div>
                    <label for="observaciones">Observaciones</label>
                    <br>
                    <textarea name="observaciones" id="observaciones" class="observaciones"></textarea>
                </div>
            
                <input type="submit" value="Guardar" class="submit_button">
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
$dbname = "inventario_vegetales";

$con      = mysqli_connect($host, $username, $passwd, $dbname);

if (!$con) {
    die(mysqli_connect_error());
} else {
    echo "Edición de paciente <br> <br>";
}

// Obtener el código la muestra de la URL
if (isset($_GET['claveInterna'])) {
    $claveInterna = $_GET['claveInterna'];

    // Obtener datos actuales dla muestra
    $sql = "SELECT * FROM muestras WHERE claveInterna = '$claveInterna'";
    $result = mysqli_query($con, $sql);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "No se encontró la muestra con el código: $claveInterna";
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
    $tipoMuestra = $_POST['tipoMuestra'];
    if (!empty($tipoMuestra)) {
        $campos_actualizar[] = "tipoMuestra = '$tipoMuestra'";
    }

    $procedencia = $_POST['procedencia'];
    if (!empty($procedencia)) {
        $campos_actualizar[] = "procedencia = '$procedencia'";
    }

    $municipio = $_POST['municipio'];
    if (!empty($municipio)) {
        $campos_actualizar[] = "municipio = '$municipio'";
    }

    $coordenadas = $_POST['coordenadas'];
    if (!empty($coordenadas)) {
        $campos_actualizar[] = "coordenadas = '$coordenadas'";
    }

    $predio = $_POST['predio'];
    if (!empty($predio)) {
        $campos_actualizar[] = "predio = '$predio'";
    }

    $fechaTomaMuestra = $_POST['fechaTomaMuestra'];
    if (!empty($fechaTomaMuestra)) {
        $campos_actualizar[] = "fechaTomaMuestra = '$fechaTomaMuestra'";
    }

    $nombreProductor = $_POST['nombreProductor'];
    if (!empty($nombreProductor)) {
        $campos_actualizar[] = "nombreProductor = '$nombreProductor'";
    }

    $tipoRiego = $_POST['tipoRiego'];
    if (!empty($tipoRiego)) {
        $campos_actualizar[] = "tipoRiego = '$tipoRiego'";
    }

    $temporada = $_POST['temporada'];
    if (!empty($temporada)) {
        $campos_actualizar[] = "temporada = '$temporada'";
    }

    $tipoManejo = $_POST['tipoManejo'];
    if (!empty($tipoManejo)) {
        $campos_actualizar[] = "tipoManejo = '$tipoManejo'";
    }

    $observaciones = $_POST['observaciones'];
    if (!empty($observaciones)) {
        $campos_actualizar[] = "observaciones = '$observaciones'";
    }

    // Verificar si hay campos para actualizar
    if (!empty($campos_actualizar)) {
        // Construir la consulta de actualización
        $update_sql = "UPDATE muestras SET " . implode(", ", $campos_actualizar) . " WHERE claveInterna = '$claveInterna'";

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