<?php 

require_once "../models/IPO/gainers_ipo.php";

$IPO = "https://cloud.iexapis.com/beta/stock/market/upcoming-ipos?token=pk_84b5cf5051b3459cad4032e62e027b3b";

                
$i = new GainersIPO();

require_once '../includes/header.php'; 
?>
<p><?php
$i = $i->getAPIipo($IPO);
?></p>
<?php 
    include 'footer.php';
?>