<?php  

foreach($list as $status) {
	
	$datePosted = date('l, F d, Y', strtotime($status->date_post));
	$fName = "Enrina";
	$lName = "Wilms";
	$firstChar = mb_substr($fName, 0, 1, "UTF-8");
	$sectChar = mb_substr($lName, 0, 1, "UTF-8");
	echo '<div class="card status-container">'
	. '<div class="status-body">'
	. '<span class="status-userInitials">' . $firstChar . $sectChar . '</span>'
	//. '<img src="../../images/avatar.png" class="mr-3 status-avatar" alt="avatar">'

	//SESSION ID OR USERNAME DISPLAY USERNAME
	. '<span class="status-userName">Enrina Wilms</span>'
	. '<span class="status-date">'
	. $datePosted
	.'</span>'
	. '<span class="status-content">'
	. $status->content
	. '</span>';
	
	//ACTION BUTTONS FOR EDIT AND DELETE IF THEUSER WANTS TO EDIT AND DELETE A SHARED STATUS POST
	//EDIT STATUS BUTTON ICON
	echo "<div class='status-action-btn'>"
	. "<form class='action-btn-style' action='../status/update-status.php' method='post'>" 
	. "<input type='hidden' value='$status->id' name='id'" 
	. 'class="statusBtn"' . "/>"
	. '<button class="btn statusBtn status-actn-btn" type="submit" value="Update Status" name="update">'
	. '<i class="fas fa-user-edit"></i>'
	. '</i></button>'
	. "</form>" ;

	//DELETE STATUS BUTTON ICON
	echo  "<form class='action-btn-style' action='' method='post'>" 
	. "<input type='hidden' value='$status->id' name='id'"
	. 'class="statusBtn"'
	. " />" 
	. '<button class="btn statusBtn status-actn-btn" type="submit" value="Update Status" name="delStatus">'
	. '<i class="fas fa-trash-alt"></i>'
	. '</i></button>'
	. "</form>" 
		
	//SUPPOSED TO BE COMMENT SECTION
	. '<button class="btn statusBtn status-actn-btn" type="submit" value="Comment Status" name="comment">' . '<i class="far fa-comments"></i>' . '</i>&nbsp; Comment</button>'
	. "</div>"
	. "</div>"
	. '</div>';


}

//EOF