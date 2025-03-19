<?php

session_start();

require_once "../Model/model_comments.php";
require_once "../Model/model_like.php";
require_once "../../config.php";

if (!isset($_SESSION['user_id'])) {
    // on renvoie vers la page d'accueil
    header('Location: ../../public/');
    exit;
}

// var_dump($_SESSION);
$pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASS);

// Options avances sur notre instance
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT * FROM 76_posts NATURAL JOIN 76_pictures NATURAL JOIN 76_users where user_id in (
(SELECT group_concat(fav_id) from 76_favorites where user_id = :user_id
GROUP BY user_id),:user_id
)';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(":user_id", $_SESSION["user_id"], PDO::PARAM_STR);
$stmt->execute();
$info = $stmt->fetchAll();
// var_dump($info);

$images = "";
$i = 0;
foreach ($info as $key => $value) {

    $images .= "
        <div class='border home d-flex justify-content-between mt-2 p-3'>
            <div class='d-flex'>
            
            <a href='controller_otherprofile.php?profile=" . $value['user_id'] . "' class='text-black text-decoration-none'>
                <img src='../../assets\img\dog.jpg' alt='Image de profile' class='rounded-circle home-profile'>
                <h1 class='fs-6 d-flex align-items-center my-0 ms-1 text-decoration-none'>" . $value["user_pseudo"] . "</a> <small class='text-body-secondary'>
                        · " . date('d/m/Y H:i', $value["post_timestamp"]) . "</small>
                </h1>
            </div>
            <button class='btn align-baseline py-0 d-flex align-items-baseline fs-3'>···</button>
        </div>
        <a href='controller_openpost.php?post=" . $value['post_id'] . "' id='post-image'>
            <img src='../../assets\img\users/" . $value["user_id"] . "/" . $value["pic_name"] . "' alt='' class='col-lg-12 col-11 mx-auto d-block'>
        </a>
        <div class='border home'>
            <div class='d-flex p-2'>
                " . Like::countLike($value["post_id"]) . "<i class='fa-regular fa-heart btn p-1'></i>
                " . Comments::countComment($value["post_id"]) . "<a href='controller_openpost.php?post=" . $value['post_id'] . "'><i class='fa-regular fa-comment btn p-1'></i></a>
            </div>
            <p class='d-flex p-2'>" . $value["user_pseudo"] . "<i
                    class='fa-solid fa-certificate fa-bounce position-relative text-primary ms-1 fs-4'>
                    <i
                        class='fa-solid fa-check fa-bounce position-absolute top-50 start-50 translate-middle z-1 text-white fs-6'></i>
                </i> : " . $value["post_description"] . "</p>
        </div>

        ";
    $i++;
}



include_once '../View/view_home.php';
