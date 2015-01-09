<!--
Eric Eckert CSE 154 AC
Remember the Cow
List page in which the user's items are displayed. The user may delete or add
items.
-->

<?php
include 'common.php';
session_start();
lostRedirect();

$filename = $_SESSION["fileName"];
if (!file_exists($filename)) {
    $handle = fopen($filename, "w+");
    fclose($handle);
}
$list = file($filename, FILE_IGNORE_NEW_LINES);
//Set login date
if (isset($_COOKIE["loginDate"])) {
    $date = $_COOKIE["loginDate"];
} else {
    $date = "";
}

heading();
?>

<div id="main">
    <h2><?= $_SESSION["user"] ?>'s To-Do List</h2>


    <ul id="todolist">
        <?php
        for ($i = 0; $i < sizeof($list); $i++) {
            ?>
            <li>
                <form action="submit.php" method="post">
                    <input type="hidden" name="action" value="delete" />
                    <input type="hidden" name="index" value="<?= $i ?>" />
                    <input type="submit" value="Delete" />
                </form>
                <?= $list[$i] ?>
            </li>
            <?php
        }
        ?>

        <li>
            <form action="submit.php" method="post">
                <input type="hidden" name="action" value="add" />
                <input name="item" type="text" size="25" autofocus="autofocus" />
                <input type="submit" value="Add" />
            </form>
        </li>

    </ul>

    <div>
        <a href="logout.php"><strong>Log Out</strong></a>
        <em>(logged in since <?= $date ?>)</em>
    </div>

</div>

<?php footer(); ?>
