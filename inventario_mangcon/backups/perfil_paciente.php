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
    </div>

    <div class="data_table_container">
        <?php
            //storing database details in variables.
            $host     = "localhost";
            $username = "root";
            $passwd   = "";
            $dbname   = "inventario_muestras";

            //creating connection to database
            $con      = mysqli_connect($host, $username, $passwd, $dbname);

            //checking if connection is working or not
            if(!$con)
            {
                die(mysqli_connect_error());
            }
            else 
            {
                echo "Lista de pacientes <br> <br>";
            }

            //Output Form Entries from the Database
            $sql = 'SELECT * FROM pacientes WHERE id = "'.$_GET['nombrePaciente'].'"';

            //fire query
            $result = mysqli_query($con, $sql);

            echo $result;

            if(mysqli_num_rows($result) > 0)
            {
            echo '<table> <tr> <th> Código del paciente </th> <th> Fecha de la muestra </th> <th> Edad del paciente </th> <th> Sexo del paciente </th> <th> Resultado de la muestra </th> </tr>';
            while($row = mysqli_fetch_assoc($result)){
                // to output mysql data in HTML table format
                echo '<tr >
                <td><a href="perfil_paciente.php?codigoPaciente">' . $row["codigoPaciente"] . '</a></td>
                <td> ' . $row["fechaMuestra"] . '</td>
                <td> ' . $row["edadPaciente"] . '</td>
                <td> ' . $row["sexoPaciente"] . '</td>
                <td> ' . $row["resultadoMuestra"] . '</td>
                </tr>';
            }
            echo '</table>';
            }
            else
            {
                echo "0 results";
            }
            // closing connection
            mysqli_close($con);

        ?>
    </div>
</body>
</html>