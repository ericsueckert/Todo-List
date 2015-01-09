<?php
/*
 * Eric Eckert CSE 154 AC
 * Remember the Cow
 * Logs user out and clears session data, redirects to start.php
 */
include 'common.php';
session_start();
lostRedirect();

//Clear session data
session_destroy();
session_regenerate_id(TRUE); 

header("Location: start.php");
?>

