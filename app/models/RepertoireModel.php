<?php

//namespace app\models;
//use Model;

class RepertoireModel extends Model
{
    public function getFilmShowsByRange($range)
    {
        switch ($range)
        {
            case "day":
                $query = 'SELECT DISTINCT shows.id, movies.title, shows.date, shows.time, movies.genre, shows.id, shows.hall_id 
                        FROM `shows`, `movies`
                        WHERE movies.id=shows.movie_id AND `date`=CURRENT_DATE() ORDER BY shows.date';
                break;
            case "week":
                $date=date_create(date("Y-m-d"));
                $rangeDate = date_add($date,date_interval_create_from_date_string("7 days"));
                $stringRangeDate = date_format($rangeDate, "Y-m-d");
                $query = "SELECT DISTINCT shows.id, movies.title, shows.date, shows.time, movies.genre, shows.id, shows.hall_id 
                            FROM `shows`, `movies`
                            WHERE movies.id=shows.movie_id AND `date` BETWEEN CURRENT_DATE() AND '$stringRangeDate' ORDER BY shows.date";
                break;
            case "month":
                $date=date_create(date("Y-m-d"));
                $rangeDate = date_add($date,date_interval_create_from_date_string("30 days"));
                $stringRangeDate = date_format($rangeDate, "Y-m-d");

                $query = "SELECT DISTINCT shows.id, movies.title, shows.date, shows.time, movies.genre, shows.id, shows.hall_id 
                        FROM `shows`, `movies`
                        WHERE movies.id=shows.movie_id AND `date` BETWEEN CURRENT_DATE() AND '$stringRangeDate' ORDER BY shows.date";
                break;
            default:
                $query = 'SELECT DISTINCT shows.id, movies.title, shows.date, shows.time, movies.genre, shows.id, shows.hall_id 
                        FROM `shows`, `movies`
                        WHERE movies.id=shows.movie_id ORDER BY shows.date';
                break;
        }
        $stmt = $this->db->pdo->prepare($query);
        $result = $stmt->execute();
        if ($result === true)
        {
            if(!$showsArray = $stmt->fetchAll(PDO::FETCH_ASSOC))
                return false;
            else
                return $showsArray;
        }
    }
}