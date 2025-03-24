<?php

class Profile
{
    public static function countPost($user_id)
    {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT COUNT(*)
                FROM 76_posts
                WHERE user_id = :user_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $posts = $stmt->fetch(PDO::FETCH_ASSOC);
        $posts = $posts['COUNT(*)'];
        return $posts;
    }

    public static function countFollowers($user_id)
    {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT COUNT(*)
                FROM 76_favorites
                WHERE fav_id = :fav_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':fav_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $followers = $stmt->fetch(PDO::FETCH_ASSOC);
        $followers = $followers['COUNT(*)'];
        return $followers;
    }

    public static function countFollows($user_id)
    {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT COUNT(*)
                FROM 76_favorites
                WHERE user_id = :user_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $follows = $stmt->fetch(PDO::FETCH_ASSOC);
        $follows = $follows['COUNT(*)'];
        return $follows;
    }

    public static function addFavorite($user_id, $fav_id)
    {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO 76_favorites (user_id, fav_id)
                VALUES (:user_id, :fav_id)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindValue(':fav_id', $fav_id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
