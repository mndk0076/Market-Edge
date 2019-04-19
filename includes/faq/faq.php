<?php
include "../header.php";
?>

    <main id="faq_main">

         <div id="faq_intro">
            <h1>FAQ</h1>
            
            <ul class="list-group">
                <?php
                    include "./ListFAQApproved.php";
                ?>
            </ul>
            <h3>Have a Question You want to See in the FAQ?</h3>
            <p>Submit it Here!</p>
        </div>

        <?php
        include "./addFAQ.php";
        ?>

    </main>
    <?php
    include "../footer.php";
    ?>