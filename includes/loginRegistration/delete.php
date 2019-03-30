<?php
require_once 'database.php';
require_once 'user.php';


if(isset($_POST['delete'])){
    $id= $_POST['id'];
    $dbcon = Database::getDb();
    $u = new User();
    $count = $u->deleteUser($id, $dbcon);
    if($count){
        header("Location: users.php");
    }
}