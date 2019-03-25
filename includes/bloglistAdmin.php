<?php
require_once '../models/database.php';
require_once '../models/blog.php';
require_once 'header_admin.php';

$dbcon = Database::getDb();
$s = new Blog();
$blogs =  $s->getAllBlogs(Database::getDb());

if(isset($_POST['delete']))
{
    $id = $_POST['blog_id'];
    $count = $s->deleteBlog($id, $dbcon); 
}

if(isset($_POST['edit']))
{
    $id = $_POST['blog_id'];
    session_start();
    $_SESSION['blog_id'] = $id;//SEssion create to store blog which needs to edit.
    //$_SESSION['admin_id']= "1"; //This is to store admin id in session and transfer it to editblog.php page. so that to store the admin id
    header("Location:http://localhost:8080/project-eagles/includes/editblog.php");
}
?>
        <div class="content">
            <main>
                <div class="container-fluid">
                    <h1>Blogs</h1>
                    <a href="../includes/blogCreate.php" class="fas fa-cog"></a>
                    <table class="table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col"></th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                foreach($blogs as $blog)
                                {
                                    echo "<tr>" .
                                            "<td>" . $blog->title . "</td>" .
                                            "<td></td>" .
                                            "<td>" . $blog->blog_date . "</td>" .
                                            "<td><form method=POST action=\"#\">" .
                                            "<button type='submit' name='delete'>" .
                                            "<i class='far fa-trash-alt'></i></button>" .   
                                            "<input type=\"hidden\" name=\"blog_id\" value =\"" . $blog->id . "\"/>" .
                                            "<td><form method=POST action=\"#\">" .
                                            "<input type=\"hidden\" name=\"blog_id\" value =\"" . $blog->id . "\"/>" .
                                            "<button type='submit' name='edit'>" .
                                            "<i class='far fa-edit'></i></button>" . 
                                            "<td><form method=POST action=\"#\">" .
                                            "<input type=\"hidden\" name=\"blog_id\" value =\"" . $blog->id . "\"/>" .
                                            "<input type=\"submit\" name=\"details\" value=\"VIEW\"/></form></td>" .
                                            "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

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