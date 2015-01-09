<?php
/*
 * Eric Eckert CSE 154 AC
 * Remember the Cow
 * Logs user in, recieves username and pass from start.php, checks them against
 * users.txt which contains the usernames and passwords of all users. If the user
 * does not exist, and the username and password are valid, creates a new account.
 * Then redirects to todolist.php.
 */

session_start();

//Get username and password, if they weren't entered redirect back to start.php
if (isset($_POST["name"]) && isset($_POST["password"])) {
    $name = $_POST["name"];
    $pass = $_POST["password"];
} else {
    header("Location: start.php");
}

$users = file("users.txt", FILE_IGNORE_NEW_LINES);
$newUser = true;

//Check if username exists
foreach ($users as $info) {
    $expand = explode(":", $info);
    list($listName, $listPass) = $expand;
    if ($name == $listName) {
        $newUser = false;
    }
}

//If new user validate name and write to file
if ($newUser) {
    //Verify if valid username/pass with regex
    if (preg_match("/^[a-z][a-z0-9]{2,7}$/", $name) && preg_match("/^[0-9].{4,11}\W$/", $pass)) {
        file_put_contents("users.txt", $name . ":" . $pass . "\n", FILE_APPEND);
        $_SESSION["user"] = $name;
    } 
} 
//If user exists verify pass
else {
    if ($pass == $listPass) {
        //Send session info if pass is correct
        $_SESSION["user"] = $name;
    } 
}

$filename = "todo_$name.txt";
$_SESSION["fileName"] = $filename;

//If user session is set direct to todolist.php
if (isset($_SESSION["user"])) {
    //Set new login time
    setcookie("loginDate", date("D y M d, g:i:s a"), mktime().time()+60*60*24*7);
    header("Location: todolist.php");
}
else {
    header("Location: start.php");
}

?>