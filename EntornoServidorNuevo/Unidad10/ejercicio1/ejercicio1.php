<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        
    <?php

      $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "toor");  
        try {
                echo "Se ha establecido una conexión con el servidor de bases de datos.";
        } catch (PDOException $e) {
                echo "No se ha podido establecer conexión con el servidor de bases de
                datos.<br>";
                die ("Error: " . $e->getMessage());
                }
          if (isset($_POST['eliminar'])) {
            $dni = $_POST['dni'];
            $stmt = $conexion->prepare("DELETE FROM cliente WHERE dni = ?");
            $stmt->execute([$dni]);
            echo "<p>Cliente $dni eliminado correctamente.</p>";
        }  
         if (isset($_POST['editar'])) {
            $dni = $_POST['dni'];
            header("Location: editar.php?dni=$dni");
            exit;
        }
          if (isset($_POST['anadir'])) {
        $stmt = $conexion->prepare("INSERT INTO cliente (dni, nombre, dirección, teléfono) VALUES (?, ?, ?, ?)");
        $stmt->execute([$_POST['dni'], $_POST['nombre'], $_POST['dirección'], $_POST['teléfono']]);
        echo "<p style='color:green;'>Cliente añadido.</p>";
    }

                $consulta = $conexion->query("SELECT dni, nombre, dirección, teléfono FROM cliente");
            
            
            ?>
            
    
    <table border="1">
            <tr>
            <td><b>DNI</b></td>
            <td><b>Nombre</b></td>
            <td><b>Dirección</b></td>
            <td><b>Teléfono</b></td>
            </tr>
            <?php
            while ($cliente = $consulta->fetchObject()) {
                ?>
                <tr>
                <td><?= $cliente->dni ?></td>
                <td><?= $cliente->nombre ?></td>
                <td><?= $cliente->dirección ?></td>
                <td><?= $cliente->teléfono ?></td>
                <td>
                    <form action="" method="post">
                        <input type="submit" name="eliminar" value="Eliminar">
                        <input type="hidden" name="dni" value="<?= $cliente->dni ?>">

                    </form>
                </td>
                <td>
                    <form action="" method="post">
                        <input type="submit" name="editar" value="Editar">
                        <input type="hidden" name="dni" value="<?= $cliente->dni ?>">
                    </form>
                </td>
                </tr>
                <?php
                }
            ?>
            </table>
            <br>
            Número de clientes: <?= $consulta->rowCount() ?><br><br>

            <form action="">
                <label for="">Añadir cliente</label><br>
                <input type="text" name="dni">
                <input type="text" name="nombre">
                <input type="text" name="direccion">
                <input type="text" name="telefono">
                <input type="submit" name="anadir" value="Añadir">
            </form>
<?php $conexion=null; ?> 
</body>
</html>