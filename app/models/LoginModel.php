<?php


class LoginModel extends Model
{
    public function tryToLogIn($username, $password, $secretKey)
    {
        $query = $this->db->pdo->prepare('SELECT `id`, `username`, `verified`, `is_admin`, `banned`, `email` 
                                                                FROM `users`
                                                                WHERE `username`=:username AND `password`=:password');
        $query->bindValue(':username', $username, PDO::PARAM_STR);
        $query->bindValue(':password', md5($password . $secretKey), PDO::PARAM_STR);
        $query->execute();
        if ($arrayResult = $query->fetch())
            return $arrayResult;
        return false;
    }
}