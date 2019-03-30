<?php
require_once 'header_admin.php';
?>
        <div class="content">

            <main>
                <div class="container-fluid">

                    <h1>Blog Create</h1>
                    <form action="bloglistAdmin.php" method="post">
                      <div>
                      <label for="title">Blog Title:</label>
                      <input type="text" id="title" name="title" /><br/>
                      </div>
                      <div>
                      <label for="description">Blog Description:</label>
                      <input type="text" id="description" name="description" /><br/>
                      </div>
                      <div>
                      <input type="submit" value="submit" id="submit">
                      </div>
                    </form>
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