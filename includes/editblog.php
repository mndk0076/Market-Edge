<?php
session_start();
$_SESSION['blog_id']="1";
if(!isset($_SESSION['blog_id'])){
    echo "<h1>LOGIN FIRST</h1>";
}
else
{
    $page_head = "Edit Blog";
    require_once 'header_admin.php';
    require_once '../models/database.php';
    require_once '../models/blog.php';
    $blog_id=$_SESSION['blog_id'];
    unset($_SESSION['blog_id']);
    $dbcon = Database::getDb();
    $b = new Blog();
    $blog = $b->getBlogById($id, $dbcon);

    if(isset($_POST['update'])){
        $id= $_POST['blog_id'];
        $title = $_POST['title'];
        $title=filter_var($title, FILTER_SANITIZE_STRING);
        $content = $_POST['content'];
        $content=filter_var($content, FILTER_SANITIZE_STRING);
        $blog_date = date("Y/m/d"); 
        $user_id=1;
    
        $db = Database::getDb();
        $s = new Blog();
        $c = $s->updateBlog($id, $title, $content, $blog_date, $user_id, $db);
        header("Location: bloglistAdmin.php");
    }

     $editform = "<div class=\"content\">" .
        "<main>" .
            "<div class=\"container-fluid\">" . 
                "<h1>Blog EDIT</h1>" .
                "<form method=\"post\">" .
                    "<div>" .
                        "<label>Blog Title:</label>" . 
                        "<input type=\"text\" value=\"" . $blog->title . "\" name=\"title\" />" .
                        "<input type=\"hidden\" name=\"blog_id\" value=\"" . $blog->id . "\" />" .
                    "</div><br/>" .
                    "<div>" .
                        "<label>Blog Content:</label>" . 
                        "<textarea name=\"content\" id=\"blog_content\" >" .  $blog->content . "</textarea>" .
                    "</div><br/>" .
                    "<div>" .
                        "<input type=\"submit\" name=\"update\" value=\"UPDATE\">" .
                    "</div>" .
                "</form>" .
            "</div>" .
        "</main>" .
    "</div>" .
"</div>" ;
}

?>
       <?php echo $editform; 
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