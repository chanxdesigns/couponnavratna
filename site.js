/****-------------------------
 * Coupon Navratna
 * Made with Love by Chanx Singha
 *
 * <chanx.designs@gmail.com>
 * http://facebook.com/emokidchandra
 *--------------------------*/

function setTime () {
    var elem = document.querySelector('.left-time'),
        t = new Date();

    elem.innerHTML = t.toDateString() + " " + t.getHours()+":"+t.getMinutes()+":"+t.getSeconds();
}

setTime();