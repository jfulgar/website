// fix document.getElementByClassName in IE < 9
if(!document.getElementsByClassName){
	document.getElementsByClassName = function(classname){
		var a = [];
	    var re = new RegExp('(^| )'+classname+'( |$)');
	    var els = document.getElementsByTagName("*");
	    for(var i=0,j=els.length; i<j; i++)
	        if(re.test(els[i].className))a.push(els[i]);
	    return a;
	}
}