var curX = 2;
var curY = 6;

function move(moveX, moveY) {
    $('#office').css('top', -curY * 351 + 'px').css('left', -curX * 351 + 'px');
    $('#marker').css('top', curY * 25 + 'px').css('left', curX * 25 + 'px');
    
    var position = {
        x: curX + moveX,
        y: curY + moveY
    };
    
    // Shows navigation arrows if bordering tiles can be accessed
    $.ajax({
        url: 'php/tilecheck.php', 
        data: position, 
        type: 'POST',
        dataType: 'json',
        success: function(data) {
            curX += moveX;
            curY += moveY;
            //console.log(data);
            //var xypos = document.getElementById("coord");
            //xypos.innerText = curX + ", " + curY;

            $.each(data, function(key, value){
                if(value == 1){
                    $("#a" + key).css('display', 'none');
                }
                else {
                    $("#a" + key).css('display', 'inline');
                }
            });
            
            $('#office').animate({left: -curX * 351 + 'px', top: -curY * 351 + 'px'}, 250);
            $('#marker').animate({left: curX * 25 + 'px', top: curY * 25 + 'px'}, 250);
        }   
    });
	
    // Shows office arrows if bordering tiles contain an unoccupied office
	$.ajax({
		url: 'php/officecheck.php', 
		data: position, 
		type: 'POST',
		dataType: 'json',
		success: function(data) {
			$.each(data, function(key, value) {
				if(value > 1) {
					$("#office" + key).css('display', 'inline');
				}
				else {
					$("#office" + key).css('display', 'none');
				}
			});
		}
	});
    
    // Checks if current tile is occupied
    $.ajax({
		url: 'php/emptycheck.php', 
		data: position, 
		type: 'POST',
		dataType: 'json',
		success: function(data) {
            var randomNum = Math.floor(Math.random() * 15);
            
            if(data == 0 && randomNum == 1) {
                // If tile is unoccupied, chance of Jason appearing
                $('.js234').css('display', '');
            }
            else if(data == 2) {
                // Text in Jason's office
                $('.js234').css('display', 'none');
                $('#navigation').css('display', 'none');
                $('#textScrn').delay(500).fadeIn(0);
                
                var i = 0;
                var interval = setInterval(function() {
                    if(i < 5) {
                        $('#textBox').append(".&nbsp;");
                        i++;
                    }
                    else if (i == 5) {
                        $('#textBox').append("<br />THERE DOESN'T SEEM TO BE ANYONE HERE.");
                        clearInterval(interval);
                    }
                }, 500);
            }
            else {
                $('.js234').css('display', 'none');
            }
        }
    });

}

function office(moveX, moveY, a) {
	var position = {
        x: curX + moveX,
        y: curY + moveY
    };
	
	$.ajax({
		url: 'php/occupiedcheck.php', 
		data: position, 
		type: 'POST',
		dataType: 'json',
		success: function(data) { 
			//console.log(data);      
			$.each(data, function(key, value) {
				if(key == a) {
                    
                    $.ajax({
                        url: 'php/employeecheck.php', 
                        data: {office: value}, 
                        type: 'POST',
                        dataType: 'json',
                        success: function(data) {
                            //console.log(data);
                            var emplName = data.name;
                            $('.js234').css('display', 'none');
                            $('#navigation').css('display', 'none');
                            $('#textScrn').css('display', 'block');
                            $('#textBox').append("Office # " + data.office + ";&nbsp;&nbsp;" + emplName.toUpperCase());
                            if(data.office_type == 1) {
                                $('#textBox').append("<p>THE OFFICE IS LOCKED.</p>");
                            }
                            else {
                                $('#textBox').append("<p>NO ONE IS IN THE CUBICLE.</p>");
                            }
                        }
                    });
				}
			});
		}
	});
}