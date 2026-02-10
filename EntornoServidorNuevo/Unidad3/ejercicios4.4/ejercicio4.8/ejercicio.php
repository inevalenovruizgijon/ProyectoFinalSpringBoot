<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Caja Fuerte</h2>

    <?php
        if(!isset($_REQUEST['numeroIntroducido'])){
            $numeroCorrecto=5555;
            $oportunidades=4;
            $numeroIntroducido=111111111111111;
        }
        else{
            $numeroCorrecto=$_POST['numeroCorrecto'];
            $oportunidades=$_POST['oportunidades'];
            $numeroIntroducido=$_POST['numeroIntroducido'];
        }
        if($numeroIntroducido==$numeroCorrecto){
            echo"la caja se ha abierto correctamente";
        }else{
            if($oportunidades==0){
            echo"no tienes mas oportunidades";
        }else{
            echo"numero incorrecto";
    ?>
    Te quedan  <?= $oportunidades-- ?> oportunidades
    <form action="ejercicio.php" method="post">
        <input type="number" name="numeroIntroducido">
        <input type="hidden" name="oportunidades" value="<?=$oportunidades?>">
        <input type="hidden" name="numeroCorrecto" value="<?=$numeroCorrecto?>">
        <input type="submit" value="Continuar">
    </form>
    <?php 
        }
        }
    ?>
</body>
</html>