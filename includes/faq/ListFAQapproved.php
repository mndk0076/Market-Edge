<?php
require_once '../../models/database.php';
require_once '../../models/faq/FAQ_class.php';

$dbcon = Database::getDb();
$listAppFAQ = new FAQ();
$myfaq = $listAppFAQ->listApproval(Database::getDb());

foreach($myfaq as $question){
    echo "<div class='displayedFAQ'>" . 
    "<li class='myQuestions list-group-item'>" . 
    "<h2>$question->title </h2>" . "<br/>" . 
    "<p> $question->description </p>" . 
    "<p> $question->response </p>" .
    "</li>" .
    "</div>";
}