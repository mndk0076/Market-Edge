<?php
    require_once '../../models/database.php';
    require_once '../../models/faq/FAQ_class.php';
    require_once '../../Validation/validation.php'; 

        if(isset($_POST['update'])){
            $id = $_POST['id'];

            $db = Database::getDb();
            $updFAQ = new FAQ();
            $question = $updFAQ->getFaqById($id, $db);
            
        }
        $nameErr = "";
        $emailErr = "";
        $titleErr = "";
        $descErr = "";
        $isValid = true;

    //$questiontitle = "";
    $username = $useremail = $questiontitle = $questiondescription = $approval = "";
    if(isset($_POST['updfaq'])){

        $id = $_POST['fid'];
        $username = $_POST['name'];
        $useremail = $_POST['email'];
        $questiontitle = $_POST['title'];
        $questiondescription = $_POST['description'];
        //$approval = $_POST['approve']; It was saying that it was not defined
        $approval = "0";

        if(checkEmpty($username)){
            $nameErr = " Please Enter A Name";
            $isValid = false;
        }
        if(checkEmpty($useremail)){
            $emailErr = " Please Enter A Email";
            $isValid = false;
        }
        if(checkDropDown($questiontitle,"default")){
            $titleErr = "Please Select a Value";
            $isValid = false;
        }
        if(checkEmpty($questiondescription)){
            $descErr = " Please Enter A Question";
            $isValid = false;
        }

        if($isValid === true){

            $db = Database::getDb();
            $updFAQ = new FAQ();
            $count = $updFAQ->updateFaq($id, $username, $useremail, $questiontitle, 
            $questiondescription, $approval, $db);

            if($count){
                header("Location: faqAdmin.php");
            }
        } 
    }

    ?>

<form action="" method="post">
    <input type="hidden" name="fid" value="<?= $question->id; ?>" />
    <div id="faqTheirName" class="faqInfo form-group">
        Your Name: <input type="text" class="faqInput" name="name" value="<?= $question->name; ?>" /><br/>
        <span id="nameErr" style="color:red;">
            <?php
                if(isset($nameErr)) {
                    echo $nameErr;
                            }
            ?>
        </span>
    </div>
    <div id="faqEmail" class="faqInfo form-group">
        Email: <input type="text" class="faqInput" name="email" value="<?= $question->email; ?>" /><br />
        <span id="emailErr" style="color:red;">
            <?php
                if(isset($emailErr)) {
                    echo $emailErr;
                            }
            ?>
        </span>
    </div>
    <div id="questionDiv" class="form-group">
        <label class="faqInput" for="questiontitle">Subject:</label>
        <select name="title" id="title">
                <option value="default" <?php if($question->title == 'default') echo "selected"; ?> >Choose a Subject!</option>
                <option value="portfolio" <?php if($question->title == 'portfolio') echo "selected"; ?> >Portfolio</option>
                <option value="stock" <?php if($question->title == 'stock') echo "selected"; ?> >Stock</option>
                <option value="general" <?php if($question->title == 'general') echo "selected"; ?> >General</option>
                </select><br /> 
                <span id="titleErr" style="color:red;">
                    <?php
                        if(isset( $titleErr)) {
                            echo  $titleErr;
                                    }
                    ?>
                </span>        
    </div>
    <div id="quesDescription" class="faqInfo form-group">
        Question: <input type="textarea" class="faqInput" name="description" value="<?= $question->description; ?>" /><br />
        <span id="descErr" style="color:red;">
            <?php
                if(isset( $descErr)) {
                    echo  $descErr;
                            }
            ?>
        </span>
    </div>
    <input type="submit" name="updfaq" value="Update Question">
</form>