<?php  

foreach($list as $status) {	
	
	//DATE WHEN THE STATUS WAS CREATED
	$datePosted = date('l, F d, Y', strtotime($status->date_post));
	
	//GETTING FIRSTNAME AND LASTNAME FOR USERS NAME AND INITIALS TO BE DISPLAY SO USER WILL KNOW WHO OWNS THE POSTS
	$fName = $status->userFname;
	$lName = $status->userLname;
	
	/*THIS PART WILL ACT LIKE AND AVATAR FOR POSTED STATUS
	 *FIRST LETTER OF THE FIRSTNAME AND LASTNAME OF THE USER WILL
	 *BE TAKEN AND DISPLAY IT*/
	
	$firstChar = mb_substr($fName, 0, 1, "UTF-8");
	$secChar = mb_substr($lName, 0, 1, "UTF-8");
	
	echo '<div class="card status-container">'
	. '<div class="status-body">'
	. '<span class="status-userInitials">' . $firstChar . $secChar . '</span>';
	
	echo '<span class="status-userName">' . $fName . " " . $lName . '</span>'
	. '<span class="status-date">'
	. $datePosted
	.'</span>'
	. '<span class="status-content">'
	. $status->content
	. '</span>';
	
	/*ACTION BUTTONS FOR EDIT AND DELETE IF THEUSER WANTS TO EDIT AND DELETE A SHARED STATUS POST
	 *EDIT STATUS BUTTON ICON
	 *THE IF STATEMENT WILL HIDE THE ACTION BUTTON IF THE STATUS POSTED DOESN'T *
	 *BELOW TO THE USE WHO'S LOGGED IN*/
	
	//if($status->user_id == $_SESSION['uid']){
	/*I COMMENTED THIS IF STATEMENT TO HIDE THE ACTION BUTTON BECAUSE ITS ACTING WEIRD WHEN I LOGGED FROM A DIFFRENT USER
	 *ACCOUNT THE STATUS LIST IS BEING SCATTERED MUST BE SOMETHING WITH BOOTSTRAP AND LOOP I THINK
	 * BUT IF THIS IS COMMENTED EVERYTHING WORKS FINE AND DISPLAYS THE LIST PROPERLY
	 *IF YOU WANT YOU CAN CHECK AND UNCOMMENT THIS IF STATEMENT TO SEE THAT ITS WORKING HIDING THE BUTTONS AND JSUT SHOWING
	 *THE COMMENT BUTTON FROM OTHER USERS
	*/
	echo "<div class='status-action-btn'>"
	. "<form class='action-btn-style' action='../status/updateStatus.php' method='post'>" 
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
	. "</form>" ;
		
	//}//END OF IF STATEMENT FOR ACTION BUTTONS
	
	/*SUPPOSED TO BE COMMENT SECTION
	 *IF THE SESSION['UID'] DOESNT BELOW TO THAT USER ONLY COMMENTBUTTON WILL APPEAR
	 *THE COMMENT SECTION IS IN DEVELOPMENT PROCESS IN THE FUTURE IT WILL BE ADDED SO USER CAN ADD COMMENTS
	 *AND DISCUSS THINGS ABOUT STOCK MARKET*/
	
	echo '<button class="btn statusBtn status-actn-btn" type="submit" value="Comment Status" name="comment" data-toggle="modal" data-target="#exampleModalCenter">' . '<i class="far fa-comments"></i>' . '</i>&nbsp; Comment</button>'
	. "</div>"
	. "</div>"
	. '</div>';


}

//EOF