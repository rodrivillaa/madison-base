<?php
$inc=include("con_db.php");
if($inc){
    $consulta="SELECT * FROM datos";
    $resultado=mysqli_query($conex,$consulta);

    if($resultado){
        while($row=$resultado->fetch_array()){

            $id=$row["id"];
            $name=$row["nombre"];
            $direccion=$row["direccion"];
            $telefono=$row["telefono"];
            $medidas=$row["medidas"];
            $pedidos=$row["pedidos"];
            $monto=$row["monto"];
            $gastos=$row["gastos"];
            $fecha_reg=$row["fecha_reg"];


        ?> 
        
        <div class="conteiner-datos">
            <div class="datos">
                <h2><?php echo $name; ?></h2>
                    <p>
                    <br>
                    <b>DIRECCION: </b><?php echo $direccion; ?><br><br>
                
                    
                    <b>TELEFONO: </b><?php echo $telefono; ?><br><br>
                    
                    
                    <b>MEDIDAS: </b><?php echo $medidas; ?><br><br>
                    
                    <b>PEDIDOS: </b><?php echo $pedidos; ?><br><br>
                    
                    <b>MONTO: $</b><?php echo $monto; ?><br><br>

                    <b>GASTOS: $</b><?php echo $gastos; ?><br><br>
                    
                    <b>FECHA REGISTRO: </b><?php echo $fecha_reg; ?><br><br>
                </p>
            </div>
        </div>
        
        <?php

        }


    }
}
?>