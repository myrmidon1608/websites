function closeScrn(value) {
    switch(value) {
        
        case "text":
            $('#textScrn').css('display', 'none');
            $('#navigation').css('display', '');
            $('#textBox').replaceWith('<span id="textBox"></span>');
            break;
        
        case "team":
            $('#teamScrn').slideUp(500);
            $('#navigation').css('display', '');
            break;
            
        case "member":
            $('#memberScrn').fadeOut(500);
            $('#navigation').css('display', '');
			
			$.ajax({
				type: 'POST',
				url: 'php/endcheck.php',
				dataType: 'json',
				success: function(data) {
					if(data.end == 10) {
						$('#navigation').css('display', 'none');
						$('#endScrn').delay(1000).fadeIn(1000);
                        $('#marker').fadeOut(1000);
                        $('#directions').fadeOut(1000);
                        showCarol(2);
					}
					else {
						$('#navigation').css('display', '');
					}
				}   
			});
            break;
            
        case "start":
            $('#echoLogo').fadeOut(1000);
            $('#version2').fadeOut(1000);
            $('#beginBtn').fadeOut(1000);
            showCarol(1);
            break;
            
        case "carol1":
            $('#startScrn').fadeOut(1000);
            $('#marker').fadeIn(1000);
            $('#directions').fadeIn(1000);
            break;
            
        case "carol2":
            $('#carol2').fadeOut(1000, function() {
                $('#endButtons').fadeIn(1000);
                $('.js234').fadeIn(0);
                $('#group-sprite').fadeIn(1000);
            });
            break;
            
        case "dragon":
            $('#endScrn').delay(1000).fadeIn(1000);
            $('#endDragon').fadeIn(1000);
            $('#endDragon p').html('A dragon crashes through the ceiling and swallows you whole.<br />Game over, my friend.<br />Fancy another go?');
            $('#endButtons').css('marginTop', '25px').fadeIn(1000);
            break;
            
        case "credits":
            $('#creditScrn').fadeOut(500);
            break;
            
        default:
            break;
    }
}