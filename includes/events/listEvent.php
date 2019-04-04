<?php
require_once '../../models/database.php';
require_once '../../models/events/event_class.php'; 

$dbcon = Database::getDb();
$e = new Event();
$myeve = $e->getAllEvents(Database::getDb());


//for the admin page 
foreach($myeve as $event){
    echo "<li class= 'myEvent'>" . 
    $event->title . "<br/>" .
    $event->description . "<br/>" .
    "<img class='eventPhoto' src='" . $event->image .  "' alt='Event Photo'/>"  . "<br/>" .
    $event->event_date . "<br/>" .
    $event->location . "<br/>" .
    "<form action='updateEvent.php' Method='post'>" . 
    "<input type='hidden' value='$event->id' name='id' />" . 
    "<input type='submit' value='Update' name='update' />" .
    "</form>" .
    "<form action='deleteEvent.php' method='post'>" . 
    "<input type='hidden' value='$event->id' name='id' />" . 
    "<input type='submit' value='Delete' name='delete' />" . 
    "</form>" .
   "</li>";
}