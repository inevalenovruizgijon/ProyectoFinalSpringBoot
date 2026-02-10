<?php
  include "Menu.php";
  if (session_status() == PHP_SESSION_NONE) session_start();
   
  if(!isset($_SESSION['enlaces'])){
        $_SESSION['enlaces']=[];
    }
    if(!isset($_SESSION['titulos'])){
        $_SESSION['titulos']=[];
    }
    if(isset($_SESSION['menu'])){
    $menu=unserialize($_SESSION['menu']);
  }else{
    $menu=new Menu($_SESSION['titulos'],$_SESSION['enlaces']);
  } 
    if(isset($_POST['enviar'])){
        $modo=$_POST['opcion'];
        $titulo=$_POST['titulo'];
        $enlace=$_POST['enlace'];

        $menu->anadirElemento($titulo, $enlace);
        
        $_SESSION['titulos'][]=$titulo;
        $_SESSION['enlaces'][]=$enlace;
        $_SESSION['menu'] = serialize($menu);

        $menu->crearMenu($modo);
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
    <form action="" method="post">
        <input type="text"  name="titulo" required>
        <input type="text"  name="enlace" required>
        <select name="opcion" id="">
            <option value="horizontal">Horizontal</option>
            <option value="vertical">Vertical</option>
        </select>
        <input type="submit" value="Enviar" name="enviar">
        <?php
            
        ?>
    </form>
</body>
</html>