<?php 
    require_once $_SERVER['DOCUMENT_ROOT'].'/includes/header.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/models/news/news.php';

	//RSS FEED LINK FOR MY NEWS ARTICLES
//	$rss = "http://articlefeeds.nasdaq.com/nasdaq/categories?category=Stocks";
	$rss = "http://rss.cnn.com/rss/money_markets.rss";

	$n = new StockMarketNews();
?>
<h1>News</h1>

<div class="container">

	<div id="news-container" class="row">
		<!-- AREA WHERE THE LIST OF NEWS ARTICLES WILL BE DISPLAYED-->
		<?php     
        $n->getAllNews($rss);       
		?>
	</div>
</div>

<?php 
    require_once $_SERVER['DOCUMENT_ROOT'].'/includes/footer.php';
?>
