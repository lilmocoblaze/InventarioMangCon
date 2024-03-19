<!DOCTYPE html>
<html lang="en">
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

    <div class="data_table_container">
        <?php
            // Tu código de conexión a la base de datos
            $host     = "localhost";
            $username = "root";
            $passwd   = "";
            $dbname   = "inventario_muestras";

            $con      = mysqli_connect($host, $username, $passwd, $dbname);

            if(!$con) {
                die(mysqli_connect_error());
            } else {
                echo "Lista de pacientes <br> <br>";
            }

            // Verificar si se envió el formulario POST para editar el paciente
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $codigoPaciente = $_POST['codigoPaciente'];
                // Puedes implementar la lógica de edición aquí utilizando el código proporcionado anteriormente
                   // Obtener datos actuales del paciente
                $sql = "SELECT * FROM pacientes WHERE codigoPaciente = '$codigoPaciente'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                } else {
                    echo "No se encontró el paciente con el código: $codigoPaciente";
                    $conn->close();
                    exit();
                }

                // Actualizar datos en la base de datos
                $nombrePaciente = empty($_POST['nombrePaciente']) ? $row['nombrePaciente'] : $_POST['nombrePaciente'];
                $fechaMuestra = empty($_POST['fechaMuestra']) ? $row['fechaMuestra'] : $_POST['fechaMuestra'];
                $cpPaciente = empty($_POST['cpPaciente']) ? $row['cpPaciente'] : $_POST['cpPaciente'];
                $edadPaciente = empty($_POST['edadPaciente']) ? $row['edadPaciente'] : $_POST['edadPaciente'];
                $sexoPaciente = empty($_POST['sexoPaciente']) ? $row['sexoPaciente'] : $_POST['sexoPaciente'];
                $resultadoMuestra = empty($_POST['resultadoMuestra']) ? $row['resultadoMuestra'] : $_POST['resultadoMuestra'];
                $comentariosPaciente = empty($_POST['comentariosPaciente']) ? $row['comentariosPaciente'] : $_POST['comentariosPaciente'];

                $update_sql = "UPDATE pacientes SET
                            nombrePaciente = '$nombrePaciente',
                            fechaMuestra = '$fechaMuestra',
                            cpPaciente = $cpPaciente,
                            edadPaciente = $edadPaciente,
                            sexoPaciente = '$sexoPaciente',
                            resultadoMuestra = '$resultadoMuestra',
                            comentariosPaciente = '$comentariosPaciente'
                            WHERE codigoPaciente = '$codigoPaciente'";

                if ($conn->query($update_sql) === TRUE) {
                    echo "Registro actualizado correctamente";
                } else {
                    echo "Error al actualizar el registro: " . $conn->error;
                }
            }

            $sql = "SELECT codigoPaciente, nombrePaciente, fechaMuestra, cpPaciente, edadPaciente, sexoPaciente, resultadoMuestra, comentariosPaciente FROM pacientes ORDER BY codigoPaciente";

            $result = mysqli_query($con, $sql);

            if(mysqli_num_rows($result) > 0) {
                echo '<table> <tr> <th> Código del paciente </th> <th> Nombre del paciente </th> <th> Fecha de la muestra </th> <th> Código Postal del Paciente </th> <th> Edad del paciente </th> <th> Sexo del paciente </th> <th> Resultado de la muestra </th> <th> Comentarios </th> <th> Acción </th> </tr>';
                while($row = mysqli_fetch_assoc($result)){
                    echo '<tr>
                    <td>'  . $row["codigoPaciente"]   . '</td>
                    <td> ' . $row["nombrePaciente"]   . '</td>
                    <td> ' . $row["fechaMuestra"]     . '</td>
                    <td> ' . $row["cpPaciente"]       . '</td>
                    <td> ' . $row["edadPaciente"]     . '</td>
                    <td> ' . $row["sexoPaciente"]     . '</td>
                    <td> ' . $row["resultadoMuestra"] . '</td>
                    <td> ' . $row["comentariosPaciente"] . '</td>
                    <td>
                        <a href="editar_muestra.php?codigoPaciente=' . $row["codigoPaciente"] . '">Editar</a>
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