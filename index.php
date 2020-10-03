<?php
if (isset($_POST['btnLogin'])){
    $username = $_POST['txtUser'];
    $password = $_POST['txtPass'];
    if (isset($_POST['chkRemember'])){
        setcookie("userr", $username, time()+60);//60 second
        //60*60*24*7*365
        //60 min or 1 hrs * 60 second * 24 hrs or 1day * 7 day * 365 day or 1 year
        setcookie("passs", $password, time()+60);
        header('Location: success.php?cookie-added=success');

    }else{
        setcookie("userr", $username, time()-60);
        setcookie("passs", $password, time()-60);
        header('Location: success.php?cookie-remove=success');
    }
}

function setValue($field){
    if (isset($_COOKIE[$field])){
        echo $_COOKIE[$field];
    }
}

function setChecked($field){
    if (isset($_COOKIE[$field])){
        echo "checked='checked'";
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="./animate.css/animate.css">
    <title>Title</title>
</head>
<body class="bg-success">
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
                        <form class="form-horizontal" action="<?= htmlentities($_SERVER['PHP_SELF']);?>" method="post">
                            <h5 class="mb-lg">To enjoy, PHP Cookie!</h5>
                            <div class="form-group">
                                <label for="email2" class="col-sm-2 control-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="email2" name="txtUser" placeholder="Username" value="<?php setValue("userr"); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password2" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="password2" name="txtPass" placeholder="Password" value="<?php setValue("passs"); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="chkRemember" <?php setChecked("userr");?>> Remember me
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input type="submit" class="btn btn-primary" name="btnLogin" value="Login">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="./jquery/jquery-1.12.3.min.js"></script>
<script src="./bootstrap/js/bootstrap.min.js"></script>
</body>
</html>