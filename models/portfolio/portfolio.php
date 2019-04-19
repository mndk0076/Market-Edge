<?php
    require_once '../../config_test.php';
    require_once 'database.php';

class Portfolio{
    public function getPortfolio($dbcon){        
        $sql = "SELECT * FROM PORTFOLIO";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();

        return $pdostm->fetchAll(PDO::FETCH_OBJ);
    }
    public function addTicker($dbcon, $ticker, $company, $shares, $price){
        $sql = "INSERT INTO Portfolio (ticker, company, shares, price, user_id) values (:ticker, :company, :shares, :price, 1)";
        //$sql = "INSERT INTO Portfolio (ticker, company, shares, entry, user_id) values (test, test, 1, 1, 1)";
    
        $pdostm = $dbcon->prepare($sql);
        $pdostm->bindParam(':ticker', $ticker);
        $pdostm->bindParam(':company', $company);
        $pdostm->bindParam(':shares', $shares);
        $pdostm->bindParam(':price', $price);
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