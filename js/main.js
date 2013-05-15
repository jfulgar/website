//var myApp = angular.module('myApp', ['Strife']);




//javascript
var Strife = (function(){
	var keo = {};
	
	//===main method
	keo.Keo = function(e){
		console.log('initialized');
		
		//======preloader======
		var preload_current, i, preloader = new Image;
		for(i = 0; i < preload_imageList.length; i++){
			preload_current = (preloader.src = preload_imageList[i]);
			if(preload_current.complete && i < preload_imageList.length - 1){
				//handle single image cached
				//var percentage = (i+1)/preload_imageList.length * 100;

			} else if (preload_current.complete && i == preload_imageList.length - 1){
				//handle overall images cache complete

			}
		}
	}

	//===return
	return keo;
}());