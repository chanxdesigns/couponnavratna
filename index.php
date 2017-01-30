<?php

    include 'admin/LoginClass.php';

    $query = "SELECT * FROM winning_coupons ORDER BY id DESC LIMIT 1";
    $get_coupon = new LoginClass();
    $coupon = $get_coupon->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Navratna Coupon, Golden Star Navratna Coupon is an online lottery & coupon redemption site.">
    <meta name="keywords" content="Navratana Coupon, Online Lottery, Coupon Redemption, India, Top Lottery, Golden Star">
    <link rel="stylesheet" href="style.css">
    <title>Navratna Coupon - Welcome to Navratna Coupon</title>
</head>
<body onload="window.setTimeout('LoadtheClocks()', 1000);">

<div class="container">
    <div class="main-body">
        <div class="scrolling-text">
            <marquee>
                <p style="margin: 0; color: black; font-weight: bold">Welcome Guest Player ....</p>
                <p style="margin: 0; color: yellow; font-weight: bold">Navratna Coupon</p>
            </marquee>
        </div>

        <div class="pull-left">
            <p class="time"><strong>Server Time: </strong><span class="left-time"></span></p>
            <p class="balance"><strong>Balance Points 0</strong></p>
            <div class="left-body">
            <a onclick="revisit()" href="" class="buttons white pull-left">Bulk Coupons</a>
            <a onclick="revisit()" href="" class="buttons blue pull-left">Pointwise Coupons</a>
            <a onclick="revisit()" href="" class="buttons blue pull-left">Loose Coupons</a>
            <a onclick="revisit()" href="" class="buttons blue pull-left last">LoosePoints Wise</a>
            </div>
        </div>
        <div class="pull-right">
            <div class="right-body">
            <a class="logout">Logout</a>
                <div class="text-body">
                    <p class="text site-time"><strong>Site Time: <span id="basicclock"></span></strong></p>
                    <p class="text">Coupon Draw Time: <span id="basicclock2"></span></p>
                    <p class="text">Time Left for Draw: <span id="basicclock3"></span></p>
                </div>
            </div>
        </div>

        <!--<iframe src="https://docs.google.com/spreadsheets/d/1OuG2CsJJrN1DsUaefqK5JRW25IQI6qD4rGTUBhKk4O0/pubhtml?widget=true&amp;headers=false"></iframe>-->
        <div class="table">
            <table class="main">
                <tr>
                    <th class="coupon-name">Coupon Name</th>
                    <th class="win">Win</th>
                    <th class="numbers">00-09</th>
                    <th class="numbers">10-19</th>
                    <th class="numbers">20-29</th>
                    <th class="numbers">30-39</th>
                    <th class="numbers">40-49</th>
                    <th class="numbers">50-59</th>
                    <th class="numbers">60-69</th>
                    <th class="numbers">70-79</th>
                    <th class="numbers">80-89</th>
                    <th class="numbers">90-99</th>
                    <th class="qty">Qty.</th>
                    <th class="points">Points</th>
                    <th id="current-wins"><?php echo $coupon['time']; ?></th>
                </tr>
                <tr>
                    <td class="coupon-name">Navratna Coupon</td>
                    <td class="win-text">100</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td>0</td>
                    <td>0</td>
                    <td id="navratna-win"><?php echo $coupon['navratna']; ?></td>
                </tr>
                <tr>
                    <td class="coupon-name">Punjab Coupon</td>
                    <td class="win-text">100</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td>0</td>
                    <td>0</td>
                    <td id="punjab-win"><?php echo $coupon['punjab']; ?></td>
                </tr>
                <tr>
                    <td class="coupon-name">Satyam Coupon</td>
                    <td class="win-text">100</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td>0</td>
                    <td>0</td>
                    <td id="satyam-win"><?php echo $coupon['satyam']; ?></td>
                </tr>
                <tr>
                    <td class="coupon-name">Jackpot Coupon</td>
                    <td class="win-text">100</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td>0</td>
                    <td>0</td>
                    <td id="jackpot-win"><?php echo $coupon['jackpot']; ?></td>
                </tr>
            </table>
            <table class="total">
                <tr>
                    <td class="total-text">Total</td>
                    <td class="total-qty"></td>
                    <td class="total-points"></td>
                    <td class="total-win"></td>
                </tr>
            </table>
            <table class="login">
                <tr>
                    <td class="card-no">
                        <label>Card No:</label>
                        <input type="text">
                    </td>
                    <td class="pin-no">
                        <label>Pin No:</label>
                        <input type="text">
                    </td>
                    <td class="login-button">
                        <button onclick="revisit()" >Login</button>
                    </td>
                </tr>
            </table>
        </div>

        <!-- Footer Buttons -->
        <div class="footer">
            <a onclick="revisit()" href="" class="buttons green pull-left">BUY</a>
            <a onclick="revisit()" href="" class="buttons red pull-left">CLEAR</a>
            <a onclick="revisit()" href="" class="buttons red pull-left">CURR COUPON</a>
            <a onclick="revisit()" href="" class="buttons red pull-left">MORE COUPON</a>
            <a onclick="revisit()" href="" class="buttons red pull-left">CANCEL</a>
            <a onclick="revisit()" href="" class="buttons red pull-left">YANTRA</a>
            <a onclick="revisit()" href="" class="buttons red pull-left no-margin">REPORT</a>
            <div class="clearfix"></div>
            <br>
            <br>
            <p class="footer-text">For Yantra Code:- Reach us couponnavratna@gmail.com</p>
            <p class="footer-text small">Copyright @ 2015 www.couponnavratna.com All rights reserved.</p>
        </div>

    </div>

    <div class="hidden-forms">
        <input type="hidden" name="hiddenCurrentHours" id="hiddenCurrentHours" value="12" />
        <input type="hidden" name="hiddenCurrentLongHours" id="hiddenCurrentLongHours" value="12" />
        <input type="hidden" name="hiddenCurrentMinutes" id="hiddenCurrentMinutes" value="12" />
        <input type="hidden" name="hiddenCurrentSeconds" id="hiddenCurrentSeconds" value="12" />
        <input type="hidden" name="hiddenIsAMorPM" id="hiddenIsAMorPM" />
        <input type="hidden" name="hdnAdjustTimeMinute" id="hdnAdjustTimeMinute" value="0" />
    </div>
</div>
<script src="date.js"></script>
<script src="site.js"></script>
</body>
</html>