<?php


class ShowsModel extends Model
{
    public function getAllFilmShows()
    {
        $query = 'SELECT DISTINCT shows.id, movies.title, shows.date, shows.time, movies.genre, shows.id, shows.hall_id 
                FROM `shows`, `movies`
                WHERE movies.id=shows.movie_id ORDER BY shows.date';

        $stmt = $this->db->pdo->prepare($query);
        $result = $stmt->execute();
        if ($result === true)
        {
            return $showsArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function getAllReservationByShowID($id)
    {
        $query = 'SELECT users.username, reservations.id, movies.title, shows.date, shows.time, shows.hall_id, seats.seat_row, seats.seat_number
                        FROM `users`, `reservations`, `movies`, `shows`, `seats`
                        WHERE shows.id=:id AND users.id=reservations.user_id AND movies.id=shows.movie_id AND reservations.show_id=shows.id AND seats.id=reservations.seat_id';
        $stmt = $this->db->pdo->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        $result = $stmt->execute();
        if($result===true)
        {
            return $reservationsArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return;
        }
    }
}