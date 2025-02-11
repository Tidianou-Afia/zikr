<?php

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'tidianouafia@gmail.com';

  if( file_exists($php_email_form = '../vendor/php-email-form/FormToEmail.php' )) {
    // require_once($php_email_form);
    include($php_email_form);
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  // $contact = new PHP_Email_Form;
  // $contact = new $php_email_form;
  $contact->smtp =[
    'host' => 'localhost',
    'username' => 'root',
    'password' => '',
    'port' => '3306'
  ];
  // $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  

  

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
 
 $name =  $_POST['name'];
 $email =  $_POST['email'];
 $subject =  $_POST['subject'];
 $message =  $_POST['message'];

// Création du corps de l'email
$message_html = "
    <p><strong>Nom :</strong> $name</p>
    <p><strong>Email :</strong> $email</p>
    <p><strong>Message :</strong> $message</p>
";

// Envoi de l'email
$to = 'tidianouafia@gmail.com'; // Remplacez par votre adresse email
// $subject = 'Nouveau message depuis votre formulaire';
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
$headers .= "From: $name <$email>\r\n";

mail($to, $subject, $message_html, $headers);

// Message de confirmation
echo 'Votre message a été envoyé avec succès.';

// // Récupération des données du formulaire
// $name = $_POST['name'];
// $email = $_POST['email'];
// $message = $_POST['message'];

// // Construction du message
// $to = "tidianouafia@gmail.com";
// $subject = "Nouveau message depuis votre formulaire";
// $message_body = "
// name: $name
// Email: $email
// Message:
// $message

// ";

// // Envoi de l'email
// if (mail($to, $subject, $message_body)) {
//     echo "Votre message a été envoyé avec succès.";
// } else {
//     echo "Une erreur s'est produite lors de l'envoi du message.";
// }

?>
