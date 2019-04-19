<?php
    require_once '../../config_test.php';
    require_once 'database.php';
    require_once 'portfolio.php';
    require_once 'APIRequest.php';

$dbcon = Database::getDb();
$u = new Portfolio();
$portfolio = $u->getPortfolio($dbcon);

$p = new APIRequest();
$price = $p->getPortfolioMarketPrice();

$jsondata = file_get_contents ($price);
$json = json_decode($jsondata, true);

$tickers_price = array();
foreach($json as $ticker) {
    $tickers_price[] = $ticker['price'];
}

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

 