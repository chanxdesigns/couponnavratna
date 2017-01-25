<?php

session_start();

if (!empty($_SESSION['username']) && !empty($_SESSION['password'])) {
    header('location: http://www.google.com');
}
else {
    if (!empty($_POST)) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        define('DB_NAME', 'couponnavratna');
        define('DB_USER', 'root');
        define('DB_PASS', '');
        define('DB_HOST', 'localhost');

        $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        if (mysqli_connect_errno()) {
            die('Connection failed');
        }
        //$data = mysqli_query($conn, "SELECT username FROM admin WHERE `username` = $username AND `password` = $password");
        //var_dump(mysqli_fetch_assoc($data));
    }
    else {

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
