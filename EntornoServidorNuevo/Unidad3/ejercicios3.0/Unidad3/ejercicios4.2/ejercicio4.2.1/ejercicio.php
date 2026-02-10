<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $dia=$_GET['dia'];
        $dia=strtolower($dia);
        
        switch($dia){
            case "lunes":
                echo "<h2>El lunes toca Inglés</h2>";
                break;
            case "martes":
                echo "<h2>El martes toca DIW</h2>";
                break;
            case "miércoles":
                echo "<h2>El miércoles toca </h2>";
                break;
            case "jueves":
                echo "<h2>El jueves toca Inglés</h2>";
                break;
            case "viernes":
                echo "<h2>El viernes toca DIW</h2>";
                break;
            case "sábado":
            case "domingo":    
                echo "<h2>No hay clase </h2>";
                break;
            default :
                echo "<h2>introduce un día válido</h2>";    
            }

    ?>


</body>
</html>