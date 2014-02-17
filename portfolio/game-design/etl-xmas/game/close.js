function closeScrn(value) {
    switch(value) {
        
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
					console.log(data.end);
					if(data.end == 10) {
						$('#navigation').css('display', 'none');
						$('#endScrn').delay(750).fadeIn(2000);
					}
					else {
						$('#navigation').css('display', '');
					}
				}   
			});
            break;
            
        case "start":
            $('#startScrn').fadeOut(1000);
            
        default:
            break;
    }
}