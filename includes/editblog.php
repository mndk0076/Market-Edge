<?php
session_start();
$_SESSION['blog_id']="1";
if(!isset($_SESSION['blog_id'])){
    echo "<h1>LOGIN FIRST</h1>";
}
else
{
    require_once 'header_admin.php';
    require_once '../models/database.php';
    require_once '../models/blog.php';
    $id=$_SESSION['blog_id'];
    unset($_SESSION['blog_id']);
    $dbcon = Database::getDb();
    $b = new Blog();
    //$s = new Admin();
    $blog = $b->getBlogById($id, $dbcon);
    //$authors = $s->getAllAdmins($dbcon);

     echo "<div class=\"content\">" .
        "<main>" .
            "<div class=\"container-fluid\">" . 
                "<h1>Blog Create</h1>" .
                "<form action=\"bloglistAdmin.php\" method=\"post\">" .
                    "<div>" .
                        "<label>Blog Title:</label>" . 
                        "<input type=\"text\" value=\"" . $blog->title . "\" name=\"title\" />" .
                        "<input type=\"hidden\" name=\"sid\" value=\"" . $blog->id . "\" />" .
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