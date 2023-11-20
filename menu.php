<?php

session_start();

if(empty($_SESSION['correo'])){

    header("Location: form_login.php");

    exit(); //Salimos del script actual para que no siga con el codigo de abajo.

}


?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title> Menu principal </title>

    </head>

    <body>
        <header>
            <h1> Menu principal </h1>
        </header>
        <nav>
            <ul>
                <li> <a href='crear_producto.php'> Crea un producto </a></li>
                <li> <a href='listado_productos.php'> Consulta un producto </a></li>
                <li> <a href='edita_producto.php'> Modifica un producto </a></li>
                <li> <a href=''> Elimina un producto </a></li>
            </ul>
        </nav>
        <br>
        <a href='cierra_sesion.php'> Cierra sesion </a>
    </body> 

</html>
