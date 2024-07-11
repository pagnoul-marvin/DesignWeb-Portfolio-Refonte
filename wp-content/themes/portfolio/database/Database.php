<?php

namespace Database;

require_once __DIR__ . '/../validator/Validator.php';

use JetBrains\PhpStorm\NoReturn;
use PDO;
use PDOException;
use Validator\Validator;

class Database extends PDO
{
    private string $database_name;
    private array $errors = [];
    private array $requiredFields = [];

    public function __construct(string $ini_path)
    {
        if (file_exists($ini_path)) {
            $config = parse_ini_file($ini_path);
            $driver = $config['DB_DRIVER'];
            $host = $config['DB_HOST'];
            $this->database_name = $config['DB_NAME'];
            $username = $config['DB_USER'];
            $password = $config['DB_PASSWORD'];
            $port = $config['DB_PORT'];
            $charset = $config['DB_CHARSET'];
        } else {
            $this->redirectToErrorPage();
        }

        $dsn = sprintf(
            '%s:host=%s;port=%s;dbname=%s;charset=%s',
            $driver,
            $host,
            $port,
            $this->database_name,
            $charset
        );

        $this->validate();

        if (empty($this->errors)) {
            $this->sendInDatabaseAndEmail($dsn, $username, $password);
        }
    }

    private function validate(): void
    {
        if (!Validator::validateEmail($_POST['email'])) {
            $this->errors['email'] = 'L\'adresse email n\'est pas valide';
        }

        if (!Validator::emailContainsAtSymbol($_POST['email'])) {
            $this->errors['email'] = 'Le caractère @ est requis';
        }

        if (!Validator::max('firstname', 255)) {
            $this->errors['firstname'] = 'Le prénom ne doit pas dépasser les 255 caractères.';
        }

        if (!Validator::max('lastname', 255)) {
            $this->errors['lastname'] = 'Le nom ne doit pas dépasser les 255 caractères.';
        }

        if (!Validator::no_numbers('firstname')) {
            $this->errors['firstname'] = 'Le prénom ne doit pas contenir de chiffre.';
        }

        if (!Validator::no_numbers('lastname')) {
            $this->errors['lastname'] = 'Le nom ne doit pas contenir de chiffre.';
        }

        foreach ($this->requiredFields as $field) {
            if (!Validator::required($field)) {
                $this->errors[$field] = 'Le champ' . ' ' . ucfirst($field) . ' est requis.';
            }
        }
    }

    private function sendInDatabaseAndEmail($dsn, $username, $password):void
    {
        try {
            parent::__construct($dsn, $username, $password);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $message = $_POST['message'];

            $this->sendInDatabase($firstname, $lastname, $email, $message);
            $this->sendEmail($firstname, $lastname, $email, $message);

        } catch (PDOException) {
            $this->redirectToErrorPage();
        }
    }

    private function sendInDatabase($firstname, $lastname, $email, $message): void
    {
        $sql = "INSERT INTO `wp_contact_form_entries` (`firstname`, `lastname`, `email`, `message`) VALUES (:firstname, :lastname, :email, :message)";
        $stmt = $this->prepare($sql);

        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);
        $stmt->execute();
    }

    private function sendEmail($firstname, $lastname, $email, $message): void
    {
        $to = "marvinpagnoul@icloud.com";
        $subject = "Nouveau formulaire de contact soumis";
        $body = "Un nouveau formulaire de contact a été soumis avec les informations suivantes:".PHP_EOL;
        $body .= "Prénom: $firstname".PHP_EOL;
        $body .= "Nom: $lastname".PHP_EOL;
        $body .= "E-mail: $email".PHP_EOL;
        $body .= "Sujet: $message".PHP_EOL;
        $headers = "From: $email";
        $headers .= "Reply-To: $email";
        wp_mail($to, $subject, $body, $headers);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    #[NoReturn] private function redirectToErrorPage(): void
    {
        wp_redirect(home_url('me_contacter/une-erreur-est-survenue/'));
        die();
    }

}