<?php
    require_once '../../config_test.php';  
    require_once  'portfolio_database.php';

    require_once 'watchlist.php';
    require_once 'APIRequest.php';

$dbcon = Database::getDb();
$u = new Watchlist();
$watchlist = $u->getWatchlist($dbcon);

$p = new APIRequest();
$price = $p->getWatchlistMarketPrice();

$jsondata = file_get_contents ($price);
$json = json_decode($jsondata, true);

$tickers_price = array();
foreach($json as $ticker) {
    $tickers_price[] = $ticker['price'];
}

foreach($watchlist as $price => $watch){
    echo "<tr> <td style='display:none;'>". $watch->id ."</td>"
            ."<td>". $watch->ticker ."</td>"
            ."<td>". $watch->company ."</td>"
            ."<td>$". $tickers_price[$price] ."</td></tr>";
}

 