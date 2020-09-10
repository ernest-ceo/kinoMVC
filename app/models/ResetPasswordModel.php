<?php


class ResetPasswordModel extends Model
{
    protected function checkIfEmailAddressExists($email)
    {
        $query = $this->db->pdo->prepare('SELECT * FROM `users`
                                                            WHERE `email`=:email');
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->execute();
        return (bool)($query->fetch());
    }
}