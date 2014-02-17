var faders=[];
faders[0]=['header', 0];
faders[1]=['home', 0];
faders[2]=['about', 0];
faders[3]=['roster', 0];
faders[4]=['schedule', 0];
faders[5]=['gallery', 0];
faders[6]=['faq', 0];
faders[7]=['merch', 0];
faders[8]=['links', 0];
faders[9]=['contact', 0];

function fade(el, way, op, opinc, speed){
	if(!fade.prprt&&!fade.ie)
	return;
	var id=typeof el=='string'? el : el.id, el=typeof el=='object'? el : document.getElementById(el);
	clearTimeout(fade[id+'timer']);
	var op_obj=fade.ie6? el.filters[0] : el.style,
	waym=way=='in'? 1 : -1, speed=speed? speed*1 : 15, opinc=opinc&&opinc>=1? opinc*(fade.ie? 1 : .01) : opinc? opinc : fade.ie? 5 : .05,
	op=op&&fade.ie? op*1 : op&&op*1>=1? Math.min(op*.01, .99) : op? op : waym>0&&fade.ie? 100 : waym>0? .99 : 0;
	if(!fade.ie6&&!fade[id+'yet']){
		if(fade.prprt)
		op_obj[fade.prprt]=Math.min(fade.preset(id)*.01, .99);
		else if(fade.ie)
		op_obj.filter='alpha(opacity='+fade.preset(id)+')';
		fade[id+'yet']=true;
	}
	if(fade.prprt&&Math.abs(op*1-op_obj[fade.prprt]*1)<opinc)
	op_obj[fade.prprt]=op;
	else if(fade.prprt)
	op_obj[fade.prprt]=fade.ie6? op_obj[fade.prprt]*1 + opinc*waym : Math.min(op_obj[fade.prprt]*1 + opinc*waym, .99);
	else if (fade.ie&&Math.abs(op*1 - op_obj.filter.replace(/\D/g,'')*1)<opinc)
	op_obj.filter='alpha(opacity='+op+')';
	else if (fade.ie)
	op_obj.filter='alpha(opacity='+[op_obj.filter.replace(/\D/g,'')*1 + opinc*waym]+')';
	else
	return;
	if(op_obj[fade.prprt]&&op_obj[fade.prprt]*waym<op*waym||!fade.ie6&&fade.ie&&op_obj.filter.replace(/\D/g,'')*waym<op*waym)
	fade[id+'timer']=setTimeout(function(){fade(el, way, op, opinc, speed)}, speed);
}

if(document.documentElement&&document.documentElement.style){
	fade.d=document.documentElement, fade.t=function(o){return typeof fade.d.style[o]=='string'}; if(fade.d.filters)
	document.write('<span id="ie_test" style="filter:progid:DXImageTransform.Microsoft.alpha(opacity=0);position:absolute;top:-1000px;">p<\/span>');
	fade.ie=fade.d.filters&&ie_test.filters[0], fade.ie6=fade.ie&&typeof ie_test.filters[0].opacity=='number',
	fade.prprt=fade.t('opacity')||fade.ie6? 'opacity' : fade.t('MozOpacity')? 'MozOpacity' : fade.t('KhtmlOpacity')? 'KhtmlOpacity' : null;
}

fade.set=function(){
	var prop=fade.prprt=='opacity'? 'opacity' : fade.prprt=='MozOpacity'? '-moz-opacity' : '-khtml-opacity';
	document.write('\n<style type="text/css">\n')
	for (var i = 0; i < faders.length; i++)
	document.write('#'+faders[i][0]+' {\n'+
	(fade.ie? 'filter:progid:DXImageTransform.Microsoft.alpha(opacity='+faders[i][1]+')' : prop+':'+Math.min(faders[i][1]*.01, .99))+';\n}\n');
	document.write('<\/style>\n')
}

fade.preset=function(id){
	for (var i = 0; i < faders.length; i++)
	if (id==faders[i][0])
	return faders[i][1];
	return 0;
}

if(fade.prprt||fade.ie)
fade.set();
