/****-------------------------
 * Coupon Navratna
 * Made with Love by Chanx Singha
 *
 * <chanx.designs@gmail.com>
 * http://facebook.com/emokidchandra
 *--------------------------*/

function setHiddenTimes () {
    var hrs, mins, secs, hrsElem, hrsLong, minsElem, secsElem;

    hrs = new Date().getHours();
    mins = new Date().getMinutes();
    secs = new Date().getSeconds();

    hrsElem = document.querySelector('#hiddenCurrentHours');
    hrsLong = document.querySelector('#hiddenCurrentLongHours');
    minsElem = document.querySelector('#hiddenCurrentMinutes');
    secsElem = document.querySelector('#hiddenCurrentSeconds');

    hrsElem.value = hrs;
    hrsLong.value = hrs;
    minsElem.value = mins;
    secsElem.value = secs;
}
setHiddenTimes();

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

function clock() {
    var hours = document.getElementById("hiddenCurrentHours").value;
    var minutes = Number(document.getElementById("hiddenCurrentMinutes").value);
    var seconds = document.getElementById("hiddenCurrentSeconds").value;
    //for displaying double digit
    if (minutes <= 9) minutes = "0" + minutes;
    if (seconds <= 9) seconds = "0" + seconds;
    if (hours > 12) hours -= 12;
    //making sure seconds doesnt remain at 60 but automatically changes to 00 before displaying
    if (seconds == 60) seconds = 00;
    //not changing minutes cos changing elsewhere
    // minutes = Number(minutes) + 1;
    //making sure minutes doesnt remain at 60 but automatically changes the minutes to +1
    if (minutes == 60) minutes = 00;
    dispTime = hours + ":" + minutes + ":" + seconds;
    var basicclock = document.getElementById('basicclock');
    basicclock.innerHTML = dispTime;
    setTimeout("clock()", 1000);
}
// clock();

function clock2() {
    var hours = document.getElementById("hiddenCurrentLongHours").value;
    var minutes = Number(document.getElementById("hiddenCurrentMinutes").value);
    var seconds = document.getElementById("hiddenCurrentSeconds").value;
    var dispTime = "";
    if (((hours < 8) || (hours == 8) && (minutes < 30)) || (hours == 0)) {
        dispTime = "8:30 AM";
    }
    else {
        if ((hours >= 22) && (seconds > 0)) {
            dispTime = "Tomorrow";
        }
        else {
            var t = " AM";
            var a = minutes % 15;
            a = 15 - a;
            minutes += a;

            if (minutes == 60) {
                minutes = 0;
                hours = Number(hours) + Number(1);
            }
            //checking for hours to make it pm if require after increase hours above as per requirement
            if (hours == 12) t = " PM";
            if (hours > 12) {
                hours -= 12;
                t = " PM";
            }
            if (minutes <= 9) minutes = "0" + minutes;
            if (seconds <= 9) seconds = "0" + seconds;
            dispTime = hours + ":" + minutes + t;
        }
    }
    var basicclock = document.getElementById('basicclock2');
    basicclock.innerHTML = dispTime;
    setTimeout("clock2()", 1000);
}

function clock3() {
    var hours = document.getElementById("hiddenCurrentLongHours").value;
    var minutes = Number(document.getElementById("hiddenCurrentMinutes").value);
    var seconds = Number(document.getElementById("hiddenCurrentSeconds").value);
    var rems;
    dispTime = minutes + ":" + seconds;
    //if hours is before 9 am. greater than 0
    //how to avoid times like 6:45 ==first check all hours before 8
    //for 8:00 and 8:15 am =2nd check
    //for 24 hours =3rd check
    if (((hours < 8) || (hours == 8) && (minutes < 30)) || (hours == 0)) {

        dispTime = "starts 8:30";
    }
    // to let 8:15, 8:45,9am etc run properly

    else {
        if ((hours >= 22) && (seconds > 0)) {
            dispTime = "8:30 AM";
        }
        else {

            var remm = minutes;
            var l;
            if (minutes <= 14) {
                remm = minutes - 14;
                l = 0;
            }
            else {
                if (minutes <= 29) {
                    remm = minutes - 29;
                    l = 1;
                }
                else {
                    if (minutes <= 44) {
                        remm = minutes - 44;
                        l = 2;
                    }
                    else remm = minutes - 59;
                }
            }
            var rems = 60 - seconds;
            if (rems < 10) rems = "0" + rems;

            if ((remm == -14) && (rems == 60)) {
                dispTime = "00:00";
            }
            else {

                dispTime = remm + ":" + rems;
            }

        }
    }

    if ((dispTime == "00:00") || (dispTime == "0:00")) {
        location.reload(true);
    }

    if ((hours == 8) && (minutes == 29) && (seconds == 60)) {
        location.reload(true);
    }
    var basicclock = document.getElementById('basicclock3');
    //displaying of the time itself
    basicclock.innerHTML = dispTime;
    //by default increase time by 1 sec for next load
    document.getElementById("hiddenCurrentSeconds").value = Number(seconds) + Number(1);
    //increase current time by 1 min if 60 sec reached
    if (seconds == 60) {
        document.getElementById("hiddenCurrentMinutes").value = Number(minutes) + Number(1);
        //putting the values in the container for next load
        //second has to increase always no matter what the condition
        //   document.getElementById("hiddenCurrentSeconds").value = 01;
        document.getElementById("hiddenCurrentSeconds").value = 01;
    }
    else {
        //  document.getElementById("hiddenCurrentSeconds").value = Number(seconds) + Number(1);
    }
    //check if minutes has reached 60 or not if yes, increase corresponding hours
    if (minutes == 60) {
        //making sure hours doesnt become 24
        if (hours != 23) {
            hours = document.getElementById("hiddenCurrentHours").value = document.getElementById("hiddenCurrentLongHours").value = Number(hours) + Number(1);
            minutes = document.getElementById("hiddenCurrentMinutes").value = 00;
        }
        else {
            document.getElementById("hiddenCurrentHours").value = document.getElementById("hiddenCurrentLongHours").value = Number(00);
            document.getElementById("hiddenCurrentMinutes").value = 00;
        }
    }
    setTimeout("clock3()", 1000);
}

function LoadtheClocks() { clock(); clock2(); clock3(); }

