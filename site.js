/****-------------------------
 * Coupon Navratna
 * Made with Love by Chanx Singha
 *
 * <chanx.designs@gmail.com>
 * http://facebook.com/emokidchandra
 *--------------------------*/
function formatAMPM(date, ampmtrue) {
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? '0'+minutes : minutes;
    var strTime;
    if (ampmtrue) {
        strTime = hours + ':' + minutes + ' ' + ampm;
    }
    else {
        strTime = hours + ':' + minutes;
    }
    return strTime;
}

// Set Server Time/Date
function setTime () {
    var elem = document.querySelector('.left-time'),
        t = formatAMPM(new Date(), true);

    // elem.innerHTML = t.toDateString() + " " + t.getHours()+":"+t.getMinutes()+":"+t.getSeconds();
    elem.innerHTML = new Date().toDateString() + " " + t;
}

setTime();

// Set Site Time
function setSiteTime () {
    var elem = document.querySelector('#site-time'),
        t = new Date();
    elem.innerHTML = formatAMPM(new Date(), false)+ ":" + t.getSeconds();
    setInterval(setSiteTime,1000);
}
setSiteTime();

function couponDrawTime () {
    var t = new Date().getMinutes(),
        hours = new Date().getHours() % 12,
        ampm = new Date().getHours() >= 12 ? 'PM' : 'AM',
        coupontime,
        elem = document.querySelector('#drawtime');

    hours = hours ? hours : 12;

    if (t < 15) {
        coupontime = hours + ':' + 15;
    }
    else if (t >= 15 && t < 30) {
        coupontime = hours + ':' + 30;
    }
    else if (t >= 30 && t < 45) {
        coupontime = hours + ':' + 45;
    }
    else if (t >= 45 && t <= 59) {
        coupontime = (parseInt(hours) + 1) + ':' + '00';
    }
    elem.innerHTML = coupontime + ' ' + ampm;
}
couponDrawTime();

function couponDrawTimeTimer() {
    var t = new Date().getMinutes(),
        remMins;

    if (t < 15) {
        remMins = 15 - t;
    }
    else if (t >= 15 && t < 30) {
        remMins = 30 - t;
    }
    else if (t >= 30 && t < 45) {
        remMins = 45 - t;
    }
    else if (t >= 45 && t <= 59) {
        remMins = 59 - t;
    }
    return remMins * 60 * 1000;
}
setInterval(couponDrawTime, couponDrawTimeTimer());

function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            timer = duration;
        }
    }, 1000);
}

(function () {
    var duration,
        t = new Date().getMinutes();

    if (t < 15) {
        duration = 15 - t;
    }
    else if (t >= 15 && t < 30) {
        duration = 30 - t;
    }
    else if (t >= 30 && t < 45) {
        duration = 45 - t;
    }
    else if (t >= 45 && t <= 59) {
        duration = 59 - t;
    }
    duration = duration * 60;
    startTimer(duration, document.querySelector('#timeleft'));
})();

function revisit () {
    window.location = location.href;
}

function lastWonCoupon () {
    var hours = new Date().getHours();
    var t = new Date().getMinutes(),
        hours = hours % 12,
        ampm = hours >= 12 ? 'PM' : 'AM',
        lastcoupontime,
        elem = document.querySelector('#current-wins');

    if (t < 15) {
        lastcoupontime = hours ? hours - 1 : 12 + ":" + '00'
    }
    else if (t >= 15 && t < 30) {
        lastcoupontime = hours + ":" + '15';
    }
    else if (t >= 30 && t < 45) {
        lastcoupontime = hours + ":" + '30';
    }
    else if (t >= 45 && t <= 59) {
        lastcoupontime = hours + ":" + '45';
    }

    console.log(lastcoupontime);

    elem.innerHTML = lastcoupontime;
    setInterval(lastWonCoupon, couponDrawTimeTimer());
}
lastWonCoupon();

