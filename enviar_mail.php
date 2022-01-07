<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>



    <?php

    $nombre = $_POST['nombre'];

  

    $texto_mail = $_POST["comentarios"];
    $destinatario = $_POST["email"];
    $asunto = $_POST["asunto"];

    $text = $texto_mail;
    $newtext = "Hola: " . $nombre . "<br />\n" . (wordwrap($text, 80, "<br />\n"));

    $to = $destinatario;
    $subject = $asunto;
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $message = $newtext;
    mail($to, $subject, $message, $headers);

    $exito = mail($destinatario, $asunto, $texto_mail, $headers);
    //la funcion mail() devuelve true si el mensaje se envio

    if ($exito) {
        echo "Mensaje enviado con Exito";
    } else {
        echo "Error en el envio del mensaje";
    }

    echo "<br>";

    echo "<a href='index.php'>Volver</a>";



    ?>

</body>

</html>