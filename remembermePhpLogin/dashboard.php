<?php
session_start();
$name = $_SESSION['is_login'];

if (!isset($_SESSION['is_login'])){
    header('Location: index.php');
    die();
}
?>

<h2>Welcome <?= ucwords($name); ?></h2>
<a href="logout.php">Logout</a>
