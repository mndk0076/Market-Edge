<?php
require_once '../../config.php';

require_once   $modelspath . "database.php";
require_once   $modelspath . "blogs/blog.php";

session_start();
if(!isset($_SESSION['blog_id'])){
    header("Location: ". $includepath . "loginRegistration/login.php");
}
else
{
    $page_head = "Edit Blog";
    
    require_once   $modelspath . "database.php";
    require_once   $modelspath . "blogs/blog.php";
    
    $blog_id=$_SESSION['blog_id'];
    //unset($_SESSION['blog_id']);
    $dbcon = Database::getDb();
    $b = new Blog();
    $blog = $b->getBlogById($blog_id, $dbcon);

       // header("Location: " . $includepath ."blogs/bloglistAdmin.php");
    $details = " <div class=\"content\"><main><div class=\" jumbotron jumbotron-fluid \"> ".
                    "<div class=\"container\">" .
                    "<h1 class=\"display-4\">" . $blog->title . "</h1><p class=\"lead\">" . $blog->content . "</p></div>" .
            "<button type=\"submit\" class=\"btn btn-primary\"><a style=\"text-decoration:none;\"  href=\"" . $includepath ."blogs/bloglistAdmin.php\" name='Back'>Back</a></button> </div></main></div>";
require_once   $includepath . "header_admin.php";
}

?>
       <?php echo $details; 
       ?>
    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery.slimscroll.min.js"></script>
    <script src="../js/trial.js"></script>
</body>

</html>