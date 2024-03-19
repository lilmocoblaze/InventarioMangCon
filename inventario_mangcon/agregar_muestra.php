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
</head>
<body style="
    height: 1000px;">

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

    <div id="form_datos_muestra_container">
        <form name="f1" method="post" action="/inventario_vegetales/php/agregar_muestra_connect.php">
            <fieldset>
                <legend class="form_datos_muestra_header">Datos de la Muestra</legend>
                <div style="margin-bottom: 10px;">
                    <label for="tipoMuestra">Tipo de muestra:</label>
                    <input type="radio" id="suelo" name="tipoMuestra" value="Suelo" required>
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
                    <input type="text" name="municipio" id="municipio" style="margin-left:20px;"required>
                </div>

                <div style="margin-bottom: 10px;">
                    <label for="coordenadas">Coordenadas de dónde se tomó la muestra:</label>
                    <input type="text" name="coordenadas" id="coordenadas" required>
                </div>

                <div style="margin-bottom: 10px;">
                    <label for="predio">Predio:</label>
                    <input type="text" name="predio" id="predio" required>
                </div>

                <div style="margin-bottom: 10px;">
                    <label for="fecha">Fecha en la que se tomó la muestra:</label>
                    <input type="date" name="fechaTomaMuestra" id="fechaTomaMuestra" required>
                </div>

                <div style="margin-bottom: 10px;">
                    <label for="claveInterna">Clave Interna:</label>
                    <input type="text" name="claveInterna" id="claveInterna" required>
                </div>

                <div style="margin-bottom: 10px;">
                    <label for="nombreProductor">Nombre del Productor:</label>
                    <input type="text" name="nombreProductor" id="nombreProductor" required>
                </div>

                <div style="margin-bottom: 10px;">
                    <label for="tipoRiego">Tipo de riego:</label>
                    <input type="radio" id="temporal" name="tipoRiego" value="Temporal" required>
                    <label for="temporal">Temporal</label>
                    <input type="radio" id="riegoControlado" name="tipoRiego" value="Riego controlado">
                    <label for="riegoControlado">Riego controlado</label>
                    <input type="radio" id="noAplica" name="tipoRiego" value="No aplica">
                    <label for="noAplica">No aplica</label>
                </div>

                <div style="margin-bottom: 10px;">
                    <label for="temporada">Temporada(Año):</label>
                    <input type="number" name="temporada" id="temporada" required>
                </div>

                <div style="margin-bottom: 10px;">
                    <label for="tipoManejo">Tipo de riego:</label>
                    <input type="radio" id="practicasAgro" name="tipoManejo" value="Prácticas Agroecológicas" required>
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

                <p>&nbsp;</p>
                <p>
                    <input type="submit" name="Submit" id="submit" class="submit_button" value="Guardar">
                </p>
            </fieldset>
        </form>

        <?php
            header("Location: /inventario_vegetales/agregar_muestra.php")
        ?>
    </div>
</body>
</html>
