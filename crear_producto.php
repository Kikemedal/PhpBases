<?php


//Comprobar que los arrays no esten vacios aqui.
$nombre_producto = $_POST['nombre_producto'];
$precio_producto = $_POST['precio_producto'];
//Mirar subida de ficheros;
$categoria_producto = $_POST['categoria_producto'];

?>


<!DOCTYPE html>

<html lan="en">
    <head>
        <title> Formulario para crear producto </title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1> Formulario para crear Producto</h1>
        <div>
            <form name="formulario" action="crear_producto.php" method="post" enctype="multipart/form-data">
                <label>Introduce un nombre: </label><input placeholder="nombre" type="text" name="nombre_producto" id="nombre_producto">
                <br>
                <label>Introduce el precio en €: </label><input type="number" placeholder="numero" name="precio_producto" min="0.1" step="any" id="precio_producto">
                <br>
                <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
                <label>Introduce una imagen para el producto: </label> <input type="file" name="imagen_producto" id="imagen_producto">
                <br>
                <label>Selecciona la categoría del producto: </label> 
                <select id="categoria_producto" name="categoria_producto">
                    <option> Deportivo </option>
                    <option> Diver </option>
                    <option> Clasico </option>
                    <option> Casual </option>
                </select>
                <br>
                <button type="submit"> Enviar Formulario </button>
            </form>
        </div>
    </body>

</html>