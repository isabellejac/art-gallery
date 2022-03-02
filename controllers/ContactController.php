<!--CONTACT CONTROLLER TO CHECK FORMULAR CONTACT -->
<?php

class ContactController {
    

public function contact()
    {
$check= "";

if(!empty($_POST)){
    

$errors= [];

if(!array_key_exists('name', $_POST) || $_POST['name'] == '') {
    $errors ['name'] = "Please insert your Name";
}
if(!array_key_exists('firstname', $_POST) || $_POST['firstname'] == '') {
    $errors ['firstname'] = "Please insert your First Name";
}

if(!array_key_exists('email', $_POST) || $_POST['email'] == '' || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors ['email'] = "Please insert your Email";
}

if(!array_key_exists('message', $_POST) || $_POST['message'] == '') {
    $errors ['message'] = "Please insert your Message";
}


    $_SESSION ['errors'] = $errors;
    if(empty($errors)){
        $check= "Your email is sent!";
        
        $to      = $_POST['email'];
        $subject = 'Nouvelle demande de contact';
        $message = $_POST['message'];

        $headers = array(
            'From' => 'stl.jacob@free.fr',
            'Reply-To' => 'stl.jacob@free.fr',
            'X-Mailer' => 'PHP/' . phpversion()
        );

        mail($to, $subject, $message, $headers);
    }

}        
        $template="contact";
        require "www/layout.phtml";
    } 
}