<?php
require_once '../../models/database.php';
require_once '../../models/faq/FAQ_class.php';

    if(isset($_POST['update'])){
        $id = $_POST['id'];

        $db = Database::getDb();
        $updFAQ = new FAQ();
        $question = $updFAQ->getFaqById($id, $db);
        
    }

    $questiontitle = "";
    if(isset($_POST['updfaq'])){

        $id = $_POST['fid'];
        $username = $_POST['name'];
        $useremail = $_POST['email'];
        $questiontitle = $_POST['title'];
        $questiondescription = $_POST['description'];
        $approval = $_POST['approve'];;

        $db = Database::getDb();
        $updFAQ = new FAQ();
        $count = $updFAQ->updateFaq($id, $username, $useremail, $questiontitle, 
        $questiondescription, $approval, $db);

        if($count){
            header("Location: faqAdmin.php");
        }else{
            echo "Problem Updating";
        }
        
    }

    ?>

<form action="" method="post">
    <input type="hidden" name="fid" value="<?= $question->id; ?>" />
    Your Name: <input type="text" class="faqInput" name="name" value="<?= $question->name; ?>" /><br/>
    Email: <input type="text" class="faqInput" name="email" value="<?= $question->email; ?>" /><br />
<label class="faqInput" for="questiontitle">Subject:</label>
<select name="title" id="title">
        <option value="default" <?php if($question->title == 'default') echo "selected"; ?> >Choose a Subject!</option>
        <option value="portfolio" <?php if($question->title == 'portfolio') echo "selected"; ?> >Portfolio</option>
        <option value="stock" <?php if($question->title == 'stock') echo "selected"; ?> >Stock</option>
        <option value="general" <?php if($question->title == 'general') echo "selected"; ?> >General</option>
        </select><br /> 
    Question: <input type="textarea" class="faqInput" name="description" value="<?= $question->description; ?>" /><br />

    <input type="submit" name="updfaq" value="Update Question">
</form>