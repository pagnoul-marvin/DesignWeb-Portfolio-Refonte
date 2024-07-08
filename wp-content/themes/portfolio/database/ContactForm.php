<?php

namespace DW;

use Validator\Validator;

class ContactForm {
    private static array $requiredFields = ['firstname', 'lastname', 'email', 'message'];
    private static array $errors = [];
    private static array $values = [];
    private static bool $feedback = false;

    public function __construct() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->process_form();
        }
    }

    public static function errors(): array
    {
        return self::$errors;
    }

    public static function values(): array
    {
        return self::$values;
    }

    public static function feedback(): bool
    {
        return self::$feedback;
    }

    private function process_form(): void
    {
        self::$values['firstname'] = sanitize_text_field($_POST['firstname']);
        self::$values['lastname'] = sanitize_text_field($_POST['lastname']);
        self::$values['email'] = sanitize_email($_POST['email']);
        self::$values['message'] = sanitize_textarea_field($_POST['message']);

        $this->validate();

        if (empty(self::$errors)) {
            $this->send_email();
            self::$feedback = true;
        }
    }

    private function validate(): void
    {
        if (!Validator::validateEmail($_POST['email'])) {
            self::$errors['email'] = 'L\'adresse email n\'est pas valide';
        }

        if (!Validator::emailContainsAtSymbol($_POST['email'])) {
            self::$errors['email'] = 'Le caractère @ est requis';
        }

        if (!Validator::max('firstname', 255)) {
            self::$errors['firstname'] = 'Le prénom ne doit pas dépasser les 255 caractères.';
        }

        if (!Validator::max('lastname', 255)) {
            self::$errors['lastname'] = 'Le nom ne doit pas dépasser les 255 caractères.';
        }

        if (!Validator::no_numbers('firstname')) {
            self::$errors['firstname'] = 'Le prénom ne doit pas contenir de chiffre.';
        }

        if (!Validator::no_numbers('lastname')) {
            self::$errors['lastname'] = 'Le nom ne doit pas contenir de chiffre.';
        }

        foreach (self::$requiredFields as $field) {
            if (!Validator::required($field)) {
                self::$errors[$field] = 'Le champ' . ' ' . ucfirst($field) . ' est requis.';
            }
        }
    }

    private function send_email(): void
    {
        $to = "marvinpagnoul@icloud.com";
        $subject = "Nouveau formulaire de contact soumis";
        $body = "Un nouveau formulaire de contact a été soumis avec les informations suivantes:" . PHP_EOL;
        $body .= "Prénom: " . $_POST['firstname'] . PHP_EOL;
        $body .= "Nom: " . $_POST['lastname'] . PHP_EOL;
        $body .= "E-mail: " . $_POST['email'] . PHP_EOL;
        $body .= "Message: " . $_POST['message'] . PHP_EOL;
        $headers = "From: " . $_POST['email'] . PHP_EOL;
        $headers .= "Reply-To: " . $_POST['email'] . PHP_EOL;
        wp_mail($to, $subject, $body, $headers);
    }
}