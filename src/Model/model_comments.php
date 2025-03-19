<?php

class Comments
{

    public static function showComments($post_id)
    {

        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT 76_users.user_id, user_pseudo, com_text, com_timestamp, com_id FROM 76_comments
        INNER JOIN 76_users
        ON 76_comments.user_id = 76_users.user_id
        WHERE post_id = :post_id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':post_id', $post_id, PDO::PARAM_INT);
        $stmt->execute();
        $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $commentaires = '';
        foreach ($comments as $value) {
            $commentaires .= "<p class='p-2 overflow-x-hidden'><span class='fw-bold fs-5'>" . $value['user_pseudo'] . "</span> <small>" . date("d/m/Y H:i", (int)$value["com_timestamp"] + 3600) . " </small>" . ($_SESSION["user_id"] == $value["user_id"] ? "<a href='?post=" . $uniquePost["user_id"] . "&?commentaire=" . $value["com_id"] . "'>Supprimer</a>" : "") . "<br>" . $value['com_text'] . "</p>";
        }

        $pdo = '';
        return $commentaires;
    }

    public static function addComment(string $com_text, int $post_id, int $user_id)
    {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $regexNotempty = "/[a-zA-Z0-9\S]+/";
        if (empty($com_text)) {
            $error['comment'] = "Commentaire vide";
        } elseif (!preg_match($regexNotempty, $_POST['comment'])) {
            $error['comment'] = "Caractère non autorisé";
        } else {
            $sql = "INSERT INTO 76_comments (com_text, post_id, user_id, com_timestamp) VALUES (:com_text, :post_id, :user_id, :com_timestamp)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':com_text', $com_text, PDO::PARAM_STR);
            $stmt->bindValue(':post_id', $post_id, PDO::PARAM_INT);
            $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindValue(':com_timestamp', time(), PDO::PARAM_STR);
            $stmt->execute();
        }
    }

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
}
