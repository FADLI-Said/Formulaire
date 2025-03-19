<?php

use Dom\Comment;

require_once "../../config.php";
require_once "../Model/model_comments.php";
require_once "../Model/model_like.php";
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

    $sql = "SELECT post_description, pic_name, user_pseudo, post_timestamp, user_id, post_id FROM 76_posts
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
}

$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USER, DB_PASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT 76_users.user_id, user_pseudo, com_text, com_timestamp, com_id FROM 76_comments
        INNER JOIN 76_users
        ON 76_comments.user_id = 76_users.user_id
        WHERE post_id = :post_id";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':post_id', $_GET['post'], PDO::PARAM_INT);
$stmt->execute();
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

$commentaires = '';
$i = 0;
foreach ($comments as $value) {
    $commentaires .= "
        <p class='p-2 overflow-x-hidden'>
            <span class='fw-bold fs-5'>" . $value['user_pseudo'] . "</span>
            <small>" . date("d/m/Y H:i", (int)$value["com_timestamp"] + 3600) . "</small>
            " . ($_SESSION["user_id"] == $value["user_id"] ? "
                <button class='btn btn-primary p-1' id='liveToastBtn{". $value["com_id"] ."}'>
                    Supprimer
                </button>" : "") . "<br>" . $value['com_text'] . "
        </p>
        <div class='toast-container position-fixed bottom-0 end-0 p-3'>
            <div id='liveToast{". $value["com_id"] ."}' class='toast' role='alert' aria-live='assertive' aria-atomic='true'>
                <div class='toast-header'>
                    <strong class='me-auto'>".$value["user_pseudo"]."</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
                </div>
                <div class='toast-body'>
                    <a href='?post=".$uniquePost["post_id"]."&com=". $value["com_id"] ."'>Confirmer</a>
                </div>
            </div>
        </div>";
    $i++;
}


if (isset($_GET['com'])) {
    Comments::deleteComment($_GET['com']);
    header('Location: controller_openpost.php?post=' . $_GET['post']);
    exit;
}

include_once '../View/view_openpost.php';
