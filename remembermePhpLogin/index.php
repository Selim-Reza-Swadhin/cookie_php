<?php
session_start();


$msg = "";

if (isset($_POST['submit'])) {
    //var_dump($_POST);
    //die();
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == 'selim' && $password == '123') {
        if (isset($_POST['remember'])) {
            setcookie("username", $username, time() + 60);//60 second
            //60*60*24*7*365
            //60 min or 1 hrs * 60 second * 24 hrs or 1day * 7 day * 365 day or 1 year
            setcookie("password", $password, time() + 60);

        } else {
            setcookie("username", $username, 60);
            setcookie("password", $password, 60);
        }

        $_SESSION['is_login'] = $username;
        header('Location: dashboard.php');
        die();
    } else {
        $msg = "$username Please enter valid login details.";
    }
}


$username_cookie = '';
$password_cookie = '';
$set_remember_cookie = '';
if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
    $username_cookie = $_COOKIE['username'];
    $password_cookie = $_COOKIE['password'];
    $set_remember_cookie = "checked='checked'";
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../animate.css/animate.css">
    <title>Title</title>
</head>
<body class="bg-danger">
<div class="container">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="page-body animated slideInUp">
        <div class="col-sm-12 col-md-6 col-sm-offset-3">
            <div class="panel">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" action="<?= htmlentities($_SERVER['PHP_SELF']); ?>"
                                  method="post">
                                <h5 class="mb-lg">To enjoy, PHP Cookie and Remember me.</h5>
                                <div class="form-group">
                                    <label for="email2" class="col-sm-2 control-label">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="email2" name="username"
                                               placeholder="Username" value="<?= $username_cookie; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password2" class="col-sm-2 control-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="password2" name="password"
                                               placeholder="Password" value="<?= $password_cookie; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember" <?= $set_remember_cookie; ?>>
                                                Remember me
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="submit" class="btn btn-primary" name="submit" value="Login">
                                    </div>
                                </div>
                            </form>
                            <h3 class="col-sm-offset-1" style="color: red;"><?= $msg; ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="../jquery/jquery-1.12.3.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>