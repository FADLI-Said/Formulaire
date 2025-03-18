<?php

require_once "../../config.php";
require_once "../Model/model_comments.php";
session_start();

if (!isset($_SESSION['user_id'])) {
    // on renvoie vers la page d'accueil
    header('Location: ../../public/');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    Comments::addComment($_POST['comment'], $_GET['post'], $_SESSION['user_id']);
}

$error = [];
$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USER, DB_PASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_GET['post'])) {

    $sql = "SELECT post_description, pic_name, user_pseudo, post_timestamp, user_id FROM 76_posts
        NATURAL JOIN 76_pictures
        NATURAL JOIN 76_users
        WHERE post_id = :pic_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':pic_id', $_GET['post'], PDO::PARAM_STR);

    $stmt->execute();

    $uniquePost = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$uniquePost) {
        header('Location: ../View/view_introuvable.php');
        exit;
    }

    // var_dump($_GET['post']);

    $sql = "SELECT COUNT(*) FROM 76_likes WHERE post_id = :post_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':post_id', $_GET['post'], PDO::PARAM_STR);
    $stmt->execute();
    $like = $stmt->fetch(PDO::FETCH_ASSOC);
    $like = $like['COUNT(*)'];

    $sql = "SELECT COUNT(*) FROM 76_comments WHERE post_id = :post_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':post_id', $_GET['post'], PDO::PARAM_INT);
    $stmt->execute();
    $comment = $stmt->fetch(PDO::FETCH_ASSOC);
    $comment = $comment['COUNT(*)'];
}





















include_once '../View/view_openpost.php';
