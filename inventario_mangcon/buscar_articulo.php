<!DOCTYPE html>
<html lang="en">
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
    <link rel="icon" type="image/jpg" href="/inventario_mangcon/images/logo.jpg">
    <script src="/js/jquery.js"></script>
    <script src="/js/jquery.validate.js"></script>
    <title>Inventario de 912 Mangueras y Conexiones</title>
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
                formaction="buscar_articulo.php">Buscar artículo</button>
            </form>
        </div>
    </div>

    <div class="data_table_container">

    </div>

    <div class="data_table_container">
        <legend class="form_datos_muestra_header">Búsqueda de artículos</legend>

        <form method="GET" action="buscar_articulo.php">
            <input type="text" name="buscarConcepto" placeholder="Concepto del artículo">
            <button type="submit">Buscar</button>
        </form>

        <?php
            // Tu código de conexión a la base de datos
            $host     = "localhost";
            $username = "root";
            $passwd   = "";
            $dbname   = "inv_912";

            $con      = mysqli_connect($host, $username, $passwd, $dbname);

            if(!$con) {
                die(mysqli_connect_error());
            } else {
                echo "";
            }

            // Verificar si se envió el formulario POST para editar la muestra
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $concepto = $_POST['concepto'];
                // Puedes implementar la lógica de edición aquí utilizando el código proporcionado anteriormente
                   // Obtener datos actuales dla muestra
                $sql = "SELECT * FROM articulos WHERE concepto = '$concepto'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                } else {
                    echo "No se encontró ningún artículo con el concepto: $concepto";
                    $conn->close();
                    exit();
                }

                // Actualizar datos en la base de datos
                $concepto = empty($_POST['concepto']) ? $row['concepto'] : $_POST['concepto'];
                $precio_publico = empty($_POST['precio_publico']) ? $row['precio_publico'] : $_POST['precio_publico'];
                $ult_actual = empty($_POST['ult_actual']) ? $row['ult_actual'] : $_POST['ult_actual'];
                $cant_sug_stock = empty($_POST['cant_sug_stock']) ? $row['cant_sug_stock'] : $_POST['cant_sug_stock'];

                $update_sql = "UPDATE pacientes SET
                            concepto = '$concepto',
                            precio_publico = '$precio_publico',
                            ult_actual = '$ult_actual',
                            cant_sug_stock = '$cant_sug_stock'
                            WHERE concepto = '$concepto'";

                if ($conn->query($update_sql) === TRUE) {
                    echo "Registro actualizado correctamente";
                } else {
                    echo "Error al actualizar el registro: " . $conn->error;
                }

                $conceptoEliminar = $_POST['concepto'];

                // Realizar la eliminación en la base de datos
                $delete_sql = "DELETE FROM articulos WHERE concepto = '$conceptoEliminar'";
            
                if (mysqli_query($con, $delete_sql)) {
                    echo "Registro eliminado correctamente";
                } else {
                    echo "Error al eliminar el registro: " . mysqli_error($con);
                }
            }

            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['buscarConcepto'])) {
                $buscarConcepto = $_GET['buscarConcepto'];
            
                // Construir la consulta SQL basada en los criterios de búsqueda
                $sql = "SELECT * FROM articulos WHERE concepto LIKE '%$buscarConcepto%'";
            
                // Ejecutar la consulta
                $result = mysqli_query($con, $sql);
            
                // Mostrar los resultados de la búsqueda
                if(mysqli_num_rows($result) > 0) {
                    echo '<table> <tr> 
                    <th> Concepto </th> 
                    <th> Precio al público con IVA </th> 
                    <th> Última actualización </th> 
                    <th> Cantidad sugerida en stock </th> 
                    <th> Acción </th> </tr>';
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<tr>
                        <td>'  . $row["concepto"]   . '</td>
                        <td> ' . $row["precio_publico"]   . '</td>
                        <td> ' . $row["ult_actual"]     . '</td>
                        <td> ' . $row["cant_sug_stock"]       . '</td>
                        <td>
                            <a href="editar_muestra.php?concepto=' . $row["concepto"] . '">Editar</a>
                            <a href="eliminar_muestra.php?concepto=' . $row["concepto"] . '">Eliminar</a>
                        </td>
                        </tr>';
                    }
                    echo '</table>';
                } else {
                    echo "No se encontraron resultados.";
                }
            }

            mysqli_close($con);
        ?>
    </div>
</body>
</html>