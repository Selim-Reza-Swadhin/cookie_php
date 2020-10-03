<?php
session_start();
if (isset($_SESSION['userName'])){
    $name = ucwords($_SESSION['userName']);
}
echo "<h2>Welcome $name.</h2>";
?>
<a href="logout.php">Logout</a>
