<?php


class ResetPasswordModel extends Model
{
    public function checkIfEmailAddressExists($email)
    {
        $query = $this->db->pdo->prepare('SELECT * FROM `users`
                                                            WHERE `email`=:email');
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->execute();
        return (bool)($query->fetch());
    }

    public function updateVerificationKey($vkey, $email)
    {
        $query=$this->db->pdo->prepare('UPDATE `users`
                                                            SET `vkey`=:vkey
                                                            WHERE `email`=:email');
        $query->bindValue(':vkey', $vkey, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        return (bool)($query->execute());
    }

    public function emailAddressExists($email)
    {
        $query = $this->db->pdo->prepare('SELECT * FROM `users`
                                                            WHERE `email`=:email');
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->execute();
        return (bool)($query->fetch());
    }

    public function setNewPassword(string $password, string $vkey, string $secretKey)
    {
        $query=$this->db->pdo->prepare('UPDATE `users`
                                                                SET `password`=:password
                                                                WHERE `vkey`=:vkey');
        $query->bindValue(':password', md5($password.$secretKey), PDO::PARAM_STR);
        $query->bindValue(':vkey', $vkey, PDO::PARAM_STR);
        return (bool) ($query->execute());
    }
}