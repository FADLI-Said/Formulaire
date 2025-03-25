<?php

class Post
{

    /**
     * Add a post to the database
     * 
     * @param string $description
     * @param string $pic_name
     * @param int $user_id
     * 
     */
    public static function deletePost($post_id)
    { 
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT pic_name FROM 76_pictures WHERE post_id = :post_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':post_id', $post_id, PDO::PARAM_STR);
        $stmt->execute();
        $pic_name = $stmt->fetchColumn();  
        $sql = "DELETE FROM 76_posts WHERE post_id = :post_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':post_id', $post_id, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            unlink("../../assets/img/users/" . $_SESSION['user_id'] . "/" . $pic_name);
            header('Location: ../Controller/controller_profile.php');
            exit;
        }
    }
}
