<?php

require_once "../../config.php";

$regex_name = "/^[a-zA-ZÀ-ú]+$/";
$regex_password = "/^[a-zA-Z0-9]{8,30}+$/";
$regex_pseudo = "/^[^<>]+$/";
$regex_date = "/^[0-9--]{10}+$/";

$error = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["pseudo"])) {
        if (empty($_POST["pseudo"])) {
            $error["pseudo"] = "<i class='fa-solid fa-circle-exclamation'></i> Pseudo obligatoire";
        } elseif (!preg_match($regex_pseudo, $_POST["pseudo"])) {
            $error["pseudo"] = "<i class='fa-solid fa-circle-exclamation'></i> Caractère non autorisés";
        }
    }

    if (isset($_POST["nom"])) {
        if (empty($_POST["nom"])) {
            $error["nom"] = "<i class='fa-solid fa-circle-exclamation'></i> Nom obligatoire";
        } elseif (!preg_match($regex_name, $_POST["nom"])) {
            $error["nom"] = "<i class='fa-solid fa-circle-exclamation'></i> Caractère non autorisés";
        }
    }

    if (isset($_POST["prenom"])) {
        if (empty($_POST["prenom"])) {
            $error["prenom"] = "<i class='fa-solid fa-circle-exclamation'></i> Prénom obligatoire";
        } elseif (!preg_match($regex_name, $_POST["prenom"])) {
            $error["prenom"] = "<i class='fa-solid fa-circle-exclamation'></i> Caractère non autorisés";
        }
    }

    if (isset($_POST["email"])) {
        if (empty($_POST["email"])) {
            $error["email"] = "<i class='fa-solid fa-circle-exclamation'></i> Email obligatoire";
        } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $error["email"] = "<i class='fa-solid fa-circle-exclamation'></i> Email non valide";
        }
    }

    if (isset($_POST["password"])) {
        if (empty($_POST["password"])) {
            $error["password"] = "<i class='fa-solid fa-circle-exclamation'></i> Mot de passe obligatoire";
        } elseif (!preg_match($regex_password, $_POST["password"])) {
            if (strlen($_POST["password"]) < 8) {
                $error["password"] = "<i class='fa-solid fa-circle-exclamation'></i> Mot de passe trop court";
            }
            if (strlen($_POST["password"]) > 30) {
                $error["password"] = "<i class='fa-solid fa-circle-exclamation'></i> Mot de passe trop grand";
            }
            if (strlen($_POST["password"]) >= 8 && strlen($_POST["password"]) <= 30) {
                $error["password"] = "<i class='fa-solid fa-circle-exclamation'></i> Caractère non autorisés";
            }
        }
    }

    if (isset($_POST["confirmation"])) {
        if (empty($_POST["confirmation"])) {
            $error["confirmation"] = "<i class='fa-solid fa-circle-exclamation'></i> Mot de passe obligatoire";
        } elseif (!preg_match($regex_password, $_POST["confirmation"])) {
            $error["confirmation"] = "<i class='fa-solid fa-circle-exclamation'></i> Caractère non autorisés";
        } elseif ($_POST["confirmation"] != $_POST["password"]) {
            $error["confirmation"] = "<i class='fa-solid fa-circle-exclamation'></i> Mot de passe et confirmation sont différent";
        }
    }

    if (isset($_POST["birthDate"])) {
        if (empty($_POST["birthDate"])) {
            $error["birthDate"] = "<i class='fa-solid fa-circle-exclamation'></i> Date de naissance obligatoire";
        } elseif (!preg_match($regex_date, $_POST["birthDate"])) {
            $error["birthDate"] = "<i class='fa-solid fa-circle-exclamation'></i> Date impossible";
        }
    }

    if (isset($_POST["genre"])) {
        if (empty($_POST["genre"])) {
            $error["genre"] = "<i class='fa-solid fa-circle-exclamation'></i> Genre obligatoire";
        }
    }

    if (!isset($_POST["condition"])) {
        $error["condition"] = "<i class='fa-solid fa-circle-exclamation'></i> CGU obligatoire";
    }

    if (empty($error)) {

        // On se connete
        $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        var_dump($pdo);
        // try {

        // } catch (\Throwable $th) {
        //throw $th;
        // }

        // header("Location: ../../src/View/view_confirmation.php");
    }
}

include_once "../View/view_inscription.php";
