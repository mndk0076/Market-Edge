<?php
require_once '../models/database.php';
require_once '../models/blog.php';

$dbcon = Database::getDb();
$s = new Blog();
$blogs =  $s->getAllBlogs(Database::getDb());

if(isset($_POST['delete']))
{
    $id = $_POST['blog_id'];
    $count = $s->deleteBlog($id, $dbcon); 
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/trial.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Stock Market</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <button class="navbar-toggler sideMenuToggler" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="../includes/portfolio.php" target="_blank">Stock Market</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <a href="#" class="nav-link px-2 sideMenuToggler">
                <i class="fas fa-sliders-h icon"></i>
            </a>
            <form class="form-inline ml-auto">
                <input class="form-control form-control-dark w-100 search" type="text" placeholder="Search" aria-label="Search">
<!--                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
            </form>
            <ul class="navbar-nav ml-auto">
                <li>
                    <a class="nav-link" href="#" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-envelope icon"></i> <span class="badge badge-light">4</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="#" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell icon"></i> <span class="badge badge-light">4</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Welcome Admin!
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Welcome Admin</a>
                        <a class="dropdown-item" href="#">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Sign Out</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="wrapper d-flex">
        <div class="sideMenu bg-mattBlackLight">
            <div class="sidebar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link px-2">
                            <i class="fas fa-chart-bar icon"></i>
                            <span class="text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link px-2">
                            <i class="fas fa-users icon"></i>
                            <span class="text">Users</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link px-2">
                            <i class="fas fa-envelope icon"></i>
                            <span class="text">Messages</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../includes/bloglistAdmin.php" class="nav-link px-2">
                            <i class="fab fa-blogger-b icon"></i>
                            <span class="text">Blog</span></a>
                        <p>
                    </li>
                    <li class="nav-item">
                        <a href="../includes/events_admin.php" class="nav-link px-2">
                            <i class="fas fa-calendar-alt icon"></i>
                            <span class="text">Events</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../includes/faq_admin.php" class="nav-link px-2">
                            <i class="fas fa-question-circle icon"></i>
                            <span class="text">FAQ</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="content">

            <main>
                <div class="container-fluid">
                <div class="container-fluid">
                    <h1>Blogs</h1>
                    <a href="../includes/blogCreate.php" class="fas fa-cog"></a>
                    <table class="table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" >Title</th>
                                    <th scope="col"></th>
                                    <th scope="col">Publish Date</th>
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
                                                "<input type=\"hidden\" name=\"blog_id\" value =\"" . $blog->id . "\"/>" .
                                                "<input type=\"submit\" name=\"delete\" value=\"&#128465;\"/>" .
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