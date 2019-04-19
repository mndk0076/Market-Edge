<?php
require_once '../../config_test.php';
require_once 'portfolio.php';

session_start();
$userid = $_SESSION['uid'];

    if(isset($_POST['add_portfolio'])){
        $dbcon = Database::getDb();
        
        $ticker = $_POST['ticker'];
        $company = $_POST['company'];
        $shares = $_POST['shares'];
        $price = $_POST['price'];
            
        $u = new Portfolio();
        $u->addTicker($dbcon, $ticker, $company, $shares, $price, $userid);
        
        if($ticker !='' && $company !='' && $shares !='' && $price !=''){
            header("Location: portfolioView.php");
        }    
    }