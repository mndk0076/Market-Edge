<?php
require_once '../../config_test.php';
require_once 'watchlist.php';
require_once 'APIRequest.php';
require_once '../../userSession.php';
        
$dbcon = Database::getDb();
$list = new Portfolio();
$portfolio = $list->getWatchlist($dbcon);


$p = new APIRequest();
$price = $p->getWatchlistMarketPrice();

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
            ."<td>$". $tickers_price[$price] ."</td>"
            ."<td>
                <button type='submit' name='editTicker' class='edit-btn' data-toggle='modal' data-target='#editModal'>
                    <i class='far fa-edit'></i>
                </button> 
            </td>
            <td>
                <button type='submit' name='deleteTicker' class='delete-btn' data-toggle='modal' data-target='#deleteModal'>
                <i class='far fa-trash-alt'></i></button>                
            </td></tr>";
}
