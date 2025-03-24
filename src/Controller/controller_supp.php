<?php

session_start();
require_once "../../config.php";
require_once "../Model/model_post.php";


if (isset($_GET['supp'])) {
    Post::deletePost($_GET['supp']);
    header('Location: controller_profile.php');
    exit;
}

?>