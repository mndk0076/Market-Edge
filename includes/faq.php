<?php
include "../includes/header.php"
?>
<link rel="stylesheet" href="../css/faqstyle.css">
    <main id="main">

         <div id="intro">
            <h1>FAQ</h1>

            <div class="displayedFAQ">
                <h2>A Subject Line</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Integer nec diam orci. Fusce at metus feugiat, faucibus nibh vitae, molestie erat. 
                    Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam maximus id odio quis 
                    sollicitudin. Curabitur pulvinar odio ex, ac sollicitudin lectus tempus id. Donec non 
                    consectetur enim, eu iaculis sapien. Sed sollicitudin placerat eleifend. Donec sit amet
                    mauris id tellus suscipit iaculis at ac nisl. Ut elementum ante sit amet porttitor auctor.
                    Pellentesque semper ante sit amet enim auctor, quis tempor neque tempus. Proin lobortis 
                    nunc eget egestas molestie. Cras congue sagittis pellentesque. 
                    Donec eget laoreet dui. Etiam eleifend, ex a suscipit lacinia, nisi leo ullamcorper nisi, 
                at cursus tellus mi consequat nisl.</p>


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
             
        <form action="faq.php" method="post">
                

            <div id="about">
                <h2>Your Contact Information</h2>
                <div id="firstname" class="faqInfo">
                    <label for="fname">First Name:</label>
                    <input type="text" name="fname" id="fname">
                    <span id="fnameErr"></span>
                </div>

                <div id="lastname" class="faqInfo">
                    <label for="lname">Last Name:</label>
                    <input type="text" name="lname" id="lname">
                    <span id="lnameErr"></span>
                </div>

                <div id="faqEmail" class="faqInfo">
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email">
                    <span id="emailErr"></span>
                </div>
            </div>

            <div id="questionDiv">
                <h2>Your Question</h2>
                <div id="quesTitle" class="faqInfo">
                    <label for="questiontitle">Subject:</label>
                    <select name="questiontitle" id="questiontitle">
                    <option value="default">Choose a Subject!</option>
                    <option value="portfolio">Portfolio</option>
                    <option value="stock">Stock</option>
                    <option value="general">General</option>
                    </select>
                    <span id="titleErr"></span> <!--camel case?-->
                </div>

                <div id="quesDescription" class="faqInfo">
                    <label for="questiondescription">Your Question:</label>
                    <input type="textarea" name="questiondescription" id="questiondescription">
                    <span id="descErr"></span> <!--Fix this -->
                </div>

            
                <input type="submit" value="submit" id="submit">
        </div>
        </form>
        
    </main>
    <?php
    include "../includes/footer.php";
    ?>