
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <title>MADISON BASIC</title>
</head>
<body>

<form method="post">

<div class="inputs">
    <div class="inputs-container">
    <h1>Madison Basic</h1>

    <input type="text" name="name" placeholder="Nombre">
    <input type="text" name="direccion" placeholder="Direccion">
    <input type="number" name="telefono" placeholder="Telefono">
    <input type="text" name="medidas" placeholder="Medidas">
    <input type="text" name="pedidos" placeholder="Pedidos">
    <input type="number" name="monto" placeholder="Monto">
    <input type="number" name="gastos" placeholder="Gastos">

</div>
<div class="btn-container">
    <input class="btn" type="submit" name="register">
</div>
</div>
    <?php
    include("register.php");
    ?>
<br>
<br>
<br>
<hr>
<div>
    <h3>
        BASE DE DATOS

    </h3>
</div>
<div>
    <?php
    include("mostrar.php");
    ?>
</div>
<div>

    </div>
</form>
</head>
<body>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div  class="monto">
        <button type="submit" name="calcular">Calcular Monto</button>
    
    </div>
    </form>
    <hr>
    <?php
// Verificar si se ha enviado el formulario y se ha pulsado el botón "calcular"
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["calcular"])) {
    // Configuración de la conexión a la base de datos
    $servername = "localhost";
    $username = "root"; // Reemplaza con tu nombre de usuario de la base de datos
    $password = ""; // Reemplaza con tu contraseña de la base de datos
    $dbname = "madison";
    
    // Crear conexión
    
    
    // Verificar conexión
    /*   if ($conex->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    } */
    
    // Realizar la consulta para sumar los montos
    $sql = "SELECT SUM(monto) AS total FROM datos";
    
    $result = $conex->query($sql);
    
    if ($result) {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $total = $row["total"];
            
            echo "<h5 class=xss>El total de los montos es de:$$total</h5>";
            
            
        } else {
            echo "<p>No se encontraron montos para sumar.</p>";
        }
    } else {
        echo "Error al ejecutar la consulta: " . $conex->error;
    }
    // Cerrar conexión
    $conex->close();
}
?>




<div class="buscador">



    <script>
    
    function limpiarBusqueda() {
            document.getElementById("busqueda").value = "";
        }
    </script>
    
    
    
        <h1 class="h1">Buscador de Datos</h1>
            <form action="" method="GET" class="bsq">
                <label for="busqueda">Buscar por nombre:</label>
                <input type="text" id="busqueda" name="busqueda">
                <button type="submit">Buscar</button>
            </form>
            
            <?php
        // Verificar si se ha enviado una consulta de búsqueda
        if(isset($_GET['busqueda'])) {
            // Establecer conexión a la base de datos
            
            // Verificar la conexión
            if ($conex->connect_error) {
                die("Error de conexión: " . $conex->connect_error);
            }
            
            // Escapar la cadena de búsqueda para prevenir inyección SQL
            $busqueda = $conex->real_escape_string($_GET['busqueda']);
            
            // Consulta SQL para buscar en la tabla "datos" por el nombre
            $sql = "SELECT * FROM datos WHERE nombre LIKE '%$busqueda%'";
            
            // Ejecutar la consulta
            $resultado = $conex->query($sql);
            
            // Mostrar resultados
            if ($resultado->num_rows > 0) {
                echo "<h2>Resultados de la búsqueda:</h2>";
                echo "<ul>";
                while($fila = $resultado->fetch_assoc()) {
                    echo "<li>Nombre: {$fila['nombre']} - {$fila['direccion']} - Medidas: {$fila['medidas']} - Monto: $ {$fila['monto']}</li>- gastos: $ {$fila['gastos']}</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>No se encontraron resultados para '{$_GET['busqueda']}'.</p>";
            }
            
            // Cerrar la conexión
            $conex->close(); 
            
            
        }
        
        
    
        ?>
        </div>
        <hr>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div  class="monto">
        <button type="submit" name="calculo">Calcular Gastos</button>
    
    </div>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["calculo"])) {
        // Configuración de la conexión a la base de datos
        $servername = "localhost";
        $username = "root"; // Reemplaza con tu nombre de usuario de la base de datos
        $password = ""; // Reemplaza con tu contraseña de la base de datos
        $dbname = "madison";
    $sql = "SELECT SUM(gastos) AS total FROM datos";
    
    $result = $conex->query($sql);
    
    if ($result) {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $total = $row["total"];
            
            echo "<h5 class=xss>El total de los gastos es de:$$total</h5>";
            
            
        } else {
            echo "<p>No se encontraron gastos para sumar.</p>";
        }
    } else {
        echo "Error al ejecutar la consulta: " . $conex->error;
    }
    // Cerrar conexión
    $conex->close();
}
    ?>
</body>
</html>




</body>
</html>
</body>


