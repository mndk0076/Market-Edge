<?php
require_once '../../config_test.php';

require_once MODELS_PATH . "/database.php";
require_once MODELS_STATUS_PATH . "/user-status.php";
//require_once MODELS_STATUSCOMMENTS_PATH . "/status-comments.php";
//include '../includes/add-status.php';
	$message ="";
//


if(isset($_POST['update'])) {
	$id = $_POST['id'];
	
	$db = Database::getDb();
	$s = new Status();
	$status = $s->getStatusById($id, $db);
	//var_dump($status);
}

if(isset($_POST['updBtn'])) {
	$id = $_POST['statId'];
	$content = $_POST['content_post'];
	date_default_timezone_set("America/Toronto");
	$date_post = date('Y-m-d h:i:sa');
	$user_id = "1";
	
	$db = Database::getDb();
	$s = new Status();
	$status = $s->updateStatus($id, $content, $date_post, $user_id, $db);
	
	if($status) {
		header("Location:status.php");
	} else{
		echo "PROBLEM UPDATING STATUS";
	}
}

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


$db = Database::getDb();
$s = new Status();
$list = $s->getAllStatus(Database::getDb());

 require_once 'header.php'; ?>

<!-- Page Content -->
<div class="container">

	<div class="row">
		<div class="card-body">
			<form class="update_status" method="post" action="">
				<div>
					<input type="hidden" name="statId" value="<?= $status->id; ?>" />
					<label for="content" class="sr-only">Status</label>
					<input type="text" class="form-control" id="content_post" name="content_post" class="form-control form-control-lg status-text" placeholder="<?= $status->content ?>" required autofocus>
				</div>
				<button name="updBtn" class="btn btn-lg btn-primary btn-block" type="submit" hidden="hidden">Login</button>
			</form>
		</div>
	</div>
	<!-- /.row -->

</div>
<!-- /.container -->

<?php include 'footer.php'; ?>
