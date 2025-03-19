<?php

session_start();

require_once "../Model/model_profile.php";
require_once "../../config.php";

if (!isset($_SESSION['user_id'])) {
    // on renvoie vers la page d'accueil
    header('Location: ../../public/');
    exit;
}



if (isset($_GET['profile'])) {

    $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT
            *
        FROM
            `76_posts` 
        natural join `76_pictures`
        natural join `76_users`
        WHERE user_id = :user_id 
        ORDER BY
            post_timestamp DESC
           ;";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':user_id', $_GET['profile'], PDO::PARAM_STR);

    $stmt->execute();

    $uniqueUser = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!$uniqueUser) {
        header('Location: ../View/view_introuvable.php');
        exit;
    }

    // var_dump($uniqueUser);

    $images = "";
    $i = 0;
    foreach ($uniqueUser as $key => $value) {
        $images .= "
        <a href='controller_openpost.php?post=" . $value['post_id'] . "' class='col-lg-4 p-1'>
        <img src='../../assets\img\users/" . $uniqueUser[0]["user_id"] . "/" . $value["pic_name"] . "' alt='' class='col-12' style='height:15rem'>
         </a>";
        $i++;
    }

    $pdo = '';
}




















include_once '../View/view_otherprofile.php';
