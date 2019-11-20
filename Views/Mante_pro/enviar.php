<?php
    $asn="Departamento De IT";
    $email=$_POST['email'];
    $asunto=$_POST['asunto'];
    $mensaje=$_POST['mensaje'];
    //datos para el correo

    $destinatario=$email;
    $asunto= "Limpieza de Equipo";

    $carta= "De: $asn \n ";
    $carta .="Correo $email \n";
    $carta .="Asunto: $asunto\n";
    $carta .="Mensaje: $mensaje";


//Enviar el correo

    mail($destinatario,$asunto,$carta);


?>