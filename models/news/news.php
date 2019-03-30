<?php

//CLASS FOR THE STOCK MARKKET NEWS
class StockMarketNews{
    
	public function getAllNews($rss) {
	
		$newsRss = new DOMDocument();
		//$newsRss->load('http://rss.cnn.com/rss/money_markets.rss');
		$newsRss->load($rss);

		$newsFeed = array();
		
		//GETTING THE ITEMS ON THE RSS FEED AND MAKE INTO AN ARRAY
		
		foreach ($newsRss->getElementsByTagName('item') as $node) {
			
			$item = array (
				'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
				'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
				'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
				'pubDate' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue
				);
			
			//PUSHING 
			array_push($newsFeed, $item);
		}


		$limit = 4;//NUMBER OF ARTICLES TO BE GENERATED AND DISPLAY
		
		for($i=0; $i<$limit; $i++) {
			
			$title = str_replace(' & ', ' &amp; ', $newsFeed[$i]['title']);
			$link = $newsFeed[$i]['link'];
			$description = $newsFeed[$i]['desc'];
			
			//Diplaying a normal date format for users
			$pubDate = date('l F d, Y', strtotime($newsFeed[$i]['pubDate']));

			$max_words = 20;
			
            // WANT TO LIMIT THE WORDS THAT WILL BE DISPLAY FOR DESCRIPTION
            if ($max_words > 0) {
                $arr = explode(' ', $description);
                if ($max_words < count($arr)) {
                    $description = '';
                    $word_count = 0;
					
                    foreach($arr as $w) {
                        $description .= $w . ' ';
                        $word_count = $word_count + 1;
						
                        if ($word_count == $max_words) {
                            break;
                        }
                    }
					// THIS LINK WILL BE APPEND IN THE DESCRIPTION
                    $description .=  '<a class="news-title-link" href="' . $link . '" target="_blank">' . " ... Continue Reading" . '</a>';
                }
            }
			
			//DISPLAY THE INFROMATION FROM THE RSS FEEDS
			echo '<div class="col-sm-6 card-border">' . "\n" . "\t\t\t"
				.'<div class="news-header-custom">' . "\n" . "\t\t\t\t"
				.'</div>' . "\n" . "\t\t\t\t\t"
				.'<div class="card-body news-background">' . "\n" . "\t\t\t\t\t\t"
				.'<a class="news-title-link" href="' . $link . '" target="_blank">'
				. "\n" . "\t\t\t\t\t\t"
				.'<h5 class="card-title news-title-background">'
				. $title
				.'</h5>' . "\n" . "\t\t\t\t\t\t" . '</a>'
				.'<p class="card-text news-pub-date">Published: '
				. $pubDate
				.'</p>' . "\n" . "\t\t\t\t\t\t"
				.'<p class="card-text">'
				. $description
				.'</p>' . "\n" . "\t\t\t\t\t\t"
				.'<a href="'
				. $link
				. '" class="btn btn-primary btn-block" target="_blank">'
				. 'Read More'
				.'</a>' . "\n" . "\t\t\t\t\t"
				.'</div>' . "\n" . "\t\t\t\t"
				.'</div>' . "\n";
			
			
		}//END FOR LOOP FOR RENDERING NEWS ARTICLE LINKS
		
	}// END OF getAllNews FUNCTION
	
}//EOF