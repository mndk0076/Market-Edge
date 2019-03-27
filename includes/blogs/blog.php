<?php
include "../includes/header.php";

require_once '../models/database.php';
require_once '../models/blog.php';
require_once '../models/comments.php';

$dbcon = Database::getDb();
$s = new Blog();
$blogs =  $s->getAllBlogs(Database::getDb());
$blog_id="";
if(isset($_POST['comment']))
{
	$comment = $_POST['comment'];
	$blog_id = $_POST['blog_id'];
	$comment_date = date("d/m/Y");
	//echo $comment_date;
	$dbcon = Database::getDb();
	$c=new Comment();
	$c->addComment($comment, $comment_date, $blog_id, $dbcon);
}

?>
<link rel="stylesheet" href="../css/blog.css">
<main id="main" style="margin-right: 5px; margin-left: 5px">
<h1>Blog</h1>
<div class="row">
<?php
foreach($blogs as $blog)
{
	echo "<div class=\"col-sm-4\"> " .
					"<div class=\"card\">" . 
						"<div class=\"card-body\">" . 
							"<h5 class=\"card-title\">" . $blog->title . "</h5>" . 
					 		"<p class=\"card-text\">" . $blog->content . "</p>" .
						"</div>" .
						"<label>Comment: </label>" .
						"<form action = \"#\" method = POST >" .
							"<input type=\"hidden\" name=\"blog_id\" value =\"" . $blog->id . "\"/>" .
							"<input type=\"text\" name=\"comment\"></form>" ;
				$c = new Comment();
				$blogcomments =  $c->getCommentsByBlogId($blog->id, Database::getDb());
				//var_dump($blogcomments);
				if($blogcomments)
				{
					echo "<ul class=\"list-group list-group-flush\">" ;
					foreach($blogcomments as $blogcomment)
					{
						//echo $blogcomment;
							echo "<li class=\"list-group-item\">" . $blogcomment->comment . "</li>";
					}
					echo "</ul></div></div>" ;
				}
				else
				{
					echo "</div></div>" ;
				}

}
?>
	</div>
</main>
<!-- // 	  <div class="col-sm-4">
// 	    <div class="card">
// 	      <div class="card-body">
// 	        <h5 class="card-title">Special guidance on investment</h5>
// 	        <p class="card-text">Register for 5 day special workshop on investment. Great learning from big investors.</p>
// 	      </div>
// 	   		<label>Comment: </label><input type="text" name="comment">
// 	      <ul class="list-group list-group-flush">
// 		    <li class="list-group-item">That's amazing</li>
// 		    <li class="list-group-item">Priceless Workshop</li>
// 		  </ul>
// 	    </div>
// 	  </div>  -->
<?php
include "../includes/footer.php";