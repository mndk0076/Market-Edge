<?php

//SESSIONS AND LOGIN STILL NOT IMPLEMENTED

require_once '../../config_test.php';
require_once MODELS_PATH . "/database.php";
require_once MODELS_STATUS_PATH . "/user-status.php";

//COMMENTED THE MODEL AND CLASS FOR COMMENTS TO DO IN THE FUTURE IF THERE;S STILL TIME
//require_once MODELS_STATUSCOMMENTS_PATH . "/status-comments.php";
//include '../includes/add-status.php';
	$message ="";

	if(isset($_POST['addStatus'])) {
		$content_post = $_POST['content'];
		// I WANT THE CAPTURED DATETIME TO BE TOROONTO TIMEZONE
		date_default_timezone_set("America/Toronto");
		$date_post = date('Y-m-d h:i:sa');
		//THIS IS A TEMPORARY USERID SO I CAN TRY WRITING A NEW STATUS POST ON THE DATABASE
		//SESSIONS AND LOGIN STILL NOT IMPLEMENTED
		$user_id = "1";
		
		$db = Database::getDb();
		$s = new Status();
		$add = $s->addStatus($content_post, $date_post, $user_id, $db);
		
		if($add) {
			//DISPLAY STATUS
			header("Location:status.php")	;
		} else{
			$message = "Problem posting a status!";
		}
		exit;
	}
	if(isset($_POST['delStatus'])){
			$id = $_POST['id'];
			$db = Database::getDb();
				$s = new Status();
				$delete = $s->deleteStatus($id, $db);
			if($delete) {
				header("Location:status.php");
			}
		}

	if(isset($_POST['update'])) {
			$id = $_POST['id'];

			$db = Database::getDb();
			$s = new Status();
			$status = $s->getStatusById($id, $db);
			//var_dump($status);
		}
//I'LL LEAVE THE CODE FOR COMMENTS SECTION IF I STILLAHVE TIME I WILL TRY TO MAKE THIS WORK
//if(isset($_POST['updBtn'])) {
//	$id = $_POST['statId'];
//	$content_post = $_POST['content_post'];
//	date_default_timezone_set("America/Toronto");
//	$date_post = date('Y-m-d h:i:sa');
//	
//	$db = Database::getDb();
//	$s = new Status();
//	$status = $s->updateStatus($id, $content_post, $date_post, $db);
//	
//	if($status) {
//		header("Location:status.php");
//	} else{
//		echo "PROBLEM UPDATING STATUS";
//	}
//}

//if(isset($_POST['addComment'])) {
//		$comment = $_POST['comment'];
//		// I WANT THE CAPTURED DATETIME TO BE TOROONTO TIMEZONE
//		date_default_timezone_set("America/Toronto");
//		$date_post = date('Y-m-d h:i:sa');
//		$status_id = 12;
//		
//		$db = Database::getDb();
//		$s = new Comments();
//		$add = $s->addComment($comment, $date_post, $status_id, $db);
//		
//		if($add) {
//			//DISPLAY STATUS
//			header("Location:../includes/homepage1.php")	;
//		} else{
//			$message = "Problem posting a status!";
//		}
//		exit;
//	}

	//TO DISPLAY THE LIST OF THE STATUS STORED IN THE DATABASE
	$db = Database::getDb();
	$s = new Status();
	$list = $s->getAllStatus(Database::getDb());


?>

<?php require_once 'header.php'; ?>

<!-- PAGE CONTENT -->
<div class="container">

	<div class="row">

		<!-- MAIN CONTENT AND TABLES -->
		<div class="col-md-8">

			<!-- PORTFOLIO -->
			<h3>Portfolio</h3>
			<table class="table table-hover table-sm">
				<thead>
					<tr>
						<th>Ticker</th>
						<th>Company</th>
						<th>Shares</th>
						<th>Price</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>APPL</td>
						<td>Apple Inc</td>
						<td>10</td>
						<td>$154.3</td>
					</tr>
					<tr>
						<td>APPL</td>
						<td>Apple Inc</td>
						<td>10</td>
						<td>$154.3</td>
					</tr>
					<tr>
						<td>APPL</td>
						<td>Apple Inc</td>
						<td>10</td>
						<td>$154.3</td>
					</tr>
					<tr>
						<td>APPL</td>
						<td>Apple Inc</td>
						<td>10</td>
						<td>$154.3</td>
					</tr>
					<tr>
						<td>APPL</td>
						<td>Apple Inc</td>
						<td>10</td>
						<td>$154.3</td>
					</tr>
				</tbody>
			</table> <!-- PORTFOLIO -->


			<!-- WATCHLIST -->
			<h3>Watchlist</h3>
			<table class="table table-hover table-sm">
				<thead>
					<tr>
						<th>Ticker</th>
						<th>Company</th>
						<th>Shares</th>
						<th>Price</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>APPL</td>
						<td>Apple Inc</td>
						<td>10</td>
						<td>$154.3</td>
					</tr>
					<tr>
						<td>APPL</td>
						<td>Apple Inc</td>
						<td>10</td>
						<td>$154.3</td>
					</tr>
					<tr>
						<td>APPL</td>
						<td>Apple Inc</td>
						<td>10</td>
						<td>$154.3</td>
					</tr>
					<tr>
						<td>APPL</td>
						<td>Apple Inc</td>
						<td>10</td>
						<td>$154.3</td>
					</tr>
					<tr>
						<td>APPL</td>
						<td>Apple Inc</td>
						<td>10</td>
						<td>$154.3</td>
					</tr>
				</tbody>
			</table> <!-- WATCHLIST -->
           <div class="ipo">
		   <?php
			require_once "../includes/IPO/ipo.php";
			?> <!-->
           </div>
		</div><!-- PORTFOLIO, WATCHLIST AND IPO SECTION -->

		<!-- STATUS SECTION -->
		<div class="col-md-4">

			<!--SIDE BAR SECTION WHERE USER CAN SHARE AND POST A STATUS RELATED TO STOCK MARKET -->
			<div class="card my-4">
				<h5 class="card-header">Share a Status</h5>
				<div class="card-body">
					<form class="form-login" method="post" action="">
						<div>
							<label for="content" class="sr-only">Status</label>
							<input type="text" name="content" id="content" class="form-control form-control-lg status-text" placeholder="What's on your mind? Post it here!" required autofocus>
						</div>
						<button name="addStatus" class="btn btn-lg btn-primary btn-block" type="submit" hidden="hidden">Login</button>
					</form>
				</div>
			</div><!-- SECTION WHERE USER CAN SHARE AND POST A STATUS RELATED TO STOCK MARKET -->

			<!-- RECENT STATUS SECTION -->
			<div class="card my-4">
				<h5 class="card-header">Recent Status</h5>
				<?php  

			foreach($list as $status) {

			echo '<div class="media status-container">'
			. '<img src="../../images/avatar.png" class="mr-3 status-avatar" alt="avatar">'
			. '<div class="media-body">'
				
			//SESSION ID OR USERNAME DISPLAY USERNAME
			. '<h5 class="mt-0">Enrina Wilms</h5>'
		 	. '<span class="status-span-content">'
			. $status->content
			. '</span>'
			. '</div>'
			. '</div>';

			//ACTION BUTTONS FOR EDIT AND DELETE IF THEUSER WANTS TO EDIT AND DELETE A SHARED STATUS POST
			//EDIT STATUS BUTTON ICON
			echo "<div class='status-action-btn'>"
			. "<form class='action-btn-style' action='../status/update-status.php' method='post'>" 
			. "<input type='hidden' value='$status->id' name='id'" . 'class="statusBtn"' . "/>"
			. '<button class="btn statusBtn status-actn-btn" type="submit" value="Update Status" name="update">' . '<i class="fas fa-user-edit"></i>' . '</i></button>'
			. "</form>" ;

			//DELETE STATUS BUTTON ICON
			echo  "<form class='action-btn-style' action='' method='post'>" 
			. "<input type='hidden' value='$status->id' name='id'" . 'class="statusBtn"' . " />" 
			. '<button class="btn statusBtn status-actn-btn" type="submit" value="Update Status" name="delStatus">' . '<i class="fas fa-trash-alt"></i>' . '</i></button>'
			. "</form>" 
			//SUPPOSED TO BE COMMENT SECTION
			. '<button class="btn statusBtn status-actn-btn" type="submit" value="Comment Status" name="comment">' . '<i class="far fa-comments"></i>' . '</i>&nbsp; Comment</button>'
			. "</div>";
				
			}

			?>
			</div><!-- END OF RECENT STATUS -->


		</div><!--END OF SIDE BAR -->

	</div>
	<!-- ROW -->

</div>
<!-- CONTAINER -->

<?php include 'footer.php'; ?>
