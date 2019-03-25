<?php

//CLASS FOR THE STOCK MARKKET GAINERS
class GainersLosers{
    
	public function getAPIGainers($api) {
		
		//GETTING DATA FROM THE API KEY TO DISPLAY DATA INTO THE TABLE FRO STOCK MARKET GAINERS
		$jsonAPI = file_get_contents ($api);
		$json = json_decode($jsonAPI, true);
			//TABLE HEADER
			$table = '<div class="col-md-12">' . "\n\t\t\t"
			//. '<h2>Top Losers</h2>' . "\n" . "\t\t\t"
			. '<table class="table-hover">'. "\n" . "\t\t\t\t"
			. '<thead>'. "\n" . "\t\t\t\t\t"
			. '<tr>'. "\n" . "\t\t\t\t\t\t"
			. '<th>Ticker</th>'. "\n" . "\t\t\t\t\t\t"
			. '<th>Company</th>'. "\n" . "\t\t\t\t\t\t"
			. '<th>Price</th>'. "\n" . "\t\t\t\t\t\t"
			. '<th>Change</th>'. "\n" . "\t\t\t\t\t\t"
			. '<th>&#37; Change</th>'. "\n" . "\t\t\t\t\t\t"
			. '<th>Volume</th>'. "\n" . "\t\t\t\t\t\t"
			. '<th>Average<br/>Volume</th>'. "\n" . "\t\t\t\t\t\t"
			. '<th>Market<br/>Cap</th>'. "\n" . "\t\t\t\t\t\t"
			. '<th>PE<br/>Ratio</th>'. "\n" . "\t\t\t\t\t"
			. '</tr>'. "\n" . "\t\t\t\t"
			. '</thead>'. "\n" . "\t\t\t\t"
			. '<tbody>'. "\n" . "\t\t\t\t\t" ;
		
		//LOOP TO ITERATE AND DISPLAY DATA ON THE TABLE ROWS FOR STOCK MARKET GAINERS
		foreach ($json as $gainers) {

			$table .= '<tr>'. "\n" . "\t\t\t\t\t\t" 
			. '<td>'
			. $gainers['symbol']
			. '</td>'. "\n" . "\t\t\t\t\t\t" 
			. '<td>'
			. $gainers['companyName']
			. '</td>'. "\n" . "\t\t\t\t\t\t" 
			. '<td>&#36; '
			. $gainers['latestPrice']
			. '</td>'. "\n" . "\t\t\t\t\t\t" 
			. '<td>'
			. $gainers['change']
			. '</td>'. "\n" . "\t\t\t\t\t\t" 
			. '<td>'
			. $gainers['changePercent']
			. '&#37;</td>'. "\n" . "\t\t\t\t\t\t" 
			. '<td>'
			. $gainers['latestVolume']
			. '</td>'. "\n" . "\t\t\t\t\t\t" 
			. '<td>'
			. $gainers['avgTotalVolume']
			. '</td>'. "\n" . "\t\t\t\t\t\t" 
			. '<td>&#36; '
			//. $gainers['marketCap']
			. number_format($gainers['marketCap'])
			. ' M</td>'. "\n" . "\t\t\t\t\t\t" 
			. '<td>'
			. $gainers['peRatio']
			. '</td>'. "\n" . "\t\t\t\t\t"
			. '</tr>'. "\n" . "\t\t\t\t\t";

		}//END OF FOREACH LOOP

		$table .= '</tbody>'. "\n" . "\t\t\t" . '</table>'. "\n" . "\t\t\t\t" . '</div>';

		echo $table;
		
	}// END OF getAPIGainers FUNCTION
	
}//EOF