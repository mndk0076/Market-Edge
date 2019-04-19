<?php 

require_once "../../models/IPO/gainers_ipo.php";

$IPO = "https://cloud.iexapis.com/beta/stock/market/upcoming-ipos?token=pk_84b5cf5051b3459cad4032e62e027b3b";

                
$i = new GainersIPO();
 require_once '../../config_test.php';
	require_once 'header.php';
?>

<div class="card mb-3">
	<?php


$i = $i->getAPIipo($IPO);

?>


</div>
<?php
    require_once '../../config_test.php';
	require_once 'header.php';
	
	?>