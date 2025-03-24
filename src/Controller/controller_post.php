<?php

session_start();

require_once "../../config.php";

if (!isset($_SESSION['user_id'])) {
    // on renvoie vers la page d'accueil
    header('Location: ../../public/');
    exit;
}




if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_FILES["photo"])) {
        if (empty($_FILES["photo"]["name"])) {
            $error["photo"] = "<i class='fa-solid fa-circle-exclamation'></i> Image obligatoire";
        }
    }

    if (isset($_POST["description"])) {
        if (empty($_POST["description"])) {
            $error["description"] = "<i class='fa-solid fa-circle-exclamation'></i> Description obligatoire";
        }
    }

    $target_dir = "../../assets/img/users/" . $_SESSION["user_id"] . "/";
    $newName = uniqid() . "_" . basename($_FILES["photo"]["name"]);
    $target_file = $target_dir . $newName;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (!empty($_FILES["photo"]["name"]) && !empty($_POST["description"])) {

        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["photo"]["tmp_name"])) . " a été téléchargé.";
        } else {
            echo "Désolé, il y a eu une erreur lors du téléchargement de votre fichier.";
        }

        // On se connete a la base de donnée via pdo = création instance
        $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASS);

        // Options avances sur notre instance
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO
        `76_posts` (
            `post_timestamp`,
            `post_description`,
            `post_private`,
            `user_id`
        ) VALUE (:date, :description, :private, :user_id)";


        // On prépare la requête avant de l'exécuter
        $stmt = $pdo->prepare($sql);

        function safeInput($string)
        {
            $input = trim($string);
            $input = htmlspecialchars($input);
            return $input;
        }



        $stmt->bindValue(":date", time(), PDO::PARAM_STR);
        $stmt->bindValue(":description", safeInput($_POST["description"]), PDO::PARAM_STR);
        $stmt->bindValue(":private", isset($_POST["condition"]) ? 1 : 0, PDO::PARAM_INT);
        $stmt->bindValue(":user_id", $_SESSION["user_id"], PDO::PARAM_INT);

        $stmt->execute();

        $id = $pdo->lastInsertId();

        $sql = "INSERT INTO
        `76_pictures` (
            `pic_name`,
            `post_id`
        ) VALUE (:photo, :post_id)";

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(":photo", $newName, PDO::PARAM_STR);
        $stmt->bindValue(":post_id", $id, PDO::PARAM_STR);

        if ($stmt->execute()) {
            header("Location: controller_profile.php");
            exit;
        }

        $pdo = "";
    }
}



include_once '../View/view_post.php';
