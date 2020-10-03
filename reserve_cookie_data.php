<?php
//read cookie and assign cookie values
//to PHP variable
if (isset($_POST['submit'])){
    //delete previous cookie
    setcookie('shirt_color', '', -1, '/');
    setcookie('size', '', -1, '/');
    setcookie('brand', '', -1, '/');
    setcookie('type', '', -1, '/');

    $ret1 = (isset($_POST['shirt_color'])) ? setcookie('shirt_color', $_POST['shirt_color'], time()+60, '/') : null;
    $ret2 = (isset($_POST['size'])) ? setcookie('size', $_POST['size'], time()+60, '/') : null;//60s
    $ret3 = (isset($_POST['brand'])) ? setcookie('brand', $_POST['brand'], time()+60, '/') : null;
    $ret4 = (isset($_POST['type'])) ? setcookie('type', $_POST['type'], time()+60, '/') : null;
}
$shirt_color = isset($_COOKIE['shirt_color']) ? $_COOKIE['shirt_color'] : array();
$size = isset($_COOKIE['size']) ? $_COOKIE['size'] : array();
$brand = isset($_COOKIE['brand']) ? $_COOKIE['brand'] : '';
$type = isset($_COOKIE['type']) ? $_COOKIE['type'] : array();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your Shirt Selection</title>
</head>
<body>
<h2>Saving and Restoring Buyer Choice</h2>
<h3>Set Your Preference</h3>
<?php
//if form submitted
//display success message
if (isset($_POST['submit'])){?>
Thank you for your submission.
    <br>
    <br>
    <br>
    Your Shirt Preferences:
    <br>
    <ul>
        <li>Shirt Color : <b><?php echo isset($_COOKIE['shirt_color']) ? ucfirst($_COOKIE['shirt_color']) : ''; ?></b></li>
        <li>Shirt Size : <b><?php echo isset($_COOKIE['size']) ? ucfirst($_COOKIE['size']) : ''; ?></b></li>
        <li>Shirt Brand : <b><?php echo isset($_COOKIE['brand']) ? ucfirst($_COOKIE['brand']) : ''; ?></b></li>
        <li>Sleeve Type : <b><?php echo isset($_COOKIE['type']) ? ucfirst($_COOKIE['type']) : ''; ?></b></li>
    </ul>
    <br>
    <hr>
    <a href="">Back to Form</a>
<?php
//if form not submitted display form
}else{
    $shirt_color = isset($_COOKIE['shirt_color']) ? $_COOKIE['shirt_color'] : array();
    $size = isset($_COOKIE['size']) ? $_COOKIE['size'] : array();
    $brand = isset($_COOKIE['brand']) ? $_COOKIE['brand'] : '';
    $type = isset($_COOKIE['type']) ? $_COOKIE['type'] : array();
    ?>
    <form action="" method="post">
        Shirt Color : <br>
        <input type="radio" name="shirt_color" value="red" <?php echo ($shirt_color == 'red') ? 'checked' : '';?> > Red
        <input type="radio" name="shirt_color" value="blue" <?php echo ($shirt_color == 'blue') ? 'checked' : '';?> > Blue
        <input type="radio" name="shirt_color" value="black" <?php echo ($shirt_color == 'black') ? 'checked' : '';?> > Black
        <input type="radio" name="shirt_color" value="white" <?php echo ($shirt_color == 'white') ? 'checked' : '';?> > White
        <p>
            Shirt Size : <br>
            <input type="radio" name="size" value="s" <?php echo ($size == 's') ? 'checked' : '';?> > S
            <input type="radio" name="size" value="m" <?php echo ($size == 'm') ? 'checked' : '';?> > M
            <input type="radio" name="size" value="l" <?php echo ($size == 'l') ? 'checked' : '';?> > L
        </p>
        <p>
            Shirt Brand : <br>
            <input type="text" size="20" name="brand" value="<?php echo $brand; ?>">
        </p>
        <p>
            Sleeve Type : <br>
            <input type="radio" name="type" value="half" <?php echo ($type == 'half') ? 'checked' : '';?> > Half
            <input type="radio" name="type" value="full" <?php echo ($type == 'full') ? 'checked' : '';?> > Full
        </p>
        <input type="submit" name="submit" value="Submit">
    </form>
<?php } ?>
</body>
</html>
