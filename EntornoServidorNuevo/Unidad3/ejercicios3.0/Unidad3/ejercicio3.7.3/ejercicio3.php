<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php
        $color=$_POST['fondo'];
        $fuente=$_POST['fuente'];
        $alineado=$_POST['alineado'];
        $imagen=$_POST['imagen'];
    

    ?>

<body style="background-color: <?=$color?>;
    font-family: <?=$fuente?>;
    text-align: <?=$alineado?>;
">
    
    
    <img src="<?= $imagen ?>" alt="imagen" style="width: 100px; height:100px;">
 

    <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h2>
    <p> 
        Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
        nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in 
        reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia 
        deserunt mollit anim id est laborum.
    </p>

    



</body>
</html>