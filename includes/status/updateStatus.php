<?php
require_once "../../userSession.php";

require_once '../../config_test.php';

require_once MODELS_PATH . "/database.php";
require_once MODELS_STATUS_PATH . "/userStatus.php";
require_once '../../Validation/validation.php'; 

//require_once MODELS_STATUSCOMMENTS_PATH . "/status-comments.php";
//include '../includes/add-status.php';
//add this to every page. if user is not login it will redirect to login page

	$message ="";
	$statErr = "";
	$isValid = true;
//GETTING THE ID OF A SPECIFIC STATUS TO BE UPDATED BY THE USER
if(isset($_POST['update'])) {
	$id = $_POST['id'];
	
	$db = Database::getDb();
	$statusObj = new Status();
	$status = $statusObj->getStatusById($id, $db);
}

//UPADATING THE USER STATUS
	
if(isset($_POST['updBtn'])) {
	$id = $_POST['statId'];
	$content = $_POST['content'];
	date_default_timezone_set("America/Toronto");
	$date_post = date('Y-m-d h:i:sa');
	$user_id = $_SESSION['uid'];
	$user_fname = $_SESSION['uFname'];
	$user_lname = $_SESSION['uLname'];
	
	if(checkEmpty($content)){
            $statErr = "Please enter your status";
            $isValid = false;
	}

//IF INPUT TEXTAREA IS NOT EMPTY THEEN FORM WILL BE SUBMITTED AND SAVE TO THE DATABASE
if($isValid === true) {
	
	//UPDATING A SPECIFIC STAUS FROM USER
	$db = Database::getDb();
	$statusObj = new Status();
	$status = $statusObj->updateStatus($id, $content, $date_post, $user_id, $user_fname, $user_lname, $db);
	
	if($status) {
		header("Location:../homepage/homepage.php");
	} else{
		echo "PROBLEM UPDATING STATUS";
	}
}
}

/*THIS GET THE LIST OF STATUS STORED FROM THE DATABASE TABLE STATUS*/
$db = Database::getDb();
$statusObj = new Status();
$list = $statusObj->getAllStatus(Database::getDb());

?>

<?php require_once 'header.php'; ?>

<!-- PAGE CONTENT -->
<div class="jumbotron jumbotron-fluid">
	<div class="container">
		<h1 class="ml-auto">
			<span class="homepage-market">Stock</span>
			<span class="homepage-edge">Market</span>
		</h1>
		<h2>Financial Visualization for the Latest Stock Market<br /> Company, News, and more.</h2>
		<p class="lead">Get started and Invest for your future</p>
		<a class="btn btn-dark btn-lg" href="../portfolio/portfolioView.php" role="button">Add Portfolio</a>
		<a class="btn btn-dark btn-lg" href="../watchlist/watchlist.php" role="button">Add Watchlist</a>
	</div>
</div>
<div class="container">

	<div class="row">

		<!-- STATUS SECTION -->
		<!--THIS IS WHERE AN TEXTAREA IS PLACED FOR USER TO POST THEIR STATUS OR WHATEVER THEY WANT TO SHARE-->
		<div class="col-md-12 status-div">
			<div class="my-4">
				<h5 class="card-header">Share a Status</h5>
				<div class="card-header">
					<form class="form-status" method="post" action="">
						<div class="input-group mb-3">
							<input type="hidden" name="statId" value="<?= $status->id; ?>" />
							<label for="content" class="sr-only">Status</label>
							<textarea id="content" name="content" class="form-control" aria-label="With textarea" placeholder="" row="2"><?= $status->content; ?></textarea>
							<div class="input-group-append">
								<button id="updBtn" name="updBtn" class="btn btn-outline-dark" type="submit">Post Status</button>
							</div>
						</div>
					</form>
					<div><span class="status-error"><?php echo $statErr; ?></span></div>
				</div>

			</div>
		</div>

		<!-- SECTION WHERE USER CAN SHARE AND POST A STATUS RELATED TO STOCK MARKET -->
		<!-- col-md-8 -->
		<div class="col-md-8">
			<h5 class="homepage-h5">Latest News</h5>
			<div class="card mb-3">
				<div class="row no-gutters">
					<div class="col-md-4">
						<img src="../../images/analytics-chart-data-186461.jpg" class="card-img" alt="analytics chart">
					</div>
					<div class="col-md-8">
						<div class="card-body">
							<h5 class="card-title">What's New?</h5>
							<p class="card-text">Read the most recent news bout stock market.</p>
							<p class="card-text"><small class="text-muted"><a class="btn btn-dark btn-sm" href="../news/news.php" role="button">Read News Articles</a></small></p>
						</div>
					</div>
				</div>
			</div>

			<h5 class="homepage-h5">Portfolio ad Watchlist</h5>
			<div class="card mb-3">
				<div class="row no-gutters">
					<div class="col-md-4">
						<img src="../../images/statistics-3411473_1920.jpg" class="card-img" alt="image of statstistics">
					</div>
					<div class="col-md-8">
						<div class="card-body">
							<h5 class="card-title">Search for Company</h5>
							<p class="card-text">Add and create your Portfolio and Watchlist</p>
							<p class="card-text"><small class="text-muted"><a class="btn btn-dark btn-sm" href="../portfolio/portfolioView.php" role="button">Add Portfolio</a></small></p>
						</div>
					</div>
				</div>
			</div>
			
		<!--IPO CALENDAR-->
			<h5 class="homepage-h5">IPO Calendar</h5>
			<div class="card mb-3">
				<?php  
			require_once INCLUDES_IPO_PATH . "/ipo.php";
			?>
			</div>

		</div>
		<!-- col-md-8 -->

		<!--START OF SIDE BAR -->
		<!-- col-md-4 -->
		<!--PLACE WHERE THE LIST OF STATUS WILL BE DISPLAYED-->
		<div class="col-md-4">
			<h5>Recent Status</h5>
			<div class="status-recent">
				<?php  
			require_once INCLUDES_STATUS_PATH . "/statusList.php";
			?>
			</div>
		</div>
		<!-- col-md-4 -->
		<!--END OF SIDE BAR -->

	</div>
	<!-- ROW -->

</div>
<!-- CONTAINER -->
<?php include 'footer.php'; ?>
