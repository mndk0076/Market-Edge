<?php
require_once '../../models/database.php';
require_once '../../models/events/Event_class.php'; 

$dbcon = Database::getDb();
$clientEvent = new Event();
$myeve = $clientEvent->getAllEvents(Database::getDb());

//Individual Event is IndEvent
foreach($myeve as $event){
    echo 
    "<li class= 'myEvents'>" . 
    "<div class='IndEvent'>" . 
        "<img class='eventPhoto' src='" . $event->image .  "' alt='Event Photo'/>" .
        "<h2>$event->title </h2>" . "<br/>" . 
        "<div class='eventDescription'>" .
            "<p> $event->description </p>" .
        "</div>" .
        "<p> $event->event_date </p>" .
        "<p> $event->location </p>" . 
    "</div>" .
    "</li>";
}
