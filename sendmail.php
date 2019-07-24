<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './phpmailer/src/Exception.php';
require './phpmailer/src/PHPMailer.php';
require './phpmailer/src/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);


if (isset($_POST['nome']) && !empty($_POST['nome'])) {
  $nome = $_POST['nome'];
}
if (isset($_POST['telefone']) && !empty($_POST['telefone'])) {
  $telefone = $_POST['telefone'];
}
if (isset($_POST['email']) && !empty($_POST['email'])) {
  $email = $_POST['email'];
}
if (isset($_POST['mensagem']) && !empty($_POST['mensagem'])) {
  $mensagem = $_POST['mensagem'];
}

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'emerson.brambila@gmail.com';                     // SMTP username
    $mail->Password   = 'Emersonqwe360123';                               // SMTP password
    $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('emerson.brambila@gmail.com', 'Paradigma');
    $mail->addAddress('emerson.brambila@gmail.com', 'Emerson Brambila');     // Add a recipient
    $mail->addAddress('emerson.brambila@gmail.com');               // Name is optional
    $mail->addReplyTo('emerson.brambila@gmail.com', 'Information');
    $mail->addCC('dhschaves@gmail.com ');
    //$mail->addBCC('bcc@example.com');

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name



    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Novo contato de Paradigma';
    $mail->Body    = 'Olá, gostaria de receber um contato meus dados são: <br> <br> Nome: ' .$_POST['nome']. '<br> Telefone: ' .$_POST['telefone']. '<br> E-mail: ' .$_POST['email']. '<br> Mensagem: <br>' .$_POST['mensagem'];
    $mail->AltBody = 'Novo contato: $nome, $telefone, $email, $mensagem';

    $mail->send();
    echo '<span class="m-success">Recebemos a sua mensagem</span>, <br> em breve retornaremos em contato!';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
