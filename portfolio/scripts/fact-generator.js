// Random Fact Generator

var factList = new Array(
	"Expert Googler",
	"Internet Culture Aficionado",
	"Photoshop Master",
	"Gaming Connoisseur",
	"Programming Guru"
);

function generateFact() {
	var index = Math.floor(Math.random() * factList.length);
	$('#factHolder').remove();
    $('#titleName').append('<span id="factHolder">...the ' + factList[index] + '</span>');
}

$(document).ready(function() {
   generateFact();
});