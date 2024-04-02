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
</head>
<body style="
    height: 1000px;">

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

    <div id="form_datos_muestra_container">
        <form name="f1" method="post" action="/inventario_mangcon/php/agregar_muestra_connect.php">
            <fieldset>
                <legend class="form_datos_muestra_header">Información del artículo</legend>

                <div style="margin-bottom: 10px;">
                    <label for="concepto">Concepto:</label>
                    <input type="text" name="concepto" id="concepto" style="margin-left:20px;"required>
                </div>

                <div style="margin-bottom: 10px;">
                    <label for="precio_publico">Precio al público con IVA incluido:</label>
                    <input type="text" name="precio_publico" id="precio_publico" required>
                </div>

                <div style="margin-bottom: 10px;">
                    <label for="ult_actual">Última actualización:</label>
                    <input type="date" name="ult_actual" id="ult_actual" required>
                </div>

                <div style="margin-bottom: 10px;">
                    <label for="cant_sug_stock">Cantidad sugerida en stock:</label>
                    <input type="text" name="cant_sug_stock" id="cant_sug_stock" required>
                </div>

                <p>&nbsp;</p>
                <p>
                    <input type="submit" name="Submit" id="submit" class="submit_button" value="Guardar">
                </p>
            </fieldset>
        </form>

        <?php
            header("Location: /inventario_mangcon/agregar_muestra.php")
        ?>
    </div>
</body>
</html>
