<?php

function validar_nombre($nombre){
    if(empty($nombre)){
        return false;
    }else{
        $expresion = '/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/';
        if(preg_match($expresion, $nombre)){
            return true;
        }else{
            return false;
        }
    }
}

function validar_precio($precio){
    if(empty($precio)){
        return false;
    }else{
        if(gettype($precio)!= "integer" || gettype($precio)!="double"){
            return false;
        }else{
            return true;
        }
    }        
    
}


function validar_imagen($Nombre_Imagen){
    if(emty($Nombre_Imagen)){
        return false;
    }else{
        $expresion = "/\w+(\.)*\.(gif|jpe?g|png)$/i"; 
        if(preg_match($expresion, $Nombre_Imagen)){
            return true;
        }else{
            return false;
        }
    }
}

?>