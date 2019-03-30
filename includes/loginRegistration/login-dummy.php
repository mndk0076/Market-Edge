<?php

//DUMMY LOGIN FOR ACCESSING THE PAGES FOR USERS
session_start();

if(isset($_POST['submit'])){

    $username = $_POST['user'];
	$password = $_POST['pass'];

    $dbUser = 'root';
	$dbPass = '1234';

    if($username == $dbUser && $password == $dbPass){
        $_SESSION['username'] = $dbUser;
        $_SESSION['password'] = $dbUser;
        header("Location:gainers-losers-public.php");
    }
    else{
       echo "Invalid Login Credentials";
    }
}

?>

<?php require_once '../includes/header.php'; ?>

<!-- TEMPORARY LOGIN FORM FOR USER TO BE LOGGED INAND ACCESS THE PAGES FOR PUBLIC AND ADMIN PAGES-->

<h1>Login</h1>
<div class="container">
    <div class="row">
        <form action="" method="post">
            <div id="">
				<p>*Note: This is temporary login while login feature still on the process, the user and pass provided on the placeholder of input text</p>
				<label for="user">Username</label>
                <input type="text" name="user"  placeholder="username = root"/><br/><br/>
				<label for="pass" >Password</label>
                <input type="text" name="pass" placeholder="password = 1234"/><br/><br/>
                <input name="submit" type="submit" value="submit" id="submit">
            </div>
        </form>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
