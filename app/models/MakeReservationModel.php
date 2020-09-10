<?php


class MakeReservationModel extends Model
{
    public function getUntakenSeats($showID)
    {
        $query = 'SELECT seats.id, seats.seat_row, seats.seat_number
                    FROM `seats`
                    WHERE seats.hall_id = (SELECT shows.hall_id 
                                            FROM `shows` 
                                            WHERE shows.id = :showID)
                    AND seats.id NOT IN (SELECT seats.id 
                                            FROM `seats` JOIN `reservations` ON seats.id = reservations.seat_id 
                                            WHERE seats.hall_id = (SELECT shows.hall_id 
                                                                    FROM `shows` 
                                                                    WHERE shows.id = :showID2)
                    AND reservations.show_id = :showID3)';
        $stmt = $this->db->pdo->prepare($query);
        $stmt->bindValue(':showID', $showID, PDO::PARAM_STR);
        $stmt->bindValue(':showID2', $showID, PDO::PARAM_STR);
        $stmt->bindValue(':showID3', $showID, PDO::PARAM_STR);
        $result = $stmt->execute();
        if ($result === true) {
            return $untakenSeatsArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return;
        }
    }

    public function bookASeat($seatID, $showID, $username, string $resvkey)
    {
        $query = 'INSERT INTO `reservations` (`show_id`, `user_id`, `hall_id`, `seat_id`, `vkey`)
            VALUES (:showID, 
            (SELECT users.id AS `user_id` FROM `users` WHERE users.username=:username), 
            (SELECT shows.hall_id FROM `shows` WHERE shows.id=:showID2), 
            :seatID, :resvkey)';
        $stmt = $this->db->pdo->prepare($query);
        $stmt->bindValue(':seatID', $seatID, PDO::PARAM_INT);
        $stmt->bindValue(':showID', $showID, PDO::PARAM_INT);
        $stmt->bindValue(':showID2', $showID, PDO::PARAM_INT);
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->bindValue(':resvkey', $resvkey, PDO::PARAM_STR);
        $stmt->execute();
        return (bool)$stmt->closeCursor();
    }

    public function insertReservationItemToReservationsHistory($seatID, $showID, $username)
    {
        $query = 'INSERT INTO `reservations_history` (`show_id`, `user_id`, `hall_id`, `seat_id`)
                VALUES (:showID1, 
                (SELECT users.id AS `user_id` FROM `users` WHERE users.username=:username), 
                (SELECT shows.hall_id FROM `shows` WHERE shows.id=:showID2), 
                :seatID)';
        $stmt = $this->db->pdo->prepare($query);
        $stmt->bindValue(':seatID', $seatID, PDO::PARAM_INT);
        $stmt->bindValue(':showID1', $showID, PDO::PARAM_INT);
        $stmt->bindValue(':showID2', $showID, PDO::PARAM_INT);
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        return (bool)$stmt->execute();
    }
}