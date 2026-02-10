<?php
$cookieDuracion=60*60*24*90;
$votosBetis=isset($_COOKIE['votosBetis']) ? intval($_COOKIE['votosBetis']): 0;
$votosSevilla=isset($_COOKIE['votosSevilla']) ? intval($_COOKIE['votosSevilla']): 0;
 
if (session_status() == PHP_SESSION_NONE) session_start();  
    if(isset($_POST['votoBetis'])){
        $votosBetis++;
        setcookie('votosBetis',$votosBetis,time()+$cookieDuracion);
    }
    if(isset($_POST['votoSevilla'])){
        $votosSevilla++;
        setcookie('votosSevilla',$votosSevilla,time()+$cookieDuracion);
    }

    if(isset($_POST['destruir'])){
        session_destroy();
        setcookie('votosSevilla', "", time() -1);
        setcookie('votosBetis', "", time() -1 );
        header("refresh:0");

    }
?>
<!-- Crear una página que simula una encuesta. Se realizará una pregunta, con dos botones para responder, cada
vez que se pulse un botón se irán contabilizando (usa sesiones) los votos y actualizando una barra que muestre
el número de votos de cada respuesta. Este resultado se irá almacenando también en una cookie, de manera que
si se cierra el navegador, al abrir la página de nuevo se mostrarán los resultados hasta el momento en que se
cerró. Crear la cookie para 3 meses -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    ?>
    <h3>¿Eres del Betis o del Sevilla?</h3>
    <p>Betis</p>    
    <?php
      for ($i=0; $i <$votosBetis ; $i++) { 
        ?>
        <img style="width: 30px; height: 30px;" src="img/e4a09419d3bd115b8f3dab73d480e146.png" alt="">            
        <?php
      }  
    ?>
    <p>Sevilla</p>    
    <?php
      for ($i=0; $i <$votosSevilla ; $i++) { 
        ?> <img  style="width: 30px; height: 30px;" src="img/sevilla-1.png" alt=""> <?php
      }  
    ?>
    <form action="" method="post">
        <button type="submit" value="Betis" name="votoBetis"> Betis</button>
        <button type="submit" value="Sevilla" name="votoSevilla">Sevilla</button>
        <button type="submit" value="Destruir sesión" name="destruir">Destruir sesión</button>
    </form>
</body>
</html>