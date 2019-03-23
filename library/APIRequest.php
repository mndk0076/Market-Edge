<?php 
require_once 'Portfolio/portfolio.php';

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
}



