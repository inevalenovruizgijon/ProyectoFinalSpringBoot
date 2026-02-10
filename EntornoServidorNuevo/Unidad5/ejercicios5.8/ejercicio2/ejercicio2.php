<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
      $carta =[
        "Pizza"=> ["jamon","atun","bacon","peperoni"],
        "Hamburguesa"=>["lechuga","tomate","queso"],
        "Perrito caliente"=>["lechuga","cebolla","patata"]  
      ];
      $pedido=[];

      if(isset($_GET['pedido_realizado'])){
        $pedido=unserialize($_GET['pedido_realizado']);
      }

      if(isset($_GET['agregar'])){
        $tipo=$_GET['tipo'];
        $ingredientes=$_GET['ingredientes'];
        $pedido[]=[
            "tipo"=>$tipo,
            "ingredientes"=>$ingredientes
        ];
    }

      if(isset($_GET['finalizar'])){
        echo "<h2>Pedido completo</h2>";
        if(empty($pedido)){
            echo "<p>No se ha añadido ningun pedido</p>";
        }else{
            echo "<table>";
            echo "<tr><th>Pedido</th><th>Ingredientes</th></tr>";
            foreach ($pedido as $ped) {
                echo "<tr>";
                echo"<td>" . $ped['tipo'] . "</td>";
                echo "<td>" . implode(", ", $ped['ingredientes']) . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }

      }
    ?>
    
        
        <h1>Haz tu pedido</h1>
<?php
foreach ($carta as $car => $ingredientes) {
    echo '<form method="get">';
    echo '<input type="hidden" name="pedido_realizado" value="'. serialize($pedido).'">';
    echo '<input type="hidden" name="tipo" value="'. $car.'">';
    echo "<legend>Selecciona los ingredientes que quiere para $car</legend>";
    foreach ($ingredientes as $ing) {
        echo '<input type="checkbox" name="ingredientes[]" value="' . $ing.'"> '. $ing . '<br>';
    }
    echo '<input type="submit" name="agregar" value="Agregar">';
    echo '</form><br>';
}
?>

<!-- Botón para finalizar pedido -->
<form method="get">
    <input type="hidden" name="pedido_realizado" value="<?php echo serialize($pedido); ?>">
    <input type="submit" name="finalizar" value="Finalizar pedido">
</form>




</body>
</html>