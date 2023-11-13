<?php

//Para listar productos se debe consultar a la base de datos recorrer el array organizando cada informacion en columnas.

if(isset($_POST['Enviar'])){
    $servername = "localhost";
    $username = "mitiendaonline3";
    $password = "1234localhost";

    try {
        //Nos conectamos
        $conexion = new PDO("mysql:host=".$servername.";dbname=mitiendaonline2", $username, $password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Conexion exitosa";


        //creamos la tabla
        $tabla = "<table border='1' align='center'>";
        $tabla .="<tr>";


        //consulta para nombre de las columnas
        //Mostrar columnas para eliminar y modificar productos.

        $stmt=$conexion->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'mitiendaonline2' AND TABLE_NAME = 'productos' ORDER BY ORDINAL_POSITION");
        $Array_encabezado = $stmt ->fetchall();
        for($i=0; $i<count($Array_encabezado); $i++){
            $tabla .= "<th>" .$Array_encabezado[$i][0]."</th>";

        }
        $tabla .= "<th> Modificar </th>";
        $tabla .= "<th> Eliminar </th>";
        $tabla .= "</tr>";


        //consulta para registros:
        $stmt2=$conexion->query("SELECT * FROM productos");
        while ($row=$stmt2->fetch()){
            $tabla.= "<tr>";
            $tabla.= "<td>". $row['id'] . "</td>";
            $tabla.= "<td>". $row['Nombre'] . "</td>";
            $tabla.= "<td>". $row['Precio']  . "</td>";
            $tabla.= "<td> <img src='imagenes/'".$row['Imagen']." style='width:100;height:50;'></td>";
            $stmt3=$conexion -> query("SELECT Nombre FROM categorías WHERE id =". $row['Categoría']);
            $row2 = $stmt3->fetch();
            $tabla.= "<td>". $row2['0']  . "</td>";
            $tabla.= "<td><form action ='edita_producto.php' name='EditarProducto' method='GET'> <input name='id_modifica' type='hidden' value='". $row['id'] ."'><button name='EnviarModifica' type='sbmit'> Edita el producto </button></form> </td>";
            $tabla.= "<td><form action ='elimina_producto.php' name='EliminarProducto' method='GET'> <input name='id_elimina'type='hidden' value='". $row['id'] ."'> <button name='EnviarElimina' type='sbmit'> Elimina el producto </button></form></td>";
            $tabla.= "<tr>";
        }

        $tabla .= "</table>";
        echo $tabla;

        //Cerramos la conexión
        $conexion = null;

    } catch(PDOException $e) {
        echo "Conexion fallida: " . $e->getMessage();
    }

}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Listado de productos </title>
        <meta charset="UTF-8">
    </head>
    <body>
        <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="Formulario">
            <button type="submit" name="Enviar"> Listar Productos </button>
        </form> 
    </body>
</html>

