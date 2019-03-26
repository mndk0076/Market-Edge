<?php
require_once '../models/database.php';
require_once '../models/FAQ_class.php';

$dbcon = Database::getDb();
$f = new FAQ();
$myfaq = $f->getAllIncomingQuestions(Database::getDb());


foreach($myfaq as $question){
    echo "<li class= 'myQuestions'>" . 
    $question->name . "<br/>" . 
    $question->email . "<br/>" .
    $question->title . "<br/>" . 
    $question->description . "<br/>" .
    $question->approve .
    "<form action='UpdateFAQ.php' Method='post'>" . 
    "<input type='hidden' value='$question->id' name='id' />" . 
    "<input type='submit' value='Update' name='update' />" .
    "</form>" .
    "<form action='DeleteFAQ.php' method='post'>" . 
    "<input type='hidden' value='$question->id' name='id' />" . 
    "<input type='submit' value='Delete' name='delete' />" . 
    "</form>" . 
    "</li>";
}