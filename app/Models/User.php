<?php

require_once __DIR__ . '/../Core/Model.php';

class User extends Model
{
    public function create($username, $email, $password)
    {
        $stmt = $this->db->prepare(
            "INSERT INTO users
            (username,email,password)
            VALUES (?,?,?)"
        );

        return $stmt->execute([
            $username,
            $email,
            $password
        ]);
    }

    public function findByEmail($email)
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM users
            WHERE email = ?"
        );

        $stmt->execute([$email]);

        return $stmt->fetch(
            PDO::FETCH_ASSOC
        );
    }

    public function count()
    {
        $stmt = $this->db->query(
            "SELECT COUNT(*) as total
            FROM users"
        );

        $result = $stmt->fetch(
            PDO::FETCH_ASSOC
        );

        return $result['total'];
    }

    public function findById($id)
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM users
            WHERE id = ?"
        );

        $stmt->execute([$id]);

        return $stmt->fetch(
            PDO::FETCH_ASSOC
        );
    }

    public function updatePassword(
        $id,
        $password
    ) {
        $stmt = $this->db->prepare(
            "UPDATE users
            SET password = ?
            WHERE id = ?"
        );

        return $stmt->execute([
            $password,
            $id
        ]);
    }
}