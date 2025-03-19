<?php
class Like
{

    public static function countLike($post_id)
    {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT COUNT(*) FROM 76_likes WHERE post_id = :post_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':post_id', $post_id, PDO::PARAM_STR);
        $stmt->execute();
        $like = $stmt->fetch(PDO::FETCH_ASSOC);
        $like = $like['COUNT(*)'];
        return $like;
    }

    public static function addLike($post_id, $user_id)
    {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO 76_likes (post_id, user_id) VALUES (:post_id, :user_id)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':post_id', $post_id, PDO::PARAM_STR);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
        $stmt->execute();
    }
}
