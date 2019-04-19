<?php
require_once '../../config_test.php';
require_once 'watchlist.php';

    if(isset($_POST['add_watchlist'])){
        $dbcon = Database::getDb();
        
        $ticker = $_POST['ticker'];
        $company = $_POST['company'];
            
        $u = new Portfolio();
        $u->addTicker($dbcon, $ticker, $company);
        
        if($ticker !='' && $company !='' && $shares !='' && $price !=''){
            header("Location: watchlistView.php");
        }    
    }