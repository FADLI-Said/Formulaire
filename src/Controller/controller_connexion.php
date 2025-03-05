<?php

session_start();

require_once "../../config.php";

$error = [];


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["id"])) {
        if (empty($_POST["id"])) {
            $error["id"] = "<i class='fa-solid fa-circle-exclamation'></i> Pseudo où Email obligatoire";
        }
    }

    if (isset($_POST["password"])) {
        if (empty($_POST["password"])) {
            $error["password"] = "<i class='fa-solid fa-circle-exclamation'></i> Mot de passe obligatoire";
        }
    }

    if (!empty($_POST["id"]) && !empty($_POST["password"])) {
        // On se connete a la base de donnée via pdo = création instance
        $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASS);

        // Options avances sur notre instance
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT
                    *
                FROM
                    `76_users`
                where
                    user_mail = :identifiant
                    or user_pseudo = :identifiant";

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(":identifiant", $_POST["id"], PDO::PARAM_STR);

        $stmt->execute();

        $stmt->rowCount() == 0 ? $found = false : $found = true;

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($found == false) {
            $error["connexion"] = "<i class='fa-solid fa-circle-exclamation'></i> L'identifiant ou le mot de passe est incorrect";
        } else {
            if (password_verify($_POST["password"], $user["user_password"])) {
                $_SESSION = $user;
                header("Location: controller_profile.php");
                exit;
            } else {
                $error["connexion"] = "<i class='fa-solid fa-circle-exclamation'></i> L'identifiant ou le mot de passe est incorrect";
            }
        }

        $pdo = "";
    }


}

include_once "../View/view_connexion.php";

?>