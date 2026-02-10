<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $acierto = "gato";

    if (isset($_REQUEST['seccion'])) {
    ?>
        <meta http-equiv="refresh" content="2; url=ejercicio_1.php">
    <?php
    }

    if (!isset($_REQUEST['imagen'])) {
        $imagen = "perro";
    } else {
        $imagen = $_REQUEST['imagen'];
    }
    if ($imagen == $acierto) {
        $color = 'transparent';
        $bordercolor = 'transparent';
    } else {
        $color = 'gray';
        $bordercolor = 'red';
    }

    ?>

    <title>Adivina la imagen</title>
    <style>
        main {
            display: flex;
            justify-content: center;
        }

        table {
            background-image: url("istockphoto-1443562748-612x612.jpg");
            border-collapse: collapse;
            width: 740px;
            height: 880px;
            background-repeat: no-repeat;
        }

        tr,
        td {
            margin: 0;
            padding: 0;
            border: 2px solid <?= $bordercolor ?>;
        }

        #<?= $_REQUEST['seccion'] ?> {
            background-color: transparent;
        }

        a {
            background-color: <?= $color ?>;
            padding: 137px 130px 137px 130px;
        }

        form {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        select {
            margin-bottom: 1em;
        }

        button {
            height: 2.5em;
            width: 8em;
            color: white;
            background-color: #828282ff;
            border-radius: 1em;
        }

        h1 {
            text-align: center;
            font-size: 5em;
        }
    </style>
</head>

<body>

        <?php
          if ($imagen == $acierto){
            echo "<h1>Has acertado</h1>";
          } else{
            echo "<h1>Adivina la imagen</h1>";
          }
        ?>

    <main>
        <table>
            <tr>
                <td><a href="fila-1-columna-1.png" id="n1"></a></td>
                <td><a href="fila-1-columna-2.png" id="n2"></a></td>
                <td><a href="fila-1-columna-3.png" id="n3"></a></td>
            </tr>
            <tr>
                <td><a href="fila-2-columna-1.png" id="n4"></a></td>
                <td><a href="fila-2-columna-2.png" id="n5"></a></td>
                <td><a href="fila-2-columna-3.png" id="n6"></a></td>
            </tr>
            <tr>
                <td><a href="fila-3-columna-1.png" id="n7"></a></td>
                <td><a href="fila-3-columna-2.png" id="n8"></a></td>
                <td><a href="fila-3-columna-3.png" id="n9"></a></td>
            </tr>
        </table>
    </main>

          <?php
              if ($imagen != $acierto){
          ?>

    <div>
        <form action="" method="post">
            <fieldset>
                <legend>
                    <h2>¿Que imagen es?</h2>
                </legend>
                <input type="text" name="imagen">
                <button type="submit" >Aceptar
                </button>
            </fieldset>
        </form>
    </div>
    <?php
      }  
    ?>
</body>


</html>