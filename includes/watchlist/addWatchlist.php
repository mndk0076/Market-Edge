<?php
require_once '../../config_test.php';
require_once 'watchlist.php';

    if(isset($_POST['add_watchlist'])){
        $dbcon = Database::getDb();
        
        $ticker = $_POST['ticker'];
        $company = $_POST['company'];
        if($ticker !='' && $company !=''){
            header("Location: watchlistView.php");
        }
        else{
            $u = new Watchlist();
            $u->addTicker( $ticker, $company, $dbcon);
        }
        
        
        
    }