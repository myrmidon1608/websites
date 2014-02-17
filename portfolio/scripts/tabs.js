var tabName = new Array("intro", "game", "web", "about");

var socialTab = new Array("twitter", "blog", "music", "rss");

$(document).ready(function() {
    window.scrollTo(0,0);
});

// Pushes Banner Tab on Click
function tabPush(e) {
	var name = (e.target.id);
	window.scrollTo(0,0);
	
	for(i = 0; i < tabName.length; i++) {
		if(name == tabName[i]) {
			$('#' + tabName[i]).css('margin-left', '-15px');
			generateFact();
		}
		else {
			$('#' + tabName[i]).css('margin-left', '0px');
		}	
	}
	tabChange(e);
}

// Changes Tab Content
function tabChange(e, parentName) {
	var name = (e.target.id);
	
	var container = $(e.target).parent().parent();
	var tabList = $(container).children();
	var tab = $(tabList[0]).children();
	var content = $(tabList[1]).children();

	for(i = 0; i < tab.length; i++) {
		if(e.target == tab[i]) {
			$(content[i]).css('display', 'block');
			pageHeight(name, parentName);
		}
		else {
			$(content[i]).css('display', 'none');
		}
	}
}

// Dynamic Page Height
function pageHeight(page, parent) {
	var pageName = $('#' + page + 'Content');
	var mainHeight = pageName.height();
	var heightOver = mainHeight % 200;
	
	if(parent != null) {
		pageName = $('#' + parent + 'Content');
	}
	else {
		pageName = $('#' + page + 'Content');
	}

	if(heightOver != 0) {
		var remain = 200 - heightOver;
		pageName.css('height', remain + mainHeight);	
	}
	else {
		pageName.css('height', mainHeight);
	}
}