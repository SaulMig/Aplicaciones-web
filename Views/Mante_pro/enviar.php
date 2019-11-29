


<?php

    $asunto=["Asunto"];
    $destino= $_POST["email"];
    $mensaje =$_POST["mensaje"];

    $contenido="Asunto".$asunto."\nDestino".$destino."\nMensaje".$mensaje;

    mail($destino,"contacto",$contenido);
    header("Location:Mante_pro.html")





?>
