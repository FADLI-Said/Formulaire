<?php

require_once "../../config.php";

$regex_name = "/^[a-zA-ZÀ-ú]+$/";
$regex_password = "/^[a-zA-Z0-9]{8,30}+$/";
$regex_pseudo = "/^[^<>]+$/";
$regex_date = "/^[0-9--]{10}+$/";

$error = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // On se connete a la base de donnée via pdo = création instance
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASS);

    // Options avances sur notre instance
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT
                *
            FROM
                `76_users`
            where
                user_pseudo = :pseudo";

    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(":pseudo", $_POST["pseudo"], PDO::PARAM_STR);

    $stmt->execute();

    $stmt->rowCount() != 0 ? $found = true : $found = false;

    $pdo = "";

    if (isset($_POST["pseudo"])) {
        if (empty($_POST["pseudo"])) {
            $error["pseudo"] = "<i class='fa-solid fa-circle-exclamation'></i> Pseudo obligatoire";
        } elseif (!preg_match($regex_pseudo, $_POST["pseudo"])) {
            $error["pseudo"] = "<i class='fa-solid fa-circle-exclamation'></i> Caractère non autorisés";
        } elseif ($found == true) {
            $error["pseudo"] = "<i class='fa-solid fa-circle-exclamation'></i> Ce pseudo est déjà utilisé";
        }
    }

    if (isset($_POST["lastname"])) {
        if (empty($_POST["lastname"])) {
            $error["lastname"] = "<i class='fa-solid fa-circle-exclamation'></i> Nom obligatoire";
        } elseif (!preg_match($regex_name, $_POST["lastname"])) {
            $error["lastname"] = "<i class='fa-solid fa-circle-exclamation'></i> Caractère non autorisés";
        }
    }

    if (isset($_POST["firstname"])) {
        if (empty($_POST["firstname"])) {
            $error["firstname"] = "<i class='fa-solid fa-circle-exclamation'></i> Prénom obligatoire";
        } elseif (!preg_match($regex_name, $_POST["firstname"])) {
            $error["firstname"] = "<i class='fa-solid fa-circle-exclamation'></i> Caractère non autorisés";
        }
    }

    // On se connete a la base de donnée via pdo = création instance
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASS);

    // Options avances sur notre instance
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT
                    *
                FROM
                    `76_users`
                where
                    user_mail = :mail";

    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(":mail", $_POST["mail"], PDO::PARAM_STR);

    $stmt->execute();

    $stmt->rowCount() != 0 ? $found = true : $found = false;

    $pdo = "";

    if (isset($_POST["mail"])) {
        if (empty($_POST["mail"])) {
            $error["mail"] = "<i class='fa-solid fa-circle-exclamation'></i> Email obligatoire";
        } elseif (!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
            $error["mail"] = "<i class='fa-solid fa-circle-exclamation'></i> mail non valide";
        } elseif ($found == true) {
            $error["mail"] = "<i class='fa-solid fa-circle-exclamation'></i> Ce mail est déjà utilisé";
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

    if (isset($_POST["birthdate"])) {
        if (empty($_POST["birthdate"])) {
            $error["birthdate"] = "<i class='fa-solid fa-circle-exclamation'></i> Date de naissance obligatoire";
        } elseif (!preg_match($regex_date, $_POST["birthdate"])) {
            $error["birthdate"] = "<i class='fa-solid fa-circle-exclamation'></i> Date impossible";
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

        // On se connete a la base de donnée via pdo = création instance
        $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASS);

        // Options avances sur notre instance
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // On stock notre requête avec des marqueurs nominatif
        $sql = "INSERT INTO
    `76_users` (
        `user_gender`,
        `user_lastname`,
        `user_firstname`,
        `user_pseudo`,
        `user_birthdate`,
        `user_mail`,
        `user_password`
    ) VALUE (
        :genre,
        :lastname,
        :firstname,
        :pseudo,
        :birthdate,
        :mail,
        :password
    )";

        // On prépare la requête avant de l'exécuter
        $stmt = $pdo->prepare($sql);

        function safeInput($string)
        {
            $input = trim($string);
            $input = htmlspecialchars($input);
            return $input;
        }

        $stmt->bindValue(":genre", safeInput($_POST["genre"]), PDO::PARAM_STR);
        $stmt->bindValue(":lastname", safeInput($_POST["lastname"]), PDO::PARAM_STR);
        $stmt->bindValue(":firstname", safeInput($_POST["firstname"]), PDO::PARAM_STR);
        $stmt->bindValue(":pseudo", safeInput($_POST["pseudo"]), PDO::PARAM_STR);
        $stmt->bindValue(":birthdate", safeInput($_POST["birthdate"]), PDO::PARAM_STR);
        $stmt->bindValue(":mail", safeInput($_POST["mail"]), PDO::PARAM_STR);
        $stmt->bindValue(":password", password_hash($_POST["password"], PASSWORD_DEFAULT), PDO::PARAM_STR);

        // On exécute la requête

        if ($stmt->execute()) {
            header("Location: controller_confirmation.php");
            exit;
        }

        // On "supprime" l'instance $pdo
        $pdo = "";

        // try {

        // } catch (\Throwable $th) {
        //throw $th;
        // }

        // header("Location: ../../src/View/view_confirmation.php");
    }
}

include_once "../View/view_inscription.php";