<?php
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$destinatario = $_POST["email"];
$asunto = $_POST["asunto"];
$textoMail = $_POST["comentarios"];
$vacio = "";

$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: Prueba Juan < info@paginaswebrr.com >\r\n";

echo "<br>Nombre: $nombre";
echo "<br>Apellido: $apellido";
echo "<br>Destinatario: $destinatario";
echo "<br>Asunto: $asunto";
echo "<br>Mensaje: $textoMail";
echo "<br>Headers: $headers";

if ($nombre == "" || $apellido == "" || $destinatario == "" || $textoMail == "") {
    echo "<br>Faltan campos obligatorios";
} else {
    // https://www.php.net/manual/es/function.mail.php
    $exito = mail($destinatario, $asunto, $textoMail, $headers);
    if ($exito) {
        echo "<br>Mensaje enviado con éxito";
    } else {
        echo "<br>Ha habido un error";
    }
}
