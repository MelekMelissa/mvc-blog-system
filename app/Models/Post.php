<?php

require_once __DIR__ . '/../Core/Model.php';

class Post extends Model
{
    public function getAll()
    {
        $stmt = $this->db->query(
            "SELECT
                posts.*,
                categories.name AS category_name
            FROM posts
            LEFT JOIN categories
                ON posts.category_id = categories.id
            WHERE posts.status = 'published'
            ORDER BY posts.created_at DESC"
        );

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPaginated(
        $limit,
        $offset
    ) {
        $stmt = $this->db->prepare(
            "SELECT
                posts.*,
                categories.name AS category_name
            FROM posts
            LEFT JOIN categories
                ON posts.category_id = categories.id
            WHERE posts.status = 'published'
            ORDER BY posts.created_at DESC
            LIMIT ? OFFSET ?"
        );

        $stmt->bindValue(
            1,
            (int)$limit,
            PDO::PARAM_INT
        );

        $stmt->bindValue(
            2,
            (int)$offset,
            PDO::PARAM_INT
        );

        $stmt->execute();

        return $stmt->fetchAll(
            PDO::FETCH_ASSOC
        );
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM posts
            WHERE id = ?"
        );

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(
        $title,
        $slug,
        $content,
        $userId,
        $categoryId,
        $status
    ) {
        $stmt = $this->db->prepare(
            "INSERT INTO posts
            (
                title,
                slug,
                content,
                user_id,
                category_id,
                status
            )
            VALUES (?, ?, ?, ?, ?, ?)"
        );

        return $stmt->execute([
            $title,
            $slug,
            $content,
            $userId,
            $categoryId,
            $status
        ]);
    }

    public function update(
        $id,
        $title,
        $slug,
        $content
    ) {
        $stmt = $this->db->prepare(
            "UPDATE posts
            SET title = ?,
                slug = ?,
                content = ?
            WHERE id = ?"
        );

        return $stmt->execute([
            $title,
            $slug,
            $content,
            $id
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare(
            "DELETE FROM posts
            WHERE id = ?"
        );

        return $stmt->execute([$id]);
    }

    public function search($keyword)
    {
        $stmt = $this->db->prepare(
            "SELECT
                posts.*,
                categories.name AS category_name
            FROM posts
            LEFT JOIN categories
                ON posts.category_id = categories.id
            WHERE posts.status = 'published'
            AND (
                posts.title LIKE ?
                OR posts.content LIKE ?
            )
            ORDER BY posts.created_at DESC"
        );

        $search = '%' . $keyword . '%';

        $stmt->execute([
            $search,
            $search
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
public function count()
{
    $stmt = $this->db->query(
        "SELECT COUNT(*) AS total
        FROM posts
        WHERE status = 'published'"
    );

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['total'];
}

public function slugExists($slug)
{
    $stmt = $this->db->prepare(
        "SELECT id FROM posts
        WHERE slug = ?"
    );

    $stmt->execute([$slug]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

}