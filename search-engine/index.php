<?php

/*  CONFIG*/
include("includes/config.php");
/*   END CONFIG */

/*  FUNCTIONS  */
include("includes/functions.php");
/*   END FUNCTIONS */

/*  SEARCH CLASS  */
include("classes/search.class.php");
/*   END SEARCH CLASS */
?>

<!DOCTYPE html>

<html>

<head lang="en">

    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/widget.css">
    <title>Search engine</title>

</head>

    <body>
        <div class="container-fluid">

            <div id="instructions">

               <h2>Instructions:</h2>

                <ol>
                <li>git test</li>
                    <li>Select the source you want to search in.</li>
                    <li>Please copy and paste the URL or type text in the textarea.</li>
                    <li>Enter the keyword you want to find.</li>
                    <li>Click on the search button.</li>
                </ol>

            </div><!--INSTRUCTIONS-->

            <?php
            /*    WIDGET */
            include("views/widget.php");
            /*    END WIDGET */
            ?>

        </div>

        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <script src="js/main.js" ></script>
    </body>

</html>