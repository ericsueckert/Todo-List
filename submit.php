<?php
/*
 * Eric Eckert CSE 154 AC
 * Remember the Cow
 * When user adds or deletes from list, submit.php recieves the info and alters
 * the list and file accordingly, then redirects back to todolist.php
 */
include 'common.php';
session_start();
lostRedirect();

//$username = $_SESSION["user"];
$filename = $_SESSION["fileName"];
$list = file($filename, FILE_IGNORE_NEW_LINES);

//If user chooses to delete 
if ($_POST["action"] == "delete") {
    //If index passed is out of bounds, die
    if (!isset($_POST["index"])) {
        die();
    }
    unset($list[$_POST["index"]]);
    file_put_contents($filename, implode("\n", $list));
}

//If user addds item, add item
if ($_POST["action"] == "add") {
    file_put_contents($filename, $_POST["item"] . "\n", FILE_APPEND);
}

//when done, redirect
header("Location: todolist.php");
?>