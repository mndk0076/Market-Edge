<?php
require_once '../../config_test.php';
require_once 'database.php';
require_once '../../userSession.php';

class Portfolio{    
    public function getPortfolio($dbcon, $userid){   
        $sql = "SELECT * FROM PORTFOLIO WHERE USER_ID = ". $userid;
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();

        return $pdostm->fetchAll(PDO::FETCH_OBJ);
    }
    public function addTicker($dbcon, $ticker, $company, $shares, $price, $userid){
        $sql = "INSERT INTO Portfolio (ticker, company, shares, price, user_id) values (:ticker, :company, :shares, :price, :userid)";
    
        $pdostm = $dbcon->prepare($sql);
        $pdostm->bindParam(':ticker', $ticker);
        $pdostm->bindParam(':company', $company);
        $pdostm->bindParam(':shares', $shares);
        $pdostm->bindParam(':price', $price);
        $pdostm->bindParam(':userid', $userid);
        $count = $pdostm->execute();
    }
    public function editTicker($dbcon, $id, $ticker, $company, $shares, $price, $user_id){
        $sql = "UPDATE PORTFOLIO
        SET ticker = :ticker, company = :company, shares = :shares, price = :price, user_id = :user_id
        WHERE id = :id";
                
        $pdostm = $dbcon->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $pdostm->bindParam(':ticker', $ticker);
        $pdostm->bindParam(':company', $company);
        $pdostm->bindParam(':shares', $shares);
        $pdostm->bindParam(':price', $price);
        $pdostm->bindParam(':user_id', $user_id);
        $count = $pdostm->execute();
        
        return $count;
    }
    public function deleteTicker($dbcon, $id){
        $sql = "DELETE FROM PORTFOLIO WHERE id= :id";
                
        $pdostm = $dbcon->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $count = $pdostm->execute();
        
        return $count;
    }
}   