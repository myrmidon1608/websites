var currentSlide = 0;

function slideshow(slideDirection) {

	currentSlide += slideDirection;

	$.ajax({
        url: "php/comiccheck.php",
        dataType: "json",
        success: function(data, textStatus, xhr) {
            data = JSON.parse(xhr.responseText);

			if(currentSlide < 0) {
				currentSlide = data[0].length - 1;
			}
			else if(currentSlide > (data[0].length - 1)) {
				currentSlide = 0;
			}
			
			var comicPanels = data[0][currentSlide];
			var comicName = data[1][currentSlide];
			var comicTitle = data[2][currentSlide];
			var comicDate = data[3][currentSlide];

			$('#comic').replaceWith("<img id='comic' src='" + comicName + "' title='" + comicTitle + "' alt='" + comicTitle + "' />");
			$('#comic-info').replaceWith("<div id='comic-info'>" + comicTitle + '<span>' + comicDate + "</span></div>");
			
			if(comicPanels == 4) {
				$('#panel-switch').css('width', '510px');
			}
			else if(comicPanels == 6) {
				$('#panel-switch').css('width', '710px');
			}
		}
	});
}