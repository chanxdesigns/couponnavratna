<?php

session_start();

include 'LoginClass.php';

if (!empty($_SESSION['username']) && !empty($_SESSION['password'])) {
    header('location: http://couponnavratna.com/admin/admin.php');
}
else {
    if (!empty($_POST)) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM admin WHERE username = "."'$username'"."AND password = "."'$password'";
        $login = new LoginClass();
        $res = $login->query($sql);

        if ($res) {
            $_SESSION['username'] = $res['username'];
            $_SESSION['password'] = $res['password'];
            header("location: http://couponnavratna.com/admin/admin.php");
        }
        else {
            echo "Login Failed";
        }
    }
    else {
        echo "Login details empty!!";
    }
}

?>

<!DOCTYPE html>
    <html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, max-scale=1">
    <link rel="stylesheet" href="../style.css">
    <title>Login Page</title>
</head>
<body>

<form class="form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
    <input type="text" class="form-input" name="username" placeholder="Enter username" required>
    <input type="password" class="form-input" name="password" placeholder="Enter password" required>
    <input type="submit" class="form-submit" value="Login">
</form>

</body>
</html>
