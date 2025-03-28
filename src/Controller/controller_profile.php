<?php

session_start();

require_once "../Model/model_profile.php";
require_once "../../config.php";

if (!isset($_SESSION['user_id'])) {
    // on renvoie vers la page d'accueil
    header('Location: ../../public/');
    exit;
}


// On se connete a la base de donnée via pdo = création instance
$pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASS);

// Options avances sur notre instance
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT
            *
        FROM
            `76_posts` 
        natural join `76_pictures`
        ORDER BY
            post_timestamp DESC;
        ";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$info = $stmt->fetchAll();


$images = "";
foreach ($info as $key => $value) {
    if ($_SESSION["user_id"] == $value["user_id"]) {
        $images .= "
        <a href='controller_openpost.php?post=" . $value['post_id'] . "' class='col-lg-4 p-1'>
        <img src='../../assets\img\users/" . $_SESSION["user_id"] . "/" . $value["pic_name"] . "' alt='Image du poste de ". $value["post_description"] ."' class='col-12' style='height:15rem'>
         </a>";
    }
}

include_once "../View/view_profile.php";
?>