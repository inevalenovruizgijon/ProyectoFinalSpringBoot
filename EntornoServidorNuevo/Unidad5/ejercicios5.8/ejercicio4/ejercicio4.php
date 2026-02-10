<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $personas= [['nombre'=>'Anita','sexo'=>'m','orientacion'=>'bis'],
        ['nombre'=>'Lolita','sexo'=>'m','orientacion'=>'bis'],
        ['nombre'=>'Pepito','sexo'=>'h','orientacion'=>'bis'],
        ['nombre'=>'Juanito','sexo'=>'h','orientacion'=>'bis'],
        ['nombre'=>'Roberto','sexo'=>'h','orientacion'=>'het'],
        ['nombre'=>'Antonio','sexo'=>'h','orientacion'=>'het'],
        ['nombre'=>'Manuela','sexo'=>'m','orientacion'=>'het'],
        ['nombre'=>'Isabel','sexo'=>'m','orientacion'=>'het'],
        ['nombre'=>'Jenifer','sexo'=>'m','orientacion'=>'hom'],
        ['nombre'=>'Susan','sexo'=>'m','orientacion'=>'hom'],
        ['nombre'=>'Peter','sexo'=>'h','orientacion'=>'hom'],
        ['nombre'=>'Mike','sexo'=>'h','orientacion'=>'hom']];
        if(isset($_POST['agregar']) && isset($_POST['personas'])){
    $personas = unserialize($_POST['personas']);
    if($personas === false) {
        $personas = [];
    }

}  
        if(isset($_POST['agregar'])){
            $nuevaPersona=[
                'nombre'=>$_POST['nombre'],
                'sexo'=>$_POST['sexo'],
                'orientacion'=>$_POST['orientacion']
            ];
            $personas[]=$nuevaPersona;
        }
    ?>
    <form action="" method="post">
        <legend>Nombre</legend>
        <input type="text" name="nombre">
        <legend>Orientación</legend>
        <select name="sexo" required>
            <option value="h">Hombre</option>
            <option value="m">Mujer</option>
        </select>
        <legend>Orientación</legend>
        <select name="orientacion" id="">
            <option value="het">Hetero</option>
            <option value="hom">Homosexual</option>
            <option value="bis">Bisexual</option>
        </select>
        <input type="submit" name="agregar" value="Agregar">
    </form>
    <form action="parejas.php" method="post">
        <input type="submit" name="siguiente" value="Ir a seleccionar parejas">
        <input type="hidden" name="personas" value="<?php echo serialize($personas)?>">
    </form>


</body>
</html>