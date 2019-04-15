<?php
require_once '../../models/database.php';
require_once '../../models/faq/FAQ_class.php';

    $dbcon = Database::getDb();
    $listFAQ = new FAQ();
    $myfaq = $listFAQ->getAllIncomingQuestions(Database::getDb());


foreach($myfaq as $question){
    echo 
    "<tr>" .
        "<td> $question->name </td>" .
        "<td> $question->email </td>" .
        "<td> $question->title </td>" .
        "<td> $question->description </td>" .
        "<td> $question->approve </td>" .
        "<td>" .
            "<form action='updateFAQ.php' method='post'>" . 
                "<input type='hidden' value='$question->id' name='id' />" . 
                "<input type='submit' value='Update' name='update' />" .
            "</form>" .
        "</td>" .
        "<td>" .
            "<form action='deleteFAQ.php' method='post'>" . 
                "<input type='hidden' value='$question->id' name='id' />" . 
                "<input type='submit' value='Delete' name='delete' />" . 
            "</form>" . 
        "</td>" .
        "<td>" .
            "<form action='approveFAQ.php' method='post'>" . 
                "<input type='hidden' value='$question->id' name='id' />" . 
                "<input type='submit' value='Approve' name='approval' />" . 
            "</form>" .
        "</td>" .
        "<td>" .
            "<form action='approveFAQ.php' method='post'>" . 
                "<input type='hidden' value='$question->id' name='id' />" . 
                "<input type='submit' value='Disapprove' name='disapproval' />" . 
            "</form>" .
        "</td>" .
    "</tr>";

}