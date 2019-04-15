<?php
require_once "../../config_test.php";
require_once "DividendListPortfolio.php";
require_once "DividendAPIRequest.php";


$tickers = "";
$tickersArray = array();
foreach($portfolio as $port){
  $tickers .= $port->ticker . ",";
  $tickersArray[] = $port->ticker;
}
//var_dump($tickers);
$dividendRequest = new DividendAPIRequest();
$dividendData = $dividendRequest->getDividend($tickers);

//echo $dividendData;
$jsondata = file_get_contents ($dividendData);
$json = json_decode($jsondata, true); 

/*foreach($tickersArray as $ticker){
  echo $ticker . '<br/>';
}*/

  foreach($tickersArray as $ticker){

  foreach($json[$ticker]['dividends'] as $value){
    echo '<div class="card" style="width: 18rem;">'
    . '<div class="card-body">'
    . '<h5 class="card-title">' . $ticker .'</h5>' . '<h6 class="card-subtitle mb-2 text-muted">' . "Expected Date" .": "  .$value['exDate'] .'</h6>'
    . '<h6 class="card-subtitle mb-2 text-muted">' . "Payment Date" . ": " . "$ " .$value['paymentDate']. '</h6>'
    . '<h6 class="card-subtitle mb-2 text-muted">' . "Dividend Amount" . ": " . "$ " .$value['amount']. '</h6>'
    . '</div>'
    . '</div>';
}
}


?>
<!--
  foreach($tickersArray as $ticker){

  foreach($json[$ticker]['dividends'] as $value){
    echo $value['exDate'] . "</br>";
    echo $value['paymentDate'] . "</br>";
    echo $value['amount'] . "</br>";
}
}
//step one: file_get_contents - gets the data from the api    ['dividends']
//step two: json_decode - parse the api data in php
//step three: diaplay
/*foreach($json as $dividend){
    echo $dividend['exDate'] . "</br>";
    echo $dividend['paymentDate'] . "</br>";
    echo $dividend['amount'] . "</br>";
}*/


<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Card title</h5> $ticker goes here, make another function to pull from the database, make a foreachloop for each ticker
    <p class="card-text">Dummy content.</p>
    <p class="card-text">Dummy content.</p>
    <p class="card-text">Dummy content.</p>
   
  </div>
</div>-->