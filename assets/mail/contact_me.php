<?php
// Check for empty fields
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$partner = strip_tags(htmlspecialchars($_POST['partner']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Create the email and send the message
$to = "mtst@nucleodetecnologia.com.br"; // Add your email address in between the "" replacing yourname@yourdomain.com - This is where the form will send a message to.
$subject = "Formulário do site do Núcleo: Parceria  $name - $partner";
$body = "Você recebeu uma nova mensagem do formulário de contato do site.\n\n"."Aqui estão os detalhes:\n\nNome: $name\n\nNome da empresa ou instituição: $partner\n\nEmail: $email\n\nTelefone: $phone\n\nMensagem:\n$message";
$header = "From: noreply@nucleodetecnologia.com.br\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$header .= "Reply-To: $email";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
