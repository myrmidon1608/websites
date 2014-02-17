//Menu Accordion
var expands = new Array();

function init() {
	var divs = document.getElementsByTagName( 'div' );
    for ( var i = 0; i < divs.length; i++ ) {
    	if ( divs[i].className == 'expand' ) expands.push( divs[i] );
    }
    for ( var i = 0; i < expands.length; i++ ) {
        var li = getFirstChildWithTagName( expands[i], 'LI' );
        li.onclick = toggleItem;
    }
	for ( var i = 0; i < expands.length; i++ ) {
        expands[i].className = 'expand hide';
    }
}
 
function toggleItem() {
    var itemClass = this.parentNode.className;
    for ( var i = 0; i < expands.length; i++ ) {
        expands[i].className = 'expand hide';
    }
	if ( itemClass == 'expand hide' ) {
        this.parentNode.className = 'expand';
    }
}
 
function getFirstChildWithTagName( element, tagName ) {
    for ( var i = 0; i < element.childNodes.length; i++ ) {
        if ( element.childNodes[i].nodeName == tagName ) return element.childNodes[i];
    }
}

onload = function(){
    if (document.getElementsByTagName)
    init();
}





















