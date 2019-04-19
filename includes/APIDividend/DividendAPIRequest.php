<?php


class DividendAPIRequest{
    public function getDividend($ticker){
        //$ticker goes into () as argument

        $API = "https://cloud.iexapis.com/beta/stock/market/batch/?token=pk_2070ea1e812e4ed989df8082e86dc16d&symbols=" . $ticker . "&types=dividends&range=ytd"; 
         return $API;
    
    }

}
/*This class method pulls from a stock market API and uses the ticker variable to put in the company ticker into the URL to pull from specific companies.
 In Dividend.php  we call this method then decode the json and then display it to the Portfolio page inside some bottstrap classes.*/