<?php
require_once '../../model/database.php';
require_once '../../model/FAQ_class.php';

if(isset($_POST['delete'])){
    $id= $_POST['id'];
    $dbcon = Database::getDb();
    $f = new FAQ();
    $count = $f->deleteFaq($id, $dbcon);

    if($count){
        header("Location: ListFAQ.php");
    }
}
