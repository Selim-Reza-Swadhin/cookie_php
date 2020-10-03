<?php
session_start();
unset($_SESSION['is_login']);//all session remove from site
session_destroy();
header('Location: index.php');
die();
