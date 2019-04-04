<?php

class Event
{


    public function getEventByID($id, $db){
        //for update
        $sql = "SELECT * FROM events where id = :id";
        $pdost = $db->prepare($sql); 
        $pdost->bindParam(':id', $id);

        $pdost->execute();

        $event = $pdost->fetch(PDO::FETCH_OBJ);
        return $event;
    }

    public function getAllEvents($dbcon){

        $sql = "SELECT * FROM events";

        $pdost = $dbcon->prepare($sql);
        $pdost->execute();
        $events = $pdost->fetchAll(PDO::FETCH_OBJ);

        return $events;
    }

    public function addEvent($title, $description, $image, $date, $location, $db){

        $sql = "INSERT INTO events (title, description, image, event_date, location)
                    VALUES(:title, :description, :image, :event_date, :location)";
        $pdost = $db->prepare($sql);
        $pdost->bindParam(':title', $title);
        $pdost->bindParam(':description', $description);
        $pdost->bindParam(':image', $image);
        $pdost->bindParam(':event_date', $date);
        $pdost->bindParam(':location', $location);

        $count = $pdost->execute();
        return $count;
    }

    public function deleteEvent($id, $db){
        $sql = "DELETE FROM events  WHERE id = :id";
        $pdost = $db->prepare($sql);
        $pdost->bindParam(':id', $id);
        $count = $pdost->execute();
        return $count;
    }

    public function updateEvent($id, $title, $description, $image, $date, $location, $db){
        $sql = "UPDATE events SET title = :title, description = :description,
         image =  :image, event_date = :event_date, location = :location WHERE id = :id"; 

         $pdost = $db->prepare($sql);
         $pdost->bindParam(':id', $id);
         $pdost->bindParam(':title', $title);
         $pdost->bindParam(':description', $description);
         $pdost->bindParam(':image', $image);
         $pdost->bindParam(':event_date', $date);
         $pdost->bindParam(':location', $location);

         $count = $pdost->execute();

         return $count;
    }
}