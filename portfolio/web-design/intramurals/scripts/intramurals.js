//Menu Script

var timeout	= 200;
var closetimer = 0;
var menuitem = 0;

function mopen(id){	
	mcancelclosetime();
	if(menuitem) menuitem.style.visibility = 'hidden';
	menuitem = document.getElementById(id);
	menuitem.style.visibility = 'visible';
}

function mclose(){
	if(menuitem) menuitem.style.visibility = 'hidden';
}

function mclosetime(){
	closetimer = window.setTimeout(mclose, timeout);
}

function mcancelclosetime(){
	if(closetimer){
		window.clearTimeout(closetimer);
		closetimer = null;
	}
}

document.onclick = mclose; 

//Accordion Menu

var expands = new Array();

function init() {
	var divs = document.getElementsByTagName( 'div' );
	for ( var i = 0; i < divs.length; i++ ) {
		if ( divs[i].className == 'expand' ) expands.push( divs[i] );
	}
	for ( var i = 0; i < expands.length; i++ ) {
		var h3 = getFirstChildWithTagName( expands[i], 'H3' );
		h3.onclick = toggleItem;
	}
	for ( var i = 1; i < expands.length; i++ ) {
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

//Slideshow

var h_Obj,h_Lst,h_SI;

function h_refslides(h_id,h_ary,h_mess,h_main,h_evt,h_txt1,h_txt2){
	var h_obj=document.getElementById(h_id);
	if (h_ary){
		for (var h_0=0;h_0<h_ary.length;h_0++){
   			h_img=document.createElement('IMG');
   			h_img.src=h_ary[h_0][0];
  			h_img.border=0;
   			if (h_ary[h_0][3]){
   		 		var h_a=document.createElement('A');
    			h_a.href=h_ary[h_0][3];
    			h_a.appendChild(h_img);
    			h_obj.appendChild(h_a);
   			}
   			else {
				h_obj.appendChild(h_img);
			}
   			if (h_ary[h_0][1]){
				h_img.width=h_ary[h_0][1];
			}
   			if (h_ary[h_0][2]){
				h_img.height=h_ary[h_0][2];
			}
   			if (h_ary[h_0][4]){
				h_img.title=h_ary[h_0][4];
			}
   			if (h_ary[h_0][5]){
				h_img.mess=h_ary[h_0][5];
			}
  		}
 	}
 	h_obj.imgs=h_obj.getElementsByTagName('IMG');
 	for (var h_0=0;h_0<h_obj.imgs.length;h_0++){
  		h_obj.imgs[h_0].style.position='absolute';
  		h_obj.imgs[h_0].style.left='0px';
  		h_obj.imgs[h_0].style.top='0px';
  		if (h_obj.style.height){
			h_obj.imgs[h_0].style.top=((parseInt(h_obj.style.height)-h_obj.imgs[h_0].height)/2)+'px';
		}
 		if (h_obj.style.width){
			h_obj.imgs[h_0].style.left=((parseInt(h_obj.style.width)-h_obj.imgs[h_0].width)/2)+'px';
		}
  		h_obj.imgs[h_0].style.visibility='hidden';
  		h_obj.imgs[h_0].main=document.getElementById(h_main);
 		if (h_obj.imgs[h_0].main&&h_evt){
   			h_evt=h_evt.toLowerCase();
   			if (h_evt=='onmouseover'||h_evt=='onclick'){
    			h_obj.imgs[h_0].txt1=h_txt1||'';
    			h_obj.imgs[h_0].txt2=h_txt2||'';
    			h_obj.imgs[h_0][h_evt]=function(){
					h_Main(this);
				}
   			}
  		}
 	}
 	h_obj.imgs[0].style.visibility='visible';
 	h_obj.nu=0;
	h_obj.fb=1;
 	h_obj.mess=document.getElementById(h_mess);
 	if (h_obj.mess){
  		h_obj.mess.style.position='relative';
  		h_obj.mess.style.top=h_obj.mess.style.top||(h_obj.imgs[0].offsetHeight)+'px';
  		if (h_obj.imgs[0].title){
			h_obj.mess.innerHTML=h_obj.imgs[0].title;
		}
  		if (h_obj.imgs[0].mess){
			h_obj.mess.innerHTML=h_obj.imgs[0].mess;
		}
 	}
 	h_obj.auto=false;
}

function h_nav(h_id,h_dir,h_auto){
	var h_dir=h_dir||1;
 	if (!h_auto){
		clearInterval(h_SI);
	}
 	var h_obj=document.getElementById(h_id);
 	h_obj.fb=h_dir;
 	h_obj.imgs[h_obj.nu].style.visibility='hidden';
 	h_obj.nu+=h_obj.fb;
 	if (h_obj.nu==h_obj.imgs.length){
		h_obj.nu=0;
	}
 	if (h_obj.nu<0){
		h_obj.nu=h_obj.imgs.length-1;
	}
 	h_obj.imgs[h_obj.nu].style.visibility='visible';
 	if (h_obj.mess){
  		if (h_obj.imgs[h_obj.nu].title){
			h_obj.mess.innerHTML=h_obj.imgs[h_obj.nu].title;
		}
		else {
			h_obj.mess.innerHTML='';
		}
	}
}

var preload = new Array('images/prev.png', 'images/next.png');

var loader = new Array();
for(var i = 0; i < preload.length; i++){
    loader[i] = new Image();
    loader[i].src = preload[i];
}

//Club Sports

var delay=2000;
var TO;
function show(){
	clearTimeout(TO);
	var args=show.arguments;
	var obj=args[0];
	if (typeof(obj)=='string'){
		obj=document.getElementById(obj);
	}
	if (!window['BSS'+obj.id]){
		window['BSS'+obj.id]=[0,args[2],args[3]];
	}
	var ary=window['BSS'+obj.id];
	var nu=args[1];
	if (nu=='A'){
		nu=1;
	}
	ary[0]+=nu;
	if (ary[0]<0){
		ary[0]=ary[2].length-1;
	}
	if (ary[0]>=ary[2].length){
		ary[0]=0;
	}
	obj.src=ary[1]+ary[2][ary[0]];
	if (args[1]=='A'){
		TO=setTimeout(function(){
			show(obj,'A');
		},delay);
	}
}