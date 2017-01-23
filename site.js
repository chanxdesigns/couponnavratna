/****-------------------------
 * Coupon Navratna
 * Made with Love by Chanx Singha
 *
 * <chanx.designs@gmail.com>
 * http://facebook.com/emokidchandra
 *--------------------------*/
function formatAMPM(date) {
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? '0'+minutes : minutes;
    var strTime = hours + ':' + minutes + ' ' + ampm;
    return strTime;
}

function setTime () {
    var elem = document.querySelector('.left-time'),
        t = formatAMPM(new Date());

    // elem.innerHTML = t.toDateString() + " " + t.getHours()+":"+t.getMinutes()+":"+t.getSeconds();
    elem.innerHTML = new Date().toDateString() + " " + t;
}

setTime();