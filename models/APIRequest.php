<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/models/portfolio/portfolio.php';

class APIRequest{
    public function getPortfolioMarketPrice(){
        $API = "https://cloud.iexapis.com/beta/stock/market/batch?token=pk_2070ea1e812e4ed989df8082e86dc16d&symbols=";
        $API_type = "&types=price";


        $dbcon = Database::getDb();
        $u = new Portfolio();
        $portfolio = $u->getPortfolio($dbcon);
        $tickers = "";
        foreach($portfolio as $port){
            $tickers.=  $port->ticker .",";
        }

        $API_query = $API . $tickers . $API_type;   
        /*
        $jsondata = file_get_contents ($API_query);
        $json = json_decode($jsondata, true);

        foreach($json as $price){
            echo "<h5>" .$price['price'] ."</h5>";
        }
        */
        //echo $API_query;
        return $API_query;
    }
    public function getTickerQuote($ticker){
        $API_query = "https://cloud.iexapis.com/beta/stock/market/batch?token=pk_2070ea1e812e4ed989df8082e86dc16d&symbols=". $ticker ."&types=quote";
        
        return $API_query;
    }
    public function getDataChart($ticker){
        $API_query = "https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol=". $ticker ."&apikey=Y6K29HWW8R4315MT";
        
        return $API_query;
    }
}



