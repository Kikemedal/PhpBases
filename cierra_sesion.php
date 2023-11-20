<?php 

session_start(); //Para acceder al array global es necesario iniciar sesion

session_unset(); //Vacia la informacion de la variable global.

session_destroy(); //Destruye toda la informacion asociada a una sesión actual.

header("Location: form_login.php");



?>