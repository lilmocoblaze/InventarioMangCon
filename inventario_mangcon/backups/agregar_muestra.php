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
</head>
<body style="
    height: 1000px;">

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

    <div id="form_datos_paciente_container">
        <form name="form_datos_paciente" method="post" action="/inventario_ciad/php/agregar_muestra_connect.php">
            <fieldset>
                <legend class="form_datos_paciente_header">Datos del paciente</legend>
                <div style="margin-bottom: 10px;">
                    <label for="codigo">Código del paciente:</label>
                    <input type="text" name="codigoPaciente" id="codigoPaciente" style="
                    margin-left: 2px;" required minlength="3">
                </div>
                
                <div style="margin-bottom: 10px;">
                    <label for="nombre">Nombre del paciente:</label>
                    <input type="text" name="nombrePaciente" id="nombrePaciente" style="
                    margin-left: 2px;" required minlength="3">                    
                </div>

                <div style="margin-bottom: 10px;">
                    <label for="edad">Edad del paciente:</label>
                    <input type="number" name="edadPaciente" id="edadPaciente" style="
                    margin-left: 17px;" required maxlength="3">
                </div>

                <div style="margin-bottom: 10px;">
                    <label for="sexo">Sexo del paciente:</label>
                    <input type="radio" id="masculino" name="sexoPaciente" value="Masculino" required>
                    <label for="masculino">Masculino</label>
                    <input type="radio" id="femenino" name="sexoPaciente" value="Femenino">
                    <label for="femenino">Femenino</label>
                </div>

                <div style="margin-bottom: 10px;">
                    <label for="fecha">Fecha en la que se tomó la muestra:</label>
                    <input type="date" name="fechaMuestra" id="fechaMuestra" required>
                </div>

                <div style="margin-bottom: 10px;">
                    <label for="codigopostal">Código postal del paciente:</label>
                    <input type="text" name="cpPaciente" id="cpPaciente" style="
                    margin-left: 2px;" required minlength="3">
                </div>

                <div style="margin-bottom: 10px;">
                    <label for="resultado">Resultado de la muestra:</label>
                    <input type="radio" id="positivo" name="resultadoMuestra" value="Positivo">
                    <label for="positivo">Positivo</label>
                    <input type="radio" id="negativo" name="resultadoMuestra" value="Negativo">
                    <label for="negativo">Negativo</label>
                </div>

                <div>
                    <label for="comentariosPaciente">Comentarios sobre el paciente</label>
                    <br>
                    <textarea name="comentariosPaciente" id="comentariosPaciente" class="comentarios_paciente"></textarea>
                </div>

                <p>&nbsp;</p>
                <p>
                    <input type="submit" name="Submit" id="submit" class="submit_button" value="Guardar">
                </p>
            </fieldset>
        </form>

        <?php
            header("Location: /inventario_ciad/agregar_muestra.php")
        ?>
    </div>
</body>
</html>

<script>
    //Set max date to today
    fecha_muestra.max = new Date().toISOString().split("T")[0];
    edad_paciente.min = 0;
    edad_paciente.max = 105;

    $(function() {
        function sendData($form){
            let dataString = $(this).serialize();

            return $.ajax({
                type: $form.attr('method'),
                url: $form.attr('action'),
                data: dataString
            })
        }

        $('form').validate();

        $('form').on('submit', function(e) {
            e.preventDefault();

            sendData($(this)).done(function(){
                $("#form_datos_paciente_container").html("<div id='message'></div>");
                $("#message")
                    .html("<h2>Contact Form Submitted!</h2>")
                    .append("<p>We will be in touch soon.</p>")
                    .hide()
                    .fadeIn(1500);
            });
        })
    })
</script>