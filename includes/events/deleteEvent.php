<?php
require_once '../../models/database.php';
require_once '../../models/events/event_class.php'; 
  

if(isset($_POST['delete'])){
    $id = $_POST['id'];
    
    $db = Database::getDb();
    $s = new Event();
    $count = $s->deleteEvent($id, $db);

    if($count){
        header("Location: listEvent.php");
    }
}