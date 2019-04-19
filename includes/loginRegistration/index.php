<?php
require_once "../../config_test.php";
require_once "database.php";

?>
<?php if (isset($_SESSION['logged_user'])):?>
Authorised ! <br>

Hello <?php echo $_SESSION['logged_user']->fname;?>!

<hr>

<a href="logout.php">Sign Out</a>

<?php else :?>
    You are not authorized!<br>
    <a href= "login.php">Sign In</a><br>
    <a href="register.php">Sign Up</a>
<?php endif;?>