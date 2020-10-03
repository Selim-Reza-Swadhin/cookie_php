<?php
$password='1234';
$password_hash = password_hash($password, PASSWORD_DEFAULT);
echo 'Password hashing code = '.$password_hash;
echo '<br>';
echo 'Password hashing code lenght = '.strlen($password_hash);
echo '<br>';

$pass_decode = password_verify($password, $password_hash);
echo $pass_decode;//true or 1
echo '<br>';
print_r($pass_decode);//true or 1
echo '<br>';
var_dump($pass_decode);//true or 1
