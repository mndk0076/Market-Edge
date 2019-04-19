<?php
    require_once '../../models/database.php';
    require_once '../../models/events/Event_class.php';
    require_once '../../Validation/validation.php'; 

    if(isset($_POST['update'])){
        $id = $_POST['id'];

        $db = Database::getDb();
        $updEvent = new Event();
        $event = $updEvent->getEventByID($id, $db);

    }

    $titleErr = "";
    $descErr = "";
    $dateErr = "";
    $locaErr = "";
    $isValid = true;
  
  
    $title = $description = $date = $location = "";

    if(isset($_POST['updevent'])){

        $id = $_POST['eid'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $image = $_POST['image'];//This can be Null
        $date = $_POST['event_date'];
        $location = $_POST['location'];

        if(checkEmpty($title)){
            $titleErr = " Please Enter the Event Title";
            $isValid = false;
          }
        if(checkEmpty($description)){
            $descErr = " Please Enter the Event Description";
            $isValid = false;
          }
        if(checkEmpty($date)){
            $dateErr = " Please Enter the Event Date";
            $isValid = false;
        }
        if(checkEmpty($location)){
            $locaErr = " Please Enter the Event Location";
            $isValid = false;
          }
        
        if($isValid === true){

            $db = Database::getDb();
            $updEvent = new Event();
            $count = $updEvent->updateEvent($id, $title, $description, $image, 
                $date, $location, $db);

            if($count){
                header("Location: eventsAdmin.php");
            }
        }
    }

?>


<form action="" method="post">
    <input type="hidden" name="eid" value="<?= $event->id; ?>" />
        <div id="eventForm">

            <div id="eventtitle">
                <label for="title">Event Title:</label>
                <input type="text" id="title" name="title" value=
                "<?=$event->title; ?>" /><br/>
                <span id="titleErr" style="color:red;">
                    <?php
                        if(isset($titleErr)) {
                            echo $titleErr;
                                    }
                    ?>
                </span>
            </div>
            <div id="eventDescription">
                <label for="description">Event Description:</label>
                <input type="text" id="description" name="description" value=
                "<?=$event->description; ?>" /><br/>
                <span id="descErr" style="color:red;">
                    <?php
                        if(isset($descErr)) {
                            echo $descErr;
                                    }
                    ?>
                </span>
            </div>
            <div id="eventImage">
                <label for="image">Image Pathway:</label>
                <input type="text" id="image" name="image" value=
                "<?=$event->image; ?>"/><br/> 
            </div>
            <div id="date">
                <label for="event_date">Event Date:</label>
                <input type="text" id="event_date" name="event_date" value=
                "<?=$event->event_date; ?>" /><br/>
                <span id="dateErr" style="color:red;">
                    <?php
                        if(isset($dateErr)) {
                            echo $dateErr;
                                    }
                    ?>
                </span>
            </div>
            <div id="loca">
                <label for="location">Event Location:</label>
                <input type="text" id="location" name="location" value=
                "<?=$event->location; ?>" /><br/>
                <span id="locaErr" style="color:red;">
                    <?php
                        if(isset($locaErr)) {
                            echo $locaErr;
                                    }
                    ?>
                </span>
            </div>
                <input type="submit" name="updevent" value="update event" id="submit">
        </div>
</form>
