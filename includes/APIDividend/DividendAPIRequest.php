<?php


class DividendAPIRequest{
    public function getDividend($ticker){
        //$ticker goes into () as argument

        $API = "https://cloud.iexapis.com/beta/stock/market/batch/?token=pk_2070ea1e812e4ed989df8082e86dc16d&symbols=" . $ticker . "&types=dividends&range=ytd"; 
         return $API;
    
    }

}