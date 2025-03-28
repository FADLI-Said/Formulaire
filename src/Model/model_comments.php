<?php

class Comments
{
    /**
     * Rajooute un commentaire à un post
     * 
     * @param string $com_text
     * @return array
     */
    public static function addComment(string $com_text, int $post_id, int $user_id)
    {
        $error = [];
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $regexNotempty = "/[a-zA-Z0-9\S]+/";
        if (empty($com_text)) {
            $error['comment'] = "<i class='fa-solid fa-circle-exclamation'></i> Commentaire vide";
        } elseif (!preg_match($regexNotempty, $_POST['comment'])) {
            $error['comment'] = "<i class='fa-solid fa-circle-exclamation'></i> Caractère non autorisé";
        } else {
            $sql = "INSERT INTO 76_comments (com_text, post_id, user_id, com_timestamp) VALUES (:com_text, :post_id, :user_id, :com_timestamp)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':com_text', $com_text, PDO::PARAM_STR);
            $stmt->bindValue(':post_id', $post_id, PDO::PARAM_INT);
            $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindValue(':com_timestamp', time(), PDO::PARAM_STR);
            $stmt->execute();
            header('Location: controller_openpost.php?post=' . $post_id);
            exit;
        }
        return $error;
    }

    /**
     * Compte le nombre de commentaires d'un post
     * 
     * @param int $post_id
     * @return int
     */
    public static function countComment($post_id)
    {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT COUNT(*) FROM 76_comments WHERE post_id = :post_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':post_id', $post_id, PDO::PARAM_INT);
        $stmt->execute();
        $comment = $stmt->fetch(PDO::FETCH_ASSOC);
        $comment = $comment['COUNT(*)'];
        return $comment;
    }

    /**
     * Supprime un commentaire
     * 
     * @param int $com_id
     * @return void
     */
    public static function deleteComment($com_id)
    {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM 76_comments WHERE com_id = :com_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':com_id', $com_id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
