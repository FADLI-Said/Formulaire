<?php

session_start();

require_once "../../config.php";

if (!isset($_SESSION['user_id'])) {
    // on renvoie vers la page d'accueil
    header('Location: ../../public/');
    exit;
}
$regexNotempty = "/[a-zA-Z0-9\S]+/";

$error = [];
$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USER, DB_PASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_GET['post'])) {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST['comment'])) {
            $error['comment'] = "Commentaire vide";
        } elseif (!preg_match($regexNotempty, $_POST['comment'])) {
            $error['comment'] = "Caractère non autorisé";
        } else {
            $sql = "INSERT INTO 76_comments (com_text, post_id, user_id) VALUES (:com_text, :post_id, :user_id)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':com_text', $_POST['comment'], PDO::PARAM_STR);
            $stmt->bindValue(':post_id', $_GET['post'], PDO::PARAM_INT);
            $stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
            $stmt->execute();
        }
    }

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
    $stmt->bindValue(':post_id', $_GET['post'], PDO::PARAM_STR);
    $stmt->execute();
    $comment = $stmt->fetch(PDO::FETCH_ASSOC);
    $comment = $comment['COUNT(*)'];


    $sql = "SELECT user_pseudo, com_text FROM 76_comments
        INNER JOIN 76_users
        ON 76_comments.user_id = 76_users.user_id
        WHERE post_id = :post_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':post_id', $_GET['post'], PDO::PARAM_STR);
    $stmt->execute();
    $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $commentaires = '';
    foreach ($comments as $key => $value) {
        $commentaires .= "<p class='p-2 overflow-x-hidden'>" . $value['user_pseudo'] . " : <br>" . $value['com_text'] . "</p>";
    }

    $pdo = '';
}





















include_once '../View/view_openpost.php';
