<?php

namespace App\controllers;

use App\exceptions\SystemException;

class ContactController
{
    /**
     * Send an email to the website admin and redirect to home page
     * and redirect to home page.
     *
     * @throws SystemException
     *                         If the POST 'lastname' ou 'firstname' ou 'email' ou 'subject' ou 'content' not exist or is null
     * 
     * @return
     */
    public function send()
    {
        if (!isset($_POST['lastname']) || !isset($_POST['firstname']) || !isset($_POST['email']) || !isset($_POST['subject']) || !isset($_POST['content'])) {
            throw new SystemException();
        }

        $to = ADMIN_EMAIL;
        $subject = $_POST['subject'];
        $message = $_POST['content'];
        $headers = [
            'FROM' => $_POST['email'],
            'Reply-To' => $_POST['email'],
            'X-Mailer' => 'PHP/'.phpversion(),
        ];

        mail($to, $subject, $message, $headers);

        $_SESSION['message'] = [
            'color' => 'success',
            'content' => 'Message envoyé',
        ];

        header('Location: /');
        return;
    }
}
