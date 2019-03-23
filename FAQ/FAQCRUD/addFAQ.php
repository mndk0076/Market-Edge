<?php
require_once '../model/database.php';
require_once '../model/FAQ_class.php';

    if(isset($_POST['addfaq'])){

       
        $username = $_POST['name'];
        $useremail = $_POST['email'];
        $questiontitle = $_POST['title'];
        $questiondescription = $_POST['description'];
        $approval = $_POST['approve'];

        
      
        $db = Database::getDb();
        $f = new FAQ();
        $c = $f->addFaq($username, $useremail, 
        $questiontitle, $questiondescription, $db);

        if($c){
            echo "Your Question is Under Review";
        }else{
            echo "Problem Adding Question";
        }

    }

?>

<form action="" method="post">
<div id="theirName" class="faqInfo">
    Your Name: <input type="text" name="name" /><br/>
    <span id="nameErr"></span>
</div>
<div id="faqEmail" class="faqInfo">
    Email: <input type="text" name="email" /><br />
    <span id="emailErr"></span>
</div>
<div id="questionDiv">
   <!-- Subject: <input type="text" name="questiontitle" />-->
   <label for="title">Subject:</label>
        <select name="title" id="title">
        <option value="default">Choose a Subject!</option>
        <option value="portfolio">Portfolio</option>
        <option value="stock">Stock</option>
        <option value="general">General</option>
        </select><br /> 
        <span id="titleErr"></span> 
</div>
<div id="quesDescription" class="faqInfo">
    Question: <input type="textarea" name="description" /><br />
    <span id="descErr"></span> 
</div>

    <input type="hidden" name="approve" value="0" >
    <input type="submit" name="addfaq" value="Add Question">
    
</form>