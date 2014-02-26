var cookieName = new Array('Skip1', 'Skip2');

function setCookie(index) {
    document.cookie = 'C' + (index + 1) + '=' + cookieName[index] + "; expires=Thursday, 31-Jan-2013 05:00:00 GMT";
}

function getCookie() {
    var theCookie = document.cookie.split(';');

    for(var i = 0; i < theCookie.length; i++) {
        switch(theCookie[i]) {
            case 'C1=Skip1':
                $('#skipBtn1').css('display', 'block');
                break;
            case 'C2=Skip2':
                $('#skipBtn1').css('display', 'block');
                $('#skipBtn2').css('display', 'block');
                break;
            default:
                break;
        }
    }
}