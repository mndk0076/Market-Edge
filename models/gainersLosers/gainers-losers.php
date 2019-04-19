<?php

//CLASS FOR THE STOCK MARKKET GAINERS
class GainersLosers{
    
	public function getAPIGainers($api) {
		
		//GETTING DATA FROM THE API KEY TO DISPLAY DATA INTO THE TABLE FRO STOCK MARKET GAINERS
		
		$jsonAPI = file_get_contents ($api);
		
		$json = json_decode($jsonAPI, true);
		
			/*TABLE HEADER
			"\n\t\t\t" IS WAY TO FORMAT HTML STRUCTURE WHEN ITS RENDERED ON THE BROWSER SO IT WILL HAVE PROPER INDENTATIONS AND THE CODE IS REAABLE*/
			$table = '<div class="col-md-12">' . "\n\t\t\t"
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
			. '<tbody class="gainer-hover">'. "\n" . "\t\t\t\t\t" ;
		
		//LOOP TO ITERATE AND DISPLAY DATA ON THE TABLE ROWS FOR STOCK MARKET GAINERS
		foreach ($json as $gainers) {

			$table .= '<tr>'. "\n" . "\t\t\t\t\t\t" 
			. '<td class="gainer-ticker">'
				
			//TICKER SYMBOL
			. $gainers['symbol']
			. '</td>'. "\n" . "\t\t\t\t\t\t" 
				
			. '<td class="gainer-company">'
			//COMPANY NAME
			. $gainers['companyName']
			. '</td>'. "\n" . "\t\t\t\t\t\t"
				
			. '<td>&#36; '
			//PRICE
			. $gainers['latestPrice']
			. '</td>'. "\n" . "\t\t\t\t\t\t" 
			. '<td class="gainer-change">'
				
			//CHANGE
			. $gainers['change']
			. '</td>'. "\n" . "\t\t\t\t\t\t" 
			. '<td class="gainer-change">'
				
			/*DISPLAY IN PERCENTAGE
			CHANGE PERCENTAGE*/
			. $gainers['changePercent'] * 100
			. '&#37;</td>'. "\n" . "\t\t\t\t\t\t" 
			. '<td>'
				
			//VOLUME
			. $gainers['latestVolume']
			. '</td>'. "\n" . "\t\t\t\t\t\t" 
			. '<td>'
			//AVERAGE TOTAL VOLUME
			. $gainers['avgTotalVolume']
			. '</td>'. "\n" . "\t\t\t\t\t\t" 
			. '<td>&#36; '
				
			/*MARKET CAP
			FORMATTING THE VALUE FOR MARKET CAP IN MILLIONS $ 000.00 M*/
			. number_format($gainers['marketCap']/ 1000000, 2)
			. ' M</td>'. "\n" . "\t\t\t\t\t\t" 
			. '<td>'
				
			//PE RATIO
			. $gainers['peRatio']
			. '</td>'. "\n" . "\t\t\t\t\t"
			. '</tr>'. "\n" . "\t\t\t\t\t";

		}//END OF FOREACH LOOP

		$table .= '</tbody>'. "\n" . "\t\t\t" . '</table>'. "\n" . "\t\t\t\t" . '</div>';

		echo $table;
		
	}// END OF getAPIGainers FUNCTION
	
}//EOF