
$(window).load(init);

function init() {
    PopulateData.getStoreInfo();
    PopulateData.setPageCounter();

    if(exists($('#home'))) {
        PopulateData.getCouponData();
    }
    
    if(exists($('#used'))) {
        var i = $('#used-menu').offset().top;
        
        PopulateData.getUsedGearData();
    
        $(document).scroll(function() {
            var windowWidth = 753; // iPad Media Query Width - Scroll Bar Width (15px)
            
            if($(document).scrollTop() > i && $(window).width() >= windowWidth) {
                $('#used-menu').css('top', ($(document).scrollTop() - i) + 'px');
            } else {
                $('#used-menu').css('top', 0);
            }
        });
    }
    
    /*var id = $('.content').attr('id');
    $('#' + id + '-nav').addClass('active');
    $('.navbar-inverse .btn-title').text(id.toUpperCase());*/
    
}

function exists(e) {
    if(e.length > 0) {
        return true;
    } else {
        return false;
    }
}