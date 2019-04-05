<?php
require_once "../config_test.php";
require_once "header.php";
$jsondata = file_get_contents ("https://cloud.iexapis.com/beta/stock/aapl/dividends/ytd?token=pk_2070ea1e812e4ed989df8082e86dc16d");
$json = json_decode($jsondata, true);

//step one: file_get_contents - gets the data from the api
//step two: json_decode - parse the api data in php
//step three: diaplay
foreach($json as $dividend){
    echo $dividend['exDate'] . "</br>";
    echo $dividend['paymentDate'] . "</br>";
    echo $dividend['amount'] . "</br>";
}
?>

<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Card title</h5><!--$ticker goes here, make another function to pull from the database, make a foreachloop for each ticker-->
    <p class="card-text">Dummy content.</p>
    <p class="card-text">Dummy content.</p>
    <p class="card-text">Dummy content.</p>
   
  </div>
</div>