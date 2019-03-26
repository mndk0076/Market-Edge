<?php
require_once '../models/database.php';
require_once '../models/FAQ_class.php';

$dbcon = Database::getDb();
$f = new FAQ();
$myfaq = $f->listApproval(Database::getDb());

//var_dump($myfaq);

foreach($myfaq as $question){
    echo "<div class='displayedFAQ'>" . 
    "<li class= 'myQuestions'>" . 
    "<h2>$question->title </h2>" . "<br/>" . 
    "<p> $question->description </p>" . 
    "</li>" .
    "</div>";
}//->field name