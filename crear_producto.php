<?php

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
            <form>
                <label>Introduce un nombre: </label><input type="text" id="nombre_producto">
                <br>
                <label>Introduce el precio en €: </label><input type="number" min="0.1" step="any" id="precio_producto">
                <br>
                <label>Introduce una imagen para el producto: </label> <input type="file" id="imagen_producto">
                <br>
                <label>Selecciona la categoría del producto: </label> 
                <select id="categoria_producto">
                    <option> Deportivo </option>
                    <option> Diver </option>
                    <option> Clasico </option>
                    <option> Casual </option>
                </select>
            </form>
        </div>
    </body>

</html>