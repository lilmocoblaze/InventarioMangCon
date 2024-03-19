<!DOCTYPE html>
<html lang="en">
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
    <title>Inventario de muestras</title>
    <style>
        table{
            width: 70%;
            margin: auto;
            font-family: Arial, Helvetica, sans-serif;
        }
        table, tr, th, td{
            border: 1px solid #d4d4d4;
            border-collapse: collapse;
            padding: 12px;
        }
        th, td{
            text-align: left;
            vertical-align: top;
        }
        tr:nth-child(even){
            background-color: #e7e9eb;
        }
        .data_table_container{
            margin-left: 210px;
        }
    </style>
</head>
<body>
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

    <div class="data_table_container">
        <?php
            // Tu código de conexión a la base de datos
            $host     = "localhost";
            $username = "root";
            $passwd   = "";
            $dbname   = "inventario_vegetales";

            $con      = mysqli_connect($host, $username, $passwd, $dbname);

            if(!$con) {
                die(mysqli_connect_error());
            } else {
                echo "Lista de muestras <br> <br>";
            }

            // Verificar si se envió el formulario POST para editar la muestra
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $claveInterna = $_POST['claveInterna'];
                // Puedes implementar la lógica de edición aquí utilizando el código proporcionado anteriormente
                   // Obtener datos actuales dla muestra
                $sql = "SELECT * FROM muestras WHERE claveInterna = '$claveInterna'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                } else {
                    echo "No se encontró la muestra con la clave interna: $claveInterna";
                    $conn->close();
                    exit();
                }

                // Actualizar datos en la base de datos
                $tipoMuestra = empty($_POST['tipoMuestra']) ? $row['tipoMuestra'] : $_POST['tipoMuestra'];
                $procedencia = empty($_POST['procedencia']) ? $row['procedencia'] : $_POST['procedencia'];
                $municipio = empty($_POST['municipio']) ? $row['municipio'] : $_POST['municipio'];
                $coordenadas = empty($_POST['coordenadas']) ? $row['coordenadas'] : $_POST['coordenadas'];
                $predio = empty($_POST['predio']) ? $row['predio'] : $_POST['predio'];
                $fechaTomaMuestra = empty($_POST['fechaTomaMuestra']) ? $row['fechaTomaMuestra'] : $_POST['fechaTomaMuestra'];
                $claveInterna = empty($_POST['claveInterna']) ? $row['claveInterna'] : $_POST['claveInterna'];
                $nombreProductor = empty($_POST['nombreProductor']) ? $row['nombreProductor'] : $_POST['nombreProductor'];
                $tipoRiego = empty($_POST['tipoRiego']) ? $row['tipoRiego'] : $_POST['tipoRiego'];
                $temporada = empty($_POST['temporada']) ? $row['temporada'] : $_POST['temporada'];
                $tipoManejo = empty($_POST['tipoManejo']) ? $row['tipoManejo'] : $_POST['tipoManejo'];
                $observaciones = empty($_POST['observaciones']) ? $row['observaciones'] : $_POST['observaciones'];


                $update_sql = "UPDATE pacientes SET
                            tipoMuestra = '$tipoMuestra',
                            procedencia = '$procedencia',
                            municipio = $municipio,
                            coordenadas = $coordenadas,
                            predio = '$predio',
                            fechaTomaMuestra = '$fechaTomaMuestra',
                            claveInterna = '$claveInterna',
                            nombreProductor = '$nombreProductor',
                            tipoRiego = '$tipoRiego',
                            temporada = '$temporada',
                            tipoManejo = '$tipoManejo',
                            observaciones = '$observaciones'
                            WHERE claveInterna = '$claveInterna'";

                if ($conn->query($update_sql) === TRUE) {
                    echo "Registro actualizado correctamente";
                } else {
                    echo "Error al actualizar el registro: " . $conn->error;
                }

                $claveInternaEliminar = $_POST['claveInterna'];

                // Realizar la eliminación en la base de datos
                $delete_sql = "DELETE FROM muestras WHERE claveInterna = '$claveInternaEliminar'";
            
                if (mysqli_query($con, $delete_sql)) {
                    echo "Registro eliminado correctamente";
                } else {
                    echo "Error al eliminar el registro: " . mysqli_error($con);
                }
            }

            $sql = "SELECT tipoMuestra, procedencia, municipio, coordenadas, predio, fechaTomaMuestra, claveInterna, 
            nombreProductor, tipoRiego, temporada, tipoManejo, observaciones FROM muestras ORDER BY claveInterna";

            $result = mysqli_query($con, $sql);

            if(mysqli_num_rows($result) > 0) {
                echo '<table> <tr> 
                <th> Clave Interna </th> 
                <th> Tipo de Muestra </th> 
                <th> Procedencia </th> 
                <th> Municipio </th> 
                <th> Coordenadas </th> 
                <th> Predio </th> 
                <th> Fecha de toma de la muestra </th> 
                <th> Nombre del Productor </th>
                <th> Tipo de Riego </th> 
                <th> Temporada </th> 
                <th> Tipo de Manejo </th> 
                <th> Observaciones </th> 
                <th> Acción </th> </tr>';
                while($row = mysqli_fetch_assoc($result)){
                    echo '<tr>
                    <td>'  . $row["claveInterna"]   . '</td>
                    <td> ' . $row["tipoMuestra"]   . '</td>
                    <td> ' . $row["procedencia"]     . '</td>
                    <td> ' . $row["municipio"]       . '</td>
                    <td> ' . $row["coordenadas"]     . '</td>
                    <td> ' . $row["predio"]     . '</td>
                    <td> ' . $row["fechaTomaMuestra"] . '</td>
                    <td> ' . $row["nombreProductor"] . '</td>
                    <td> ' . $row["tipoRiego"] . '</td>
                    <td> ' . $row["temporada"] . '</td>
                    <td> ' . $row["tipoManejo"] . '</td>
                    <td> ' . $row["observaciones"] . '</td>
                    <td>
                        <a href="editar_muestra.php?claveInterna=' . $row["claveInterna"] . '">Editar</a>
                        <a href="eliminar_muestra.php?claveInterna=' . $row["claveInterna"] . '">Eliminar</a>
                    </td>
                    </tr>';
                }
                echo '</table>';
            } else {
                echo "0 results";
            }

            mysqli_close($con);
        ?>
    </div>
</body>
</html>