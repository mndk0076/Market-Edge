<?php
require_once "db.php";

 $data = $_POST;
 if (isset($data['do_login']))
 {
	 $errors = array();
	 $user + R::findOne('users', 'login = ?' ,array($data['login']));
	 
	 if ($user)
	 {
		 //login found check password
		 if(password_verify($data['password'], $user->password))
		 {
			 //user login
			 $_SESSION['logged_user'] = $user;
			 echo '<div style="color:green;">You are authorized!<br/>
			 You can go to the <a href="#">Home page</a></div><hr>';
		 }else{
			 $errors[] ='Password is not valid!';
		 }
		 
	 }else{
		 $errors[] ='User with this login not found!';
	 }
	 if( ! empty($errors))
	{
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
     <div class="login-form">

<form action="login.php" method="POST">
<h1>Log In</h1>
  <div class="txt">
   <label>Username</label>
   <input type="text" name="login" value="<?php echo @$data['login']; ?>">
  </div>
   <div class="txt">
   <label>Password</label>
   <input type="password" name="password" value="<?php echo @$data['password']; ?>">
   </div>
   <a class="forgot" href="">Forgot your username or password.</a>
   <button type="submit" class="btn-send" name="do_login">Sign In</button> 
</form>
<a  class="link_home_page" href="">Back  to Home Page</a>
</div>

</main>
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>      
    </body>
</html>