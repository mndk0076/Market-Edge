<?php
require_once 'portfolio.php';

    if(isset($_POST['add_portfolio'])){
        $dbcon = Database::getDb();
        
        $ticker = $_POST['ticker'];
        $company = $_POST['company'];
        $shares = $_POST['shares'];
        $price = $_POST['price'];
            
        $u = new Portfolio();
        $u->addTicker($dbcon, $ticker, $company, $shares, $price);
        
        if($ticker !='' && $company !='' && $shares !='' && $price !=''){
            header("Location:../../includes/portfolioView.php");
        }    
    }