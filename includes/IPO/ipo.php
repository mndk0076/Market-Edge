<?php 

require_once "../../models/IPO/gainers_ipo.php";

$IPO = "https://cloud.iexapis.com/beta/stock/market/upcoming-ipos?token=pk_84b5cf5051b3459cad4032e62e027b3b";

                
$i = new GainersIPO();

?>

<h1>IPO Calendar</h1>
<div class="container-fluid">
	<div class="row">

<?php


$i = $i->getAPIipo($IPO);

?>


	</div>
</div>


 
   
