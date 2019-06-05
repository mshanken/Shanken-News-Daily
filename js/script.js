// Prefix for amazon
yepnope.addPrefix('amazon', function(resourceObj) {
	resourceObj.url = 'https://s3.amazonaws.com/toolkit.mshanken.com/' + resourceObj.url;
	return resourceObj;
});
var _gaq = [['_setAccount','UA-23484466-1'],['_trackPageview']];
yepnope([
{
	test: Modernizr.mq('only all'), // Testing if browser supports mq
	nope: {
		'respondJS' : 'amazon!js/respond.min.js'
	} 
},
{
	test: document.getElementsByClassName('wpcf7').length,
	yep: {
		'contactFormJS': 'https://shankennewsdaily.com/wp-content/plugins/contact-form-7/jquery.form.js',
		'contactScriptsJS': 'https://shankennewsdaily.com/wp-content/plugins/contact-form-7/scripts.js'
	}
},
{
	load : 'ielt7!https://ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js',
	callback : function () {
		window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})});
	}
},
{
	load : 'https://www.google-analytics.com/ga.js'
}
]);
