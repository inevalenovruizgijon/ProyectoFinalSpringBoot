<?php
    include "Cubo.php";
  if (session_status() == PHP_SESSION_NONE) session_start();
    if(!isset($_SESSION['cubos'])){
        $_SESSION['cubos']=[];
    }
    if(isset($_POST['enviar'])){
        $espacio=$_POST['cantidad'];
        $cantidad=$_POST['cantidadActual'];
        
        $cubo=new Cubo($espacio,$cantidad);
        $_SESSION['cubos'][]=$cubo;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Crear Cubo</h1>
    <form action="" method="post">
        <label for="">Introduce la cantidad del cubo</label>
        <input type="text" name="cantidad" required>
        <label for="">Introduce la cantidad actual del cubo</label>
        <input type="text" name="cantidadActual" required>
        <input type="submit" name="enviar" value="Enviar">
    </form>
    
    <h1>Lista de cubos</h1>
    <?php
       if(($_SESSION['cubos'])!=null){
        ?>
        <table border="1">
    <tr>
        <?php foreach ($_SESSION['cubos'] as $c => $cubo){ ?>
            <th>Cubo <?php echo $c; ?></th>
        <?php } ?>
    </tr>
    <tr>
        <?php foreach ($_SESSION['cubos'] as $cubo){ ?>
            <td><?php echo "Capacidad: " . $cubo->getCapacidad(); ?></td>
        <?php } ?>
    </tr>
    <tr>
        <?php foreach ($_SESSION['cubos'] as $cubo){ ?>
            <td><?php echo "Cantidad Actual: " . $cubo->getContenidoActual(); ?></td>
        <?php } ?>
    </tr>
</table>
<?php
            }
            ?>
        </table>
        <h1>Verter cantidad</h1>
        <form action="" method="post">
            <label for="">Cubo origen</label>
            <select name="cubo1" id="">
                <?php
                  foreach ($_SESSION['cubos'] as $key =>$cubo) {
                    echo "<option value=".$key.">Cubo $key</option>";  
                  }  
                ?>
            </select>
            <label for="">Cubo destino</label>
            <select name="cubo2" id="">
                <?php
                  foreach ($_SESSION['cubos'] as $key =>$cubo) {
                    echo "<option value=".$key.">Cubo $key</option>";  
                  }  
                ?>
            </select>
            <input type="submit" name="llenar">
        </form>
        <?php
        if(isset($_POST['llenar'])){
            $origen=$_POST['cubo1'];
            $destino=$_POST['cubo2'];

            $cuboOrigen=$_SESSION['cubos'][$origen];
            $cuboDestino=$_SESSION['cubos'][$destino];
            
            $cuboOrigen->verter($cuboDestino);
        }
    ?>  
</body>
</html>