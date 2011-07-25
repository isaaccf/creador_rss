<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Creador RSS de seriesyonkis.com</title>
    </head>
    <body>
        <div>
            <form action="actualiza.php" method="GET">
                <input type="text" name="serie" />
                <input type="submit" name="enviar" />
            </form>
        </div>
        <?php
        if (isset($_GET["r"]) && $_GET["r"] == 0) {
        ?>
            <p>Actualizaci&oacute;n feita correctamente</p>
        <?php
        } else {
        ?>
            <p>Houbo alg&ouacte;n tipo de erro. Por favor, volve tentalo. <a href="/">Inicio</a></p>
<?php
        }
?>
    </body>
</html>
