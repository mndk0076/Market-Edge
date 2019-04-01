<?php 
    require_once '../../config_test.php';
    require_once 'APIRequest.php';

    date_default_timezone_set('America/Los_Angeles'); 

    $ticker = 'SPY';
    $change = $company = $changePercent = $symbol ='';
    if(isset($_GET['searchTicker'])){
        $ticker = $_GET['ticker'];
    }
    $p = new APIRequest();
    $data = $p->getDataChart($ticker);
    $quote = $p->getTickerQuote($ticker);

    $jsondata = file_get_contents ($data);
    $json = json_decode($jsondata, true);

    $quotedata = file_get_contents ($quote);
    $quotejson = json_decode($quotedata, true);

    foreach($quotejson as $value){
        $symbol = $value['quote']['symbol'];
        $company = $value['quote']['companyName'];
        $latestPrice = '$'.$value['quote']['latestPrice'];
        $latest = $value['quote']['latestPrice'];
        $changes = $value['quote']['change'];

        if ($changes < 0){
            $color = "red";  
            $change = '<i class="fas fa-arrow-down"></i>'.round($value['quote']['change'],2);
            $changePercent = '('.round($value['quote']['changePercent']*100,2).'%)';

        }else if ($changes > 0){
            $color = "green";
            $change = '<i class="fas fa-arrow-up"></i>'.round($value['quote']['change'],2);
            $changePercent = '(+'.round($value['quote']['changePercent']*100,2).'%)';
        }
    }

    foreach($json['Time Series (Daily)'] as $key => $value){
        $date = strtotime($key);
        $open = $value['1. open'];
        $high = $value['2. high'];
        $low = $value['3. low'];
        $close = $value['4. close']; 

        $dataPoints [] = array("x" => $date.'000', "y" => array($open ,$high ,$low ,$close));
    }    
?>