<?php
require_once '../../models/database.php';
require_once '../../models/events/Event_class.php'; 

$dbcon = Database::getDb();
$clientEvent = new Event();
$myeve = $clientEvent->getAllEvents(Database::getDb());

//Individual Event is IndEvent
foreach($myeve as $event){
    echo 
    "<li class= 'myEvents list-group-item'>" . 
    "<div class='IndEvent'>" . 
        "<img class='eventPhoto' src='" . $event->image .  "' alt='Event Photo'/>" .
        "<h2 class='eventtitle'>$event->title </h2>" . "<br/>" . 
        "<div class='eventDescription'>" .
            "<p> $event->description </p>" .
        "</div>" .
        "<p class='eventDate'> $event->event_date </p>" .
        "<p class='location'> $event->location </p>" . 
    "</div>" .
    "</li>";
}
