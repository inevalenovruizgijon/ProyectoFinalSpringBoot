<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css?">
</head>
<body>
    <?php
    $numero=$_POST['numero'];
    $numero2=$_POST['numero2'];
    $ran1=random_int(0,49);
    $ran2=random_int(0,999);
    $ran=$ran1.$ran2;
    $numero_final=$numero.$numero2;
    
    
    ?>
    <table>
        <tr>
          <th>Su numero</th>
          <th>El numero ganador</th>
        </tr>
        <tr>
            <td>
            <?php          
                echo  $numero_final;
                ?>
            </td>
            <td>
                <?php
                echo "$ran"
                ?>
            </td>
        </tr>   
    </table>

</body>
</html>