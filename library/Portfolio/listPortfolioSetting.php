<?php
require_once 'portfolio.php';
require_once '../library/APIRequest.php';
        
$dbcon = Database::getDb();
$list = new Portfolio();
$portfolio = $list->getPortfolio($dbcon);


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
            ."<td>". (($tickers_price[$price] * $port->shares) - ($port->price * $port->shares)  )."</td>"
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
