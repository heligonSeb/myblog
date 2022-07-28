<?php


namespace App\controllers;

class ContactController {
    public function send() {
        if(!isset($_POST['lastname']) || !isset($_POST['firstname']) || !isset($_POST['email']) || !isset($_POST['subject']) || !isset($_POST['content'])) {
            throw new \Exception("Un des champs du formulaire est vide", 1);
        }

        $to      = 'heligon.seb@gmail.com';
        $subject = $_POST['subject'];
        $message = $_POST['content'];
        $headers = array(
            'FROM' => $_POST['email'],
            'Reply-To' => $_POST['email'],
            'X-Mailer' => 'PHP/' . phpversion()
        );
    
        mail($to, $subject, $message, $headers);

        header('Location: /public');
    }
}