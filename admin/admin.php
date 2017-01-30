<?php

session_start();

include 'LoginClass.php';

if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    header('location: http://couponnavratna.com/admin/login.php');
}
else {
    if (!empty($_POST)) {
        $newtime = $_POST['time'];
        $navratna = $_POST['navratna'];
        $punjab = $_POST['punjab'];
        $satyam = $_POST['satyam'];
        $jackpot = $_POST['jackpot'];

        $sql = "INSERT INTO winning_coupons ("."`newtime`, `navratna`, `punjab`, `satyam`, `jackpot`".") VALUES ("."'$newtime','$navratna','$punjab','$satyam','$jackpot'".")";
        $entry = new LoginClass();
        $entry->insert($sql);

    }
}

?>

<!DOCTYPE html>
    <html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, max-scale=1">
        <link rel="stylesheet" href="../style.css">
        <title>Admin Page</title>
    </head>
<body>
<form class="form" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
    <input class="form-input" type="text" name="time" placeholder="Enter Time">
    <input class="form-input" type="number" name="navratna" placeholder="Enter Navratna Coupon Number">
    <input class="form-input" type="number" name="punjab" placeholder="Enter Punjab Coupon Number">
    <input class="form-input" type="number" name="satyam" placeholder="Enter Satyam Coupon Number">
    <input class="form-input" type="number" name="jackpot" placeholder="Enter Jackpot Coupon Number">
    <input type="submit" class="form-submit" value="Submit">
</form>
</body>
</html>
