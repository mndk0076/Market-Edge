<?php
    require_once "../../userSession.php";
    include "../header.php";

?>
<!--For some reason some of the CSS styling won't fully load unless you do a hard refresh-->
<main id="eventMain">
    <h1 id="eventH1">Our Upcoming Events</h1>

    <ul class="list-group">
        <?php
            require_once 'listEventClient.php';
        ?>
    </ul>
</main>

<?php
    include "../footer.php";