<?php
require_once "db.php";


    $data = $_POST;
    if(isset($data['do_signup']))
{
	//valid data
	$errors = array();
	if(trim($data['fname']) == '')
	{
	 $errors[]= "Enter First Name!";	
	}
	if(trim($data['lname']) == '')
	{
	 $errors[]= "Enter Last Name!";	
	}
	if(trim($data['login']) == '')
	{
	 $errors[]= "Enter login!";	
	}
	if(trim($data['email']) == '')
	{
	 $errors[]= "Enter Email!";	
	}
	if(trim($data['phone']) == '')
	{
	 $errors[]= "Enter Phone Number!";	
	}
	if($data['password'] == '')
	{
	 $errors[]= "Enter Password!";	
	}
	if($data['password_2'] != $data['password'])
	{
	 $errors[]= "Password is wrong!";	
	}
	if(R::count('users',"login =? ", array($data['login']) >0 ))
	{
	 $errors[]= "User with such login there is.!";	
	}
	if(R::count('users',"email =? ", array($data['email']) >0 ))
	{
	 $errors[]= "User with such email there is.!";	
	}
	if(empty($errors))
	{
		//register
		
		$user = R::dispense ('users');
		$user->user_Fname = $data['fname'];
		$user->user_Lname = $data['lname'];
		$user->login = $data['login'];
		$user->user_email = $data['email'];
		$user->userPhone = $data['phone'];
		$user->password = password_hash($data['password'],PASSWORD_DEFAULT); //safe for password
		R::store($user);
		
		echo '<div style="color:green;">You are registered succeed!</div><hr>';
	}else{
		
		echo '<div style="color:red;">'.array_shift($errors).'</div><hr>';
	}
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		 <link href="main.css" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
       
    </head>
 <body>
	<main class="container">
     <div class="signup-form">
<form action="signup.php" method="POST">
 <h1>Sign Up</h1>
  <div class="txt">
  <label>First Name</label>
   <input type="text" name="user_Fname" value="<?php echo @$data['fname']; ?>"/>
  </div>
  <div class="txt">
  <label>Last Name</label>
   <input type="text" name="user_Lname" value="<?php echo @$data['lname']; ?>"/>
  </div>
  <div class="txt">
   <label>Username</label>
   <input type="text" name="login" value="<?php echo @$data['login']; ?>"/>
  </div>
   <div class="txt">
   <label>Email</label>
   <input type="email" name="user_email" value="<?php echo @$data['email']; ?>"/>
  </div>
   <div class="txt">
  <label>Phone</label>
   <input type="text" name="userPhone" value="<?php echo @$data['phone']; ?>"/>
  </div>
   <div class="txt">
   <label>Password</label>
   <input type="password" name="password" value="<?php echo @$data['password']; ?>"/>
  </div>
   <div class="txt">
   <label>Confirm password</label>
   <input type="password" name="password_2" value="<?php echo @$data['password_2']; ?>"/>
  </div>
  
  <button type="submit" class="btn-send"  name="do_signup">Register</button>  
  
</form>
<a  class="link_home_page" href="">Back  to Home Page</a>
 </div>

</main>
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>      
    </body>
</html>