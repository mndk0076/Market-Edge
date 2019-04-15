<?php
require_once '../../models/database.php';
require_once '../../models/events/Event_class.php';

if(isset($_POST['addevent'])){

    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $date = $_POST['event_date'];
    $location = $_POST['location'];

    $db = Database::getDb();

    $addEvent = new Event();
    $count = $addEvent->addEvent($title, $description, $image, $date, $location, $db);

    if($count){
        echo "Added Event";
    }else{
        echo "Problem Adding Event";
    }

}

?>

<form action="" method="post">
  <div id="eventForm">

    <div id="eventtitle">
      <label for="title">Event Title:</label>
      <input type="text" id="title" name="title" /><br/>
    </div>
    <div id="eventDescription">
      <label for="description">Event Description:</label>
      <input type="text" id="description" name="description" /><br/>
    </div>
    <div id="eventImage">
      <label for="image">Image Pathway:</label>
      <input type="text" id="image" name="image" /><br/>
    </div>
    <div id="date">
      <label for="event_date">Event Date:</label>
      <input type="text" id="event_date" name="event_date" /><br/>
    </div>
    <div id="loca">
      <label for="location">Event Location:</label>
      <input type="text" id="location" name="location" /><br/>
    </div>
      <input type="submit" name="addevent" value="Add Event" id="submit">
  </div>
</form>
