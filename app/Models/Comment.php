<?php

require_once __DIR__ . '/../Core/Model.php';

class Comment extends Model
{
    public function getByPostId($postId)
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM comments
            WHERE post_id = ?
            ORDER BY created_at DESC"
        );

        $stmt->execute([$postId]);

        return $stmt->fetchAll(
            PDO::FETCH_ASSOC
        );
    }

    public function create(
        $postId,
        $userId,
        $content
    ) {
        $stmt = $this->db->prepare(
            "INSERT INTO comments
            (post_id, user_id, content)
            VALUES (?, ?, ?)"
        );

        return $stmt->execute([
            $postId,
            $userId,
            $content
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare(
            "DELETE FROM comments
            WHERE id = ?"
        );

        return $stmt->execute([$id]);
    }

    public function count()
    {
        $stmt = $this->db->query(
            "SELECT COUNT(*) as total
            FROM comments"
        );

        $result = $stmt->fetch(
            PDO::FETCH_ASSOC
        );

        return $result['total'];
    }
}