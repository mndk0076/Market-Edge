<?php
    require_once '../../config.php';
    require_once   $modelspath . "database.php";

class Watchlist{
    public function getwatchlist($dbcon){        
        $sql = "SELECT * FROM watchlist";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();

        return $pdostm->fetchAll(PDO::FETCH_OBJ);
    }
    public function addTicker($dbcon, $ticker, $company,$user_id){
        $sql = "INSERT INTO watchlist (ticker, company, user_id) values (:ticker, :company, :user_id)";
        //$sql = "INSERT INTO Portfolio (ticker, company, shares, entry, user_id) values (test, test, 1, 1, 1)";
    
        $pdostm = $dbcon->prepare($sql);
        $pdostm->bindParam(':ticker', $ticker);
        $pdostm->bindParam(':company', $company);
        $pdostm->bindParam(':user_id', $user_id);
        $count = $pdostm->execute();
    }
    
    public function deleteTicker($dbcon, $id){
        $sql = "DELETE FROM watchlist WHERE id= :id";
                
        $pdostm = $dbcon->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $count = $pdostm->execute();
        
        return $count;
    }
}   