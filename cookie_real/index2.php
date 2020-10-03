<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'library_management_system_lms');

if (isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email_search = "SELECT * FROM students WHERE email='$email' or username='$email'";
    $query = mysqli_query($conn, $email_search);
    $email_count = mysqli_num_rows($query);

    if ($email_count == 1){
        $email_pass = mysqli_fetch_assoc($query);
        $db_pass = $email_pass['password'];

        $_SESSION['username'] = $email_pass['username'];
        $pass_decode = password_verify($password, $db_pass);
        
        if ($pass_decode){

            if ($email_pass['status'] == 1){

                if (isset($_POST['rememberme'])){
                    setcookie("emailcookie", $email, time()+120);//120 second
                    //60*60*24*7*365
                    //60 min or 1 hrs * 60 second * 24 hrs or 1day * 7 day * 365 day or 1 year
                    setcookie("passwordcookie", $password, time()+120);
                    header('Location: home.php');
                    exit();
                }else{
                    //show logout.php
                    //setcookie("emailcookie", $email, time()-60);//60 second
                    //setcookie("passwordcookie", $password, time()-60);
                    header('Location: home.php');
                    exit();
                }
            }else{
                $error = "$email Your status not active";
            }
            
        }else{
            $error = "$password Password invalid!";
        }
    }else{
        $error = "$email not found!";
    }
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

                    <!-- Login error message-->
                    <?php
                    if (isset($error)) {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $error; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php } ?>


                    <div class="col-md-12">
                        <form class="form-horizontal" action="<?= htmlentities($_SERVER['PHP_SELF']);?>" method="post">
                            <h5 class="mb-lg">To enjoy, PHP Real Cookie!</h5>
                            <div class="form-group">
                                <label for="email2" class="col-sm-2 control-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="email2" name="email" placeholder="Username" value="<?php if (isset($_COOKIE['emailcookie'])){echo $_COOKIE['emailcookie'];}?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password2" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="password2" name="password" placeholder="Password" value="<?php if (isset($_COOKIE['passwordcookie'])){echo $_COOKIE['passwordcookie'];} ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="rememberme" <?php if (isset($_COOKIE['emailcookie'])){echo "checked='checked'";}?> > Remember me
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