<?php 
/*
Modificar producto
Se implementará en el fichero “edita_producto.php”
Recibirá por GET el id del producto a modificar.
Si no lo recibe, mostrará al usuario un desplegable para que escoja el producto a modificar.
Mostrará los datos del producto en un formulario que el usuario podrá modificar y enviar a sí mismo para realizar la actualización de los datos en la tabla.
*/

if(isset($_POST['Enviar'])){


    $nombre_nuevo = trim($_POST['nombre_producto']);
    $precio_nuevo = floatval($_POST['precio_producto']);
    $fichero_temporal = $_FILES['imagen_producto']['tmp_name'];
    $fichero_subido = $_FILES['imagen_producto']['name'];
    $categoria_nueva = intval($_POST['categoria_producto']);

    //¿validar la información permitida?

    

    //Consulta para modificar el producto a partir de los valores post del formulario de abajo
    $servername = "localhost";
    $username = "mitiendaonline3";
    $password = "1234localhost";
    $dbname = "mitiendaonline2";

    try {
        $conexion = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE productos SET Nombre= WHERE id=2";

        // Prepare statement
        $stmt = $conexion->prepare($sql);

        // execute the query
        $stmt->execute();

        // echo a message to say the UPDATE succeeded
        echo $stmt->rowCount() . " records UPDATED successfully";
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;

}

if(isset($_GET['EnviarModifica'])){

    $id = $_GET['id_modifica'];

    //Creo el formulario con los datos a rellenar
    $String = "<form name='formulario' action= 'edita_producto.php' method='post' enctype='multipart/form-data'>";


    $string .= "<label> Introduce el nuevo nombre del producto: </label><input type='text' placeholder='Nuevo nombre' name='nombre_producto' id='nombre_producto_mod'>";
    $string .="<br>";
    $string .="<label> Introduce el nuevo precio del  producto en Euros: </label><input type='number' placeholder='precio' name='precio_producto' min='0.1' step='any' id='precio_prodicto_mod'>";
    $string .="<br>";
    $string .= "<input type='hidden' value='". $id."' name='id_modificar'>";
    $string .= "<label>Introduce una nueva imagen para el producto: </label> <input type='file' name='imagen_producto' id='imagen_producto_mod'>";
    $string .="<br>";
    $string .= "<label>Selecciona la categoría del producto: </label> 
    <select id='categoria_producto_mod' name='categoria_producto'>
        <option value='1'> Deportivo </option>
        <option value='2'> Diver </option>
        <option value='3'> Clasico </option>
        <option value='4'> Casual </option>
    </select>";
    $string .="<br>";
    $string .= "<button type='submit' name='Enviar'> Modificar producto </button>";
    $string .= "</form>";

    echo $string;








    // Si no se recibe el boton de modificar, mostrar al usuario un desplegable que escoja un producto a modificar
}else{

}

?>

