<?php

class FAQ
{
    public function listApproval($dbcon){  //true = 1 false= 0
        
        $sql = "SELECT * FROM faq WHERE approve = '1'";
        $pdost = $dbcon->prepare($sql);
        $pdost->execute();

        $question = $pdost->fetchAll(PDO::FETCH_OBJ);
        return $question;
    }

    public function getFaqById($id, $db){ //For Update FAQ

        $sql = "SELECT * FROM faq WHERE id = :id";
        $pdost = $db->prepare($sql);
        $pdost->bindParam(':id', $id);
        $pdost->execute();

        $question = $pdost->fetch(PDO::FETCH_OBJ);
        return $question;
    }

    public function getAllIncomingQuestions($dbcon){

        $sql = "SELECT * FROM faq"; 
        $pdost = $dbcon->prepare($sql);
        $pdost->execute();

        $questions = $pdost->fetchAll(PDO::FETCH_OBJ);
        return $questions;
    }
    //For adding an FAQ submission 
    public function addFaq($username, $useremail, $questiontitle, $questiondescription, $approval, $db){

        $sql = "INSERT INTO faq (name, email, title, description, approve)
            VALUES(:name, :email, :title, :description, :approve)";
        $pdost = $db->prepare($sql);
        $pdost->bindParam(':name', $username);
        $pdost->bindParam(':email', $useremail);
        $pdost->bindParam(':title', $questiontitle);
        $pdost->bindParam(':description', $questiondescription);
        $pdost->bindParam(':approve', $approval);

        $count = $pdost->execute();
        return $count;
    }

    public function deleteFaq($id, $db){

        $sql = "DELETE FROM faq WHERE id = :id";
        $pdost = $db->prepare($sql);
        $pdost->bindParam(':id', $id);

        $count = $pdost->execute();
        return $count; 
    }

    public function updateFaq($id, $username,
     $useremail, $questiontitle, $questiondescription, $approval, $db){

        $sql = "UPDATE faq 
            SET name = :name, email = :email, title = :title, 
            description = :description, approve = :approve 
            where id = :id";
        $pdost = $db->prepare($sql);
        $pdost->bindParam(':id', $id);
        $pdost->bindParam(':name', $username);
        $pdost->bindParam(':email', $useremail);
        $pdost->bindParam(':title', $questiontitle);
        $pdost->bindParam(':description', $questiondescription);
        $pdost->bindParam(':approve', $approval);

        $count = $pdost->execute();
        return $count;
     }
     public function approveFAQ($approval, $id, $db){
        $sql = "UPDATE faq 
            SET approve = :approve where id = :id";
        $pdost = $db->prepare($sql);
        $pdost->bindParam(':id', $id);
        $pdost->bindparam(':approve', $approval);

        $count = $pdost->execute();
        return $count;
     }

}   //End of the class