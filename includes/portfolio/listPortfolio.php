<?php
require_once '../../config_test.php';
require_once 'database.php';
require_once 'portfolio.php';
require_once 'APIRequest.php';
require_once '../../userSession.php';

$dbcon = Database::getDb();

//calling the get portfolio in the portfolio model and passing in the data and the active user id
$portfolio = new Portfolio();
$portfolio = $portfolio->getPortfolio($dbcon, $userid);

//requesting the API query
$p = new APIRequest();
$price = $p->getPortfolioMarketPrice();

//if api json array return 0 display notthing else display user portfolio
if(count($portfolio) != 0){
    //extracting the json api data
    $jsondata = file_get_contents ($price);
    $json = json_decode($jsondata, true);

    //sotring the ticker price in the array
    $tickers_price = array();
    foreach($json as $ticker) {
        $tickers_price[] = $ticker['price'];
    }
}

//looping through the API return data and displaying it in the table
foreach($portfolio as $price => $port){
    echo "<tr> <td style='display:none;'>". $port->id ."</td>"
            ."<td>". $port->ticker ."</td>"
            ."<td>". $port->company ."</td>"
            ."<td>". $port->shares ."</td>"
            ."<td>$". $port->price ."</td>"
            ."<td>$". $port->price * $port->shares ."</td>"
            ."<td>$". $tickers_price[$price] ."</td>"
            ."<td>$". $tickers_price[$price] * $port->shares ."</td>"
            ."<td>". round((($tickers_price[$price] * $port->shares) - ($port->price * $port->shares)),2)."</td></tr>";
}

 