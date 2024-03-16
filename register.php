<?php
include("con_db.php");

if(isset($_POST["register"])) {
    if(strlen($_POST["name"])>=1 && strlen($_POST["direccion"])>=1 && strlen($_POST["telefono"])>=1 && strlen($_POST["medidas"])>=1 && strlen($_POST["pedidos"])>=1 && strlen($_POST["monto"])>=1 && strlen($_POST["gastos"])>=1){
      $name=trim($_POST["name"]);
      $direccion=trim($_POST["direccion"]);
      $telefono=trim($_POST["telefono"]);
      $medidas=trim($_POST["medidas"]);
      $pedidos=trim($_POST["pedidos"]);
      $monto=trim($_POST["monto"]);
      $fecha_reg=date("d/m/y");
      $gastos=trim($_POST["gastos"]);


      $consulta="INSERT INTO datos(`nombre`,`direccion`,`telefono`,`medidas`,`pedidos`,`monto`,`fecha_reg`,`gastos`) VALUES ('$name','$direccion','$telefono','$medidas','$pedidos','$monto','$fecha_reg','$gastos')";
      $resultado=mysqli_query($conex,$consulta);
      
      if($resultado){
        ?>
        <h1 class="ok">
          Cliente Registrado!
        </h1>

        <?php
      }else{
      ?>
      <h2 class="bad>
      ups, ha ocurrido un error!

      </h2>
      <?php
      }
    }

  }
?>