<?php


class UsersModel extends Model
{

    public function getAllUsersForAdmin()
    {
        $query = 'SELECT `id`, `username`, `email`, `banned`
                        FROM `users`
                        WHERE `is_admin`=0';
        $stmt=$this->db->pdo->prepare($query);
        $result=$stmt->execute();
        if($result===true)
        {
            $usersArray=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $usersArray;
        }
        else
        {
            return;
        }
    }

    public function banUser($id)
    {
        $query = 'UPDATE `users`
                        SET `banned`= 1
                        WHERE `id`=:id';
        $stmt=$this->db->pdo->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->closeCursor();
    }

    public function unbanUser($id)
    {
        $query = 'UPDATE `users`
                        SET `banned`= 0
                        WHERE `id`=:id';
        $stmt=$this->db->pdo->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->closeCursor();
    }

    public function getAllReservationsByUserID($id)
    {
        $query = 'SELECT reservations_history.id, users.username, users.email, users.banned, movies.title, shows.date, shows.time, halls.id as hall_id, seats.seat_row, seats.seat_number
                        FROM `reservations`, `reservations_history`, `users`, `movies`, `shows`, `halls`, `seats`
                        WHERE users.id=:id AND reservations.user_id=users.id AND movies.id=shows.movie_id 
                        AND reservations.show_id=shows.id AND reservations.seat_id=seats.id AND reservations.hall_id=halls.id
                        AND reservations_history.show_id = shows.id AND reservations_history.user_id = users.id
                        AND reservations_history.hall_id = halls.id AND reservations_history.seat_id = seats.id';
        $stmt = $this->db->pdo->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $result = $stmt->execute();
        if($result===true)
        {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        else
        {
            return ;
        }
    }
}