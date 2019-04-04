<?php 
	require_once '../../config.php';

	require_once   $modelspath . "news/news.php";
	require_once   $includepath . "header.php";

	//RSS FEED LINK FOR MY NEWS ARTICLES
	$rss2 = "http://articlefeeds.nasdaq.com/nasdaq/categories?category=Stocks";
	$rss3 = "http://rss.cnn.com/rss/money_markets.rss";
//	$rss3 = "http://www.cnbc.com/id/20409666/device/rss/rss";
	$rss1 = "http://feeds.marketwatch.com/marketwatch/marketpulse/";	

	$n = new StockMarketNews();
?>
<h1>News</h1>

<div class="container">
	<div class="row ">
		<ul class="nav nav-pills mb-3 nav-center nav-fill" id="pills-tab" role="tablist">
			<li class="nav-item">
				<a class="nav-link disabled" href="#">SELECT NEWS SOURCE:</a>
			</li>
			<li class="nav-item">
				<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">MARKETWATCH</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">NASDAQ</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">CNN</a>
			</li>
		</ul>
		<div class="tab-content" id="pills-tabContent">
			<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
				<div id="news-container" class="row">
					<!-- AREA WHERE THE LIST OF NEWS ARTICLES WILL BE DISPLAYED-->
					<?php $n->getAllNews($rss1); ?>
				</div>
			</div>
			<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
				<div id="news-container" class="row">
					<!-- AREA WHERE THE LIST OF NEWS ARTICLES WILL BE DISPLAYED-->
					<?php $n->getAllNews($rss2); ?>
				</div>
			</div>
			<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
				<div id="news-container" class="row">
					<!-- AREA WHERE THE LIST OF NEWS ARTICLES WILL BE DISPLAYED-->
					<?php $n->getAllNews($rss3); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php require_once   $includepath . "footer.php"; ?>
