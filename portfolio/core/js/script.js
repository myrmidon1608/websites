/* -------------------------------- *\
 * Main JavaScript - Nicholas Moore *
\* -------------------------------- */

window.onload = init;

function init() {
	if(loadingContainer) loadingContainer.className = 'hidden';
	clearInterval(loading);
	generateFact();
	titleColor();
	generateProgress();
	customTwitter();
    homeMenu.init();
}

function index(value) {
	 return Math.floor(Math.random() * value);
}

function customTwitter() {
	$('.twitter iframe').contents().find('.timeline').css('border', 'none');	
	$('.twitter iframe').contents().find('.timeline-header').css('border', 'none').height('17');	
	$('.twitter iframe').contents().find('.summary').css('display', 'none');
	//$('.twitter iframe').contents().find('.stream').css('overflow-y', 'hidden');
	$('.twitter iframe').contents().find('.load-more').css('display', 'none');
	
	var feed = $('.twitter iframe').contents().find('.h-feed').children();
	
	for(var j = 5; j < feed.length; j++) {
		$('.twitter iframe').contents().find(feed[j]).css('display', 'none');
	}
}

/* -------------------------------- *\
 * Random Fact Generator            *
\* -------------------------------- */

function generateFact() {
    var titlePhrase = elementID('titlePhrase');
	i = index(factList.length);
    
    titlePhrase.innerHTML = '';
	titlePhrase.innerHTML = '<span id="factHolder">' + factList[i] + '</span>';
}

/* -------------------------------- *\
 * Skill Progress Bars              *
\* -------------------------------- */

function generateProgress() {
	for(var i = 0; i < skillProgress.length; i++) {
        var progressBar = elementID('bar' + i),
            j = index(skillProgress[i].length);
		progressBar.innerHTML = skillProgress[i][j][0];
        progressBar.style.width = skillProgress[i][j][1] + '%';
	}
}

/* -------------------------------- *\
 * Main Header Color                *
\* -------------------------------- */

function titleColor() {
    var titleBrand = elementID('titleBrand'),
        titleArray = titleBrand.innerText.split('');

	titleBrand.innerHTML = '';
	for(i = 0; i < titleArray.length; i++) {
		titleBrand.innerHTML += '<span style="color:' + titleRainbow[i] + '">' + titleArray[i] + '</span>';
	}
}

/* -------------------------------- *\
 * Modal                            *
\* -------------------------------- */

function openModal(modalName) {
    var modalType = elementID(modalName);
    
    modalType.className = 'modalContainer';
    document.body.style.overflow = 'hidden';
}

function closeModal(e) {
    var modalBox = e.parentNode.parentNode.parentNode;
    
    modalBox.className = 'modalContainer hidden';
    document.body.style.overflow = 'auto';
}