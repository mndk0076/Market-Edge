<?php
require_once '../../models/database.php';
require_once '../../models/events/Event_class.php'; 

if(isset($_POST['update'])){
    $id = $_POST['id'];

    $db = Database::getDb();
    $e = new Event();
    $event = $e->getEventByID($id, $db);

}

if(isset($_POST['updevent'])){

    $id = $_POST['eid'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $date = $_POST['event_date'];
    $location = $_POST['location'];

    $db = Database::getDb();
    $e = new Event();
    $count = $e->updateEvent($id, $title, $description, $image, 
        $date, $location, $db);

    if($count){
        header("Location: eventsAdmin.php");
    }else{
        echo "Problem Updating";
    }
}
?>


<form action="" method="post">
    <input type="hidden" name="eid" value="<?= $event->id; ?>" />
          <div id="eventForm">

            <div id="eventtitle">
            <label for="title">Event Title:</label>
            <input type="text" id="title" name="title" value=
            "<?=$event->title; ?>" /><br/>
            </div>
            <div id="eventDescription">
            <label for="description">Event Description:</label>
            <input type="text" id="description" name="description" value=
            "<?=$event->description; ?>" /><br/>
            </div>
            <div id="eventImage">
            <label for="image">Image Pathway:</label>
            <input type="text" id="image" name="image" value=
            "<?=$event->image; ?>"/><br/> <!-- is this right? -->
            </div>
            <div id="date">
            <label for="event_date">Event Date:</label>
            <input type="text" id="event_date" name="event_date" value=
            "<?=$event->event_date; ?>" /><br/>
            </div>
            <div id="loca">
            <label for="location">Event Location:</label>
            <input type="text" id="location" name="location" value=
            "<?=$event->location; ?>" /><br/>
            </div>
            <input type="submit" name="updevent" value="update event" id="submit">
          </div>
        </form>
