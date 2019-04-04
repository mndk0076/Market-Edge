<?php
Class GainersIPO{
	public function getAPIipo($ipo){
		
		$jsonIPO = file_get_contents ($ipo);
		$json = json_decode($jsonIPO, true);
		
		foreach($json['rawData'] as $ipos){
					
echo '<div class="card" style="width: 18rem;">'
 . '<div class="card-body">'
 . '<h5 class="card-title">' . $ipos['companyName'] .'</h5>'
 . '<h6 class="card-subtitle mb-2 text-muted">' .$ipos['expectedDate'] .'</h6>'
 

.'<p><a href="http://'. $ipos['url']. '" class="card-link" >Go to Our Website</a></p>'


. '</div>'
. '</div>';
		}
	}	
}	
	
