var curX = 2;
var curY = 6;

function move(moveX, moveY) {
    $('#office').css('top', -curY * 351 + 'px').css('left', -curX * 351 + 'px');
    
    var position = {
        x: curX + moveX,
        y: curY + moveY
    };
    
    $.ajax({
        url: 'php/tilecheck.php', 
        data: position, 
        type: 'POST',
        dataType: 'json',
        success: function(data) {       
            curX += moveX;
            curY += moveY;
            //console.log(data);
            var xypos = document.getElementById("coord");
            xypos.innerText = curX + ", " + curY;

            $.each(data, function(key, value){
                if(value == 1){
                    $("#a" + key).css('display', 'none');
                }
                else {
                    $("#a" + key).css('display', 'inline');
                }
            });
            
            $('#office').animate({left: -curX * 351 + 'px', top: -curY * 351 + 'px'}, 250);
        }   
    });
	
	$.ajax({
		url: 'php/officecheck.php', 
		data: position, 
		type: 'POST',
		dataType: 'json',
		success: function(data) {       
			//console.log(data);
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
			console.log(data);      
			$.each(data, function(key, value) {
				if(key == a) {
					alert(value);
				}
			});
		}
	});
}