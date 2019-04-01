<?php
include "../header.php";
?>
<link rel="stylesheet" href="../css/faqstyle.css">
    <main id="main">

         <div id="intro">
            <h1>FAQ</h1>

            <?php
                include "./ListFAQapproved.php";
            ?>

                <h3>Have a Question You want to See in the FAQ?</h3>
                <p>Submit it Here!</p>
            </div>
            </div>
                <!--<p>
                <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Toggle first element</a>
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Toggle second element</button>
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">Toggle both elements</button>
                </p>
                <div class="row">
                    <div class="col">
                        <div class="collapse multi-collapse" id="multiCollapseExample1">
                        <div class="card card-body">
                        Our First FAQ
                        </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="collapse multi-collapse" id="multiCollapseExample2">
                        <div class="card card-body">
                        Our Second FAQ
                        </div>
                        </div>
                    </div>
                </div>-->
<!-- My scripts weren't working so I made the content without bootstrap for now and will update once the scripts are fixed-->

        <?php
        include "./addFAQ.php";
        ?>

    </main>
    <?php
    include "../footer.php";
    ?>