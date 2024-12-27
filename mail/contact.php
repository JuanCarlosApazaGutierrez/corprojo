<?php
if(empty($_POST['name']) || empty($_POST['phone']) || empty($_POST['pais']) || empty($_POST['servicio']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$m_subject = strip_tags(htmlspecialchars($_POST['servicio']));
$message = strip_tags(htmlspecialchars($_POST['message']));
$pais = strip_tags(htmlspecialchars($_POST['pais']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));

$to = "nuevavidaparajuan@gmail.com"; 
$subject = "$m_subject:  $name";
$body = "Tienes el siguiente mensaje .\n\n"."Con estos detalles:\n\nNombre: $name\n\n\nEmail: $email\n\nAsunto: $m_subject\n\nMensaje: $message\n\n\nTelefono: $phone\n\n\nPais: $pais";
$header = "From: $email";
$header .= "Reply-To: $email";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
