<?php
require_once '../../config_test.php';
require_once 'portfolio_database.php';
require_once 'portfolio.php';

$dbcon = Database::getDb();
$dividend = new Portfolio();
$portfolio = $dividend->getPortfolio($dbcon);



