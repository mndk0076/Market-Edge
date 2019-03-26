<?php
require_once '../models/database.php';
require_once '../models/FAQ_class.php';

if(isset($_POST['update'])){
    $id = $_POST['id'];

    $db = Database::getDb();
    $f = new FAQ();
    $question = $f->getFaqById($id, $db);
    //var_dump($question);
}

if(isset($_POST['updfaq'])){

    $id = $_POST['fid'];
    $username = $_POST['name'];
    $useremail = $_POST['email'];
    $questiontitle = $_POST['title'];
    $questiondescription = $_POST['description'];
    $approval = $_POST['approve'];

    $db = Database::getDb();
    $f = new FAQ();
    $count = $f->updateFaq($id, $username, $useremail, $questiontitle, 
    $questiondescription, $approval, $db);

    if($count){
        header("Location: ListFAQ.php");
    }else{
        echo "Problem Updating";
    }
     
}

?>

<form action="" method="post">
    <input type="hidden" name="fid" value="<?= $question->id; ?>" />
    Your Name: <input type="text" name="name" value="<?= $question->name; ?>" /><br/>
    Email: <input type="text" name="email" value="<?= $question->email; ?>" /><br />
   <!-- Subject: <input type="text" name="questiontitle" value="<?= $question->title; ?>" /><br /> -->
   <label for="questiontitle">Subject:</label>
   <select name="title" id="title"><!--I couldn't make the dropdownlist *******************************************************-->
        <option value="default">Choose a Subject!</option>
        <option value="portfolio">Portfolio</option>
        <option value="stock">Stock</option>
        <option value="general">General</option>
        </select><br /> 
    Question: <input type="textarea" name="description" value="<?= $question->description; ?>" /><br />
    Approval:<input type="checkbox" name="approve" value="1" />1
    <input type="checkbox" name="approve" value="0" />0 <br/>

    <input type="submit" name="updfaq" value="Update Question">
</form>