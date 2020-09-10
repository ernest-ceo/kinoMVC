<?php


class AccountModel extends Model
{
    public function loadUserReservationList($userID)
    {
        $query = 'SELECT reservations.id, movies.title, shows.date, shows.time, shows.hall_id, seats.seat_row, seats.seat_number
                        FROM `users`, `reservations`, `movies`, `shows`, `seats`
                        WHERE users.id=:id AND users.id=reservations.user_id AND movies.id=shows.movie_id AND reservations.show_id=shows.id AND seats.id=reservations.seat_id';
        $stmt = $this->db->pdo->prepare($query);
        $stmt->bindValue(':id', $userID, PDO::PARAM_INT);
        $result = $stmt->execute();
        if($result===true)
        {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return;
        }
    }

    public function cancelReservation($reservationID)
    {
        $query = 'DELETE FROM `reservations`
                        WHERE `id`=:id';
        $stmt = $this->db->pdo->prepare($query);
        $stmt->bindValue(':id', $reservationID, PDO::PARAM_INT);
        $result = $stmt->execute();
        return (bool)($result);
    }

    public function deleteAccount($username)
    {
        $this->cancelAllReservations();
        $query=$this->db->pdo->prepare('DELETE FROM `users`
                                                        WHERE `username`=:username');
        $query->bindValue(':username', $username, PDO::PARAM_STR);
        return $result = $query->execute();
    }

    private function cancelAllReservations()
    {
        $query = 'DELETE FROM `reservations`
                    WHERE `user_id`=:user_id';
        $stmt = $this->db->pdo->prepare($query);
        $stmt->bindValue('user_id', $_SESSION['user_id'], PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
    }
}