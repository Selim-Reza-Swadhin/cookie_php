<?php
session_start();

session_destroy();

setcookie("emailcookie", '', time()-120);//120 second
//60*60*24*7*365
//60 min or 1 hrs * 60 second * 24 hrs or 1day * 7 day * 365 day or 1 year
setcookie("passwordcookie", '', time()-120);
header('Location: index.php');
