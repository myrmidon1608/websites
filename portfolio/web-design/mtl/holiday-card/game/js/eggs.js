var ending = 1;

function javiDisco() {
    $('#navigation').css('display', 'none');
    $('#discoBall').css('display', 'block').animate({marginTop:'0px'},1000, function(){
        var i = 1;
        var interval = setInterval(function() {
            $('.jr243').css("background", "url('images/sprites/javierr-jt.gif')");
            $('#raveLights').css('display', 'block');
            if(i <= 6) {
                $('#raveLights').css("background", "url('images/environment/rave/0" + i + ".png')");
                i++;
            }
            else if(i <= 12) {
                $('#raveLights').css("background", "url('images/environment/rave/0" + (i - 6) + ".png')");
                i++;
            }
            else if (i > 12) {
                $('.jr243').css("background", "url('images/sprites/javierr.png')");
                $('#raveLights').css('display', 'none');
                $('#discoBall').animate({marginTop:'-105px'},1000, function() {
                    $('#discoBall').css('display', 'none');
                    $('#navigation').css('display', 'block');
                });
                clearInterval(interval);
            }
        }, 200);  
    });
}

function summonDragon() {
    $('#navigation').css('display', 'none');
    var i = 0;
    var interval1 = setInterval(function() {
        if(i < 5) {
            $('.map').animate({marginLeft: '-5px'}, 25, function() {
                $('.map').animate({marginLeft: '0px'}, 25, function() {
                    $('.map').animate({marginLeft: '5px'}, 25, function() {
                        $('.map').animate({marginLeft: '0px'}, 25);
                    });
                });
            });
            i++;
        }
        else if(i < 10 && i >= 5) {
            $('#callout').html('!');
            i++;
        }
        else if(i < 15 && i >= 10) {
            $('#callout').css('display', 'none');
            $('.nm345').animate({top: '351px'}, 500);
            i++;
        }
        else if(i < 25 && i >= 15) {
            $('#dragon').css('display', 'block').animate({marginTop: '0px'}, 1000);
            i++;
        }
        else if(i < 35 && i >= 25) {
            $('#dragon').css("background", "url('images/sprites/dragon-open.png')");
            $('.map').animate({marginLeft: '-5px'}, 25, function() {
                $('.map').animate({marginLeft: '0px'}, 25, function() {
                    $('.map').animate({marginLeft: '5px'}, 25, function() {
                        $('.map').animate({marginLeft: '0px'}, 25); 
                    });
                });
            });
            
            if(i == 34) {
                $('#dragon').css("background", "url('images/sprites/dragon.png')");
            }
            
            i++;
        }
        else if (i == 35) {
            if(ending == 1) {
                closeScrn('dragon');
            }
            else {
                
            }
            clearInterval(interval1);
        }
    }, 100); 
}

function billTrans() {
    $('#navigation').css('display', 'none');
    var i = 0;
    var interval = setInterval(function() {
        if(i == 0) {
            $('.bm349').css("background", "url('images/sprites/williamm-as.png')");
            i++;
        }
        else if (i == 1) {
            $('#textScrn').fadeIn(0);
            $('#textBox').append("GET TO THE CHOPPA!!!");
            clearInterval(interval);
            //return ending = 2;
        }
    }, 500);
}