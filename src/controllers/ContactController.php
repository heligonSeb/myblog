<?php


namespace App\controllers;

use App\exceptions\SystemException;

class ContactController {
    /**
     * Send an email to the website admin and redirect to home page
     * and redirect to home page
     */
    public function send() {
        if(!isset($_POST['lastname']) || !isset($_POST['firstname']) || !isset($_POST['email']) || !isset($_POST['subject']) || !isset($_POST['content'])) {
            throw new SystemException(); 
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

        header('Location: /');
    }
}
