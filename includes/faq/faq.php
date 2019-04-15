<?php
include "../header.php";
?>
<!--<link rel="stylesheet" href="../css/faqstyle.css">-->
    <main id="faq_main">

         <div id="faq_intro">
            <h1>FAQ</h1>

            <?php
                include "./ListFAQApproved.php";
            ?>

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