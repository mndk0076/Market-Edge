<?php
require_once '../../models/database.php';
require_once '../../models/faq/FAQ_class.php';

if(isset($_POST['delete'])){
    $id= $_POST['id'];
    $dbcon = Database::getDb();
    $f = new FAQ();
    $count = $f->deleteFaq($id, $dbcon);

    if($count){
        header("Location: ListFAQ.php");
    }
}
