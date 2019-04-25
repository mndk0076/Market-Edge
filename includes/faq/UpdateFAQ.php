<?php
    require_once '../../models/database.php';
    require_once '../../models/faq/FAQ_class.php';
    require_once '../../Validation/validation.php'; 

        if(isset($_POST['update'])){
            $id = $_POST['id'];

            $db = Database::getDb();
            $updFAQ = new FAQ();
            $question = $updFAQ->getFaqById($id, $db);
            
            $username = $question->name;
            $useremail = $question->email;
            $questiontitle = $question->title;
            $questiondescription = $question->description;
        }


    $questiontitle = "";

    if(isset($_POST['updfaq'])){

        $id = $_POST['fid'];
        $username = $_POST['name'];
        $useremail = $_POST['email'];
        $questiontitle = $_POST['title'];
        $questiondescription = $_POST['description'];
        //$approval = $_POST['approve']; It was saying that it was not defined
        $approval = "0";



        if($username == ""){
            echo "Please Enter a Name";
        }elseif($useremail == "") {
            echo "Please Enter an Email";
        }elseif($questiontitle == "default") {
            echo "Please Pick a Subject";
        }elseif($questiondescription == "") {
            echo "Please Enter a Question";
        }else{
            $db = Database::getDb();
            $updFAQ = new FAQ();
            $count = $updFAQ->updateFaq($id, $username, $useremail, $questiontitle, 
            $questiondescription, $approval, $db);

            if($count){
                header("Location: faqAdmin.php");
            }
        }exit; 
    }

    ?>

<form action="" method="post">
    <input type="hidden" name="fid" value="<?= $question->id; ?>" />
    <div id="faqTheirName" class="faqInfo form-group">
        Your Name: <input type="text" class="faqInput" name="name" value="<?= $question->name; ?>" /><br/>
    </div>
    <div id="faqEmail" class="faqInfo form-group">
        Email: <input type="text" class="faqInput" name="email" value="<?= $question->email; ?>" /><br />
    </div>
    <div id="questionDiv" class="form-group">
        <label class="faqInput" for="questiontitle">Subject:</label>
        <select name="title" id="title">
                <option value="default" <?php if($question->title == 'default') echo "selected"; ?> >Choose a Subject!</option>
                <option value="portfolio" <?php if($question->title == 'portfolio') echo "selected"; ?> >Portfolio</option>
                <option value="stock" <?php if($question->title == 'stock') echo "selected"; ?> >Stock</option>
                <option value="general" <?php if($question->title == 'general') echo "selected"; ?> >General</option>
                </select><br />        
    </div>
    <div id="quesDescription" class="faqInfo form-group">
        Question: <input type="textarea" class="faqInput" name="description" value="<?= $question->description; ?>" /><br />
    </div>
    <input type="submit" name="updfaq" value="Update Question">
</form>