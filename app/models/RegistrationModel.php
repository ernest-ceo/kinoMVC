<?php


class RegistrationModel extends Model
{

    public function verifyAccount($vkey)
    {
        if($this->checkIfVerificationKeyExists($vkey))
        {
            $query = $this->db->pdo->prepare('UPDATE `users` 
                                                SET `verified`=1
                                                WHERE `vkey`=:vkey');
            $query->bindValue(':vkey', $vkey, PDO::PARAM_STR);
            return (bool)($query->execute());
        }
    }

    private function checkIfVerificationKeyExists($vkey)
    {
        $query = 'SELECT * 
                    FROM `users` 
                    WHERE `vkey`=:vkey';
        $stmt = $this->db->pdo->prepare($query);
        $stmt->bindValue(':vkey', $vkey, PDO::PARAM_STR);
        $result = $stmt->execute();
        if($result)
        {
            return (bool)$result = $stmt->fetch();
        }
        return false;
    }

    public function userExists($username)
    {
        $query = $this->db->pdo->prepare('SELECT * FROM `users`
                                                            WHERE `username`=:username');
        $query->bindValue(':username', $username, PDO::PARAM_STR);
        $query->execute();
        return (bool)($query->fetch());
    }

    public function emailTaken($email)
    {
        $query = $this->db->pdo->prepare('SELECT * FROM `users`
                                                                WHERE `email`=:email');
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->execute();
        return (bool)($query->fetch());
    }

    public function addNewUser($username, $password, string $secretKey, $email, string $vkey)
    {
        $query = $this->db->pdo->prepare('INSERT INTO `users` (username, password, email, vkey, verified) VALUES (:username, :password, :email, :vkey, 0)');
        $query->bindValue(':username', $username, PDO::PARAM_STR);
        $query->bindValue(':password', md5($password . $secretKey), PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':vkey', $vkey, PDO::PARAM_STR);
        return (bool)($query->execute());
    }
}