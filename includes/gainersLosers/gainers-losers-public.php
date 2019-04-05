<?php 

require_once '../../config_test.php';

require_once MODELS_GAINERSLOSERS_PATH . "/gainers-losers.php";
$apiGainers = "https://cloud.iexapis.com/beta/stock/market/list/gainers?token=pk_dcc8631c1b9b4c1caa84dcbeb63d32b0";
$apiLosers = "https://cloud.iexapis.com/beta/stock/market/list/losers?token=pk_dcc8631c1b9b4c1caa84dcbeb63d32b0";
                
$g = new GainersLosers();

require_once "header.php";
?>

<h1>Top Gainers/Losers</h1>
<div class="container-fluid">
	<div class="row">
		<ul class="nav nav-pills mb-3 nav-center" id="pills-tab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">STOCK: TOP GAINERS</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">STOCK: TOP LOSERS</a>
			</li>
		</ul>

		<div class="tab-content container-fluid tab-overwrite" id="pills-tabContent">
			<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

				<!-- area where the GAINERS TABLE TAB DISPLAY-->
				<?php 
                
                 $gainers = $g->getAPIGainers($apiGainers);
            
                ?>
			</div>
			<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

				<!-- area where the LOSER TABLE TAB DISPLAY-->
				<?php 
                
                  $gainers = $g->getAPIGainers($apiLosers);
                
                ?>
			</div>
		</div>
	</div>
</div>

<?php require_once "footer.php"; ?>
