<?php
require_once '../../models/database.php';
require_once '../../models/events/Event_class.php'; 
  

if(isset($_POST['delete'])){
    $id = $_POST['id'];
    
    $db = Database::getDb();
    $delEvent = new Event();
    $count = $delEvent->deleteEvent($id, $db);

    if($count){
        header("Location: eventsAdmin.php");
    }
}
