function animationFrame(functionName) {
	/**
	 * Provides requestAnimationFrame in a cross browser way.
	 * http://paulirish.com/2011/requestanimationframe-for-smart-animating/
	 */

	if ( !window.requestAnimationFrame ) {
	
		window.requestAnimationFrame = ( function() {
	
			return window.webkitRequestAnimationFrame ||
			window.mozRequestAnimationFrame || // comment out if FF4 is slow (it caps framerate at ~30fps: https://bugzilla.mozilla.org/show_bug.cgi?id=630127)
			window.oRequestAnimationFrame ||
			window.msRequestAnimationFrame ||
		function( /* function FrameRequestCallback */ callback, /* DOMElement Element */ element ) {

			window.setTimeout( callback, 1000 / 60 );

		};

		} )();
	
	}
	
	function animate() {

		requestAnimationFrame( animate );
		functionName();

	}
	animate();	
	
}

function nl2br(text) {
        var newText = text.replace('\r\n','<br />',"g");
        newText = newText.replace('\r','<br />',"g");
        newText = newText.replace('\n','<br />',"g");
        return newText;
}

function createCookie(name,value,days) {
	if (days) {
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}

function eraseCookie(name) {
	createCookie(name,"",-1);
}

function fullWidth(element, listenToParent) {
	var parentWidth;
	if(listenToParent){
		parentWidth = element.parentNode.clientWidth;
	} else {
		parentWidth = window.innerWidth;
	}
	element.style.width = parentWidth + 'px';
}		

function fullHeight(element, listenToParent) {
	var parentHeight;
	if(listenToParent){
		parentHeight = element.parentNode.clientHeight;
	} else {
		parentHeight = window.innerHeight;
	}
	element.style.height = parentHeight + 'px';
}

function fullSize(element, listenToParent){
	fullHeight(element, listenToParent);
	fullWidth(element, listenToParent);
}