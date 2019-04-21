<?php 

require_once "../../models/IPO/gainers_ipo.php";

$IPO = "https://cloud.iexapis.com/beta/stock/market/upcoming-ipos?token=pk_dcd661062dce4e0ca61d72d5dc25ab20";

                
$i = new GainersIPO();
 
?>

<div class="card mb-3">
	<?php


$i = $i->getAPIipo($IPO);

?>


</div>
<?php
    
	?>