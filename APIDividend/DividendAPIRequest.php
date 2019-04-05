<?php
//I am hardcoding the ticker for now since I don't have access to the portfolio database 

class DividendAPIRequest{
    public function getDividend(){
        //$ticker goes into () as argument

        $API = "https://cloud.iexapis.com/beta/stock/" . $ticker . "/dividends/ytd?token=pk_2070ea1e812e4ed989df8082e86dc16d"; 
        $ticker = "";
    
    }

}