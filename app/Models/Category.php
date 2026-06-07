<?php

require_once __DIR__ . '/../Core/Model.php';

class Category extends Model
{
    public function getAll()
    {
        $stmt = $this->db->query(
            "SELECT * FROM categories
            ORDER BY name ASC"
        );

        return $stmt->fetchAll(
            PDO::FETCH_ASSOC
        );
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM categories
            WHERE id = ?"
        );

        $stmt->execute([$id]);

        return $stmt->fetch(
            PDO::FETCH_ASSOC
        );
    }

    public function create($name, $slug)
    {
        $stmt = $this->db->prepare(
            "INSERT INTO categories
            (name, slug)
            VALUES (?, ?)"
        );

        return $stmt->execute([
            $name,
            $slug
        ]);
    }

    public function update(
        $id,
        $name,
        $slug
    ) {
        $stmt = $this->db->prepare(
            "UPDATE categories
            SET name = ?,
                slug = ?
            WHERE id = ?"
        );

        return $stmt->execute([
            $name,
            $slug,
            $id
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare(
            "DELETE FROM categories
            WHERE id = ?"
        );

        return $stmt->execute([$id]);
    }

    public function count()
    {
        $stmt = $this->db->query(
            "SELECT COUNT(*) as total
            FROM categories"
        );

        $result = $stmt->fetch(
            PDO::FETCH_ASSOC
        );

        return $result['total'];
    }
}