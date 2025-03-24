<?php

session_start();
require_once "../../config.php";


if (!isset($_SESSION['user_id'])) {
    // on renvoie vers la page d'accueil
    header('Location: ../../public/');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pseudo = $_POST['pseudo'];
    $description = $_POST['description'];
    $photo = $_FILES['photo'];

    $errors = [];
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (empty($pseudo)) {
        $errors['pseudo'] = 'Le pseudo ne peut pas être vide';
    }

    if (empty($description)) {
        $errors['description'] = 'La description ne peut pas être vide';
    }

    if ($photo['error'] === 0) {
        $extension = pathinfo($photo['name'], PATHINFO_EXTENSION);
        $filename = uniqid() . '.' . $extension;
        unlink('../../assets/img/users/' . $_SESSION['user_id'] . '/avatar/' . $filename);
        move_uploaded_file($photo['tmp_name'], '../../assets/img/users/' . $_SESSION["user_id"] . "/avatar/" . $filename);
    } else {
        $filename = $_SESSION['user_avatar'];
    }

    if (empty($errors)) {
        $query = "UPDATE 76_users SET user_pseudo = :pseudo, user_description = :description, user_avatar = :avatar WHERE user_id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $stmt->bindValue(':description', $description, PDO::PARAM_STR);
        $stmt->bindValue(':avatar', $filename, PDO::PARAM_STR);
        $stmt->bindValue(':id', $_SESSION['user_id'], PDO::PARAM_INT);
        $stmt->execute();



        $_SESSION['user_pseudo'] = $pseudo;
        $_SESSION['user_description'] = $description;
        $_SESSION['user_avatar'] = $filename;


        header('Location: controller_profile.php');
        exit;
    }
}



include_once '../View/view_modif.php';
