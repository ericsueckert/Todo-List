<?php
/*
 * Eric Eckert CSE 154 AC
 * Remember the Cow
 * File containing php functions in order to reduce redundancy
 */

//writes the heading for each file with html
function heading() {
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8" />
            <title>Remember the Cow</title>
            <link href="https://webster.cs.washington.edu/css/cow-provided.css" type="text/css" rel="stylesheet" />
            <link href="cow.css" type="text/css" rel="stylesheet" />
            <link href="https://webster.cs.washington.edu/images/todolist/favicon.ico" type="image/ico" rel="shortcut icon" />
        </head>

        <body>
            <div class="headfoot">
                <h1>
                    <img src="https://webster.cs.washington.edu/images/todolist/logo.gif" alt="logo" />
                    Remember<br />the Cow
                </h1>
            </div>
<?php
}

 //writes the footer for each file with html
function footer() {
            ?>
            <div class="headfoot">
                <p>
                    <q>Remember The Cow is nice, but it's a total copy of another site.</q> - PCWorld<br />
                    All pages and content &copy; Copyright CowPie Inc.
                </p>

                <div id="w3c">
                    <a href="https://webster.cs.washington.edu/validate-html.php">
                        <img src="https://webster.cs.washington.edu/images/w3c-html.png" alt="Valid HTML" /></a>
                    <a href="https://webster.cs.washington.edu/validate-css.php">
                        <img src="https://webster.cs.washington.edu/images/w3c-css.png" alt="Valid CSS" /></a>
                </div>
            </div>
        </body>
    </html>
    <?php
}

//If user has not logged in, redirects to start.php
function lostRedirect() {
    if (!isset($_SESSION["user"])) {
        header("Location: start.php");
    }
}
?>

