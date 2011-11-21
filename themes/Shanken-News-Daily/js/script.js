// Prefix for amazon
yepnope.addPrefix('amazon', function(resourceObj) {
	resourceObj.url = 'https://s3.amazonaws.com/toolkit.mshanken.com/' + resourceObj.url;
	return resourceObj;
});
var _gaq = [['_setAccount','UA-23484466-1'],['_trackPageview']];
yepnope([
{
	load: '//ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js', // Jquery
	complete: function () {
		if (!window.jQuery) {
			yepnope('amazon!toolkit/js/jquery.min.js');
		};
		$('tr:even').addClass('even');
	}
},
{
	test: Modernizr.mq('only all'), // Testing if browser supports mq
	nope: {
		'respondJS' : 'amazon!js/respond.min.js'
	}
},
{
	test: document.getElementsByClassName('wpcf7').length,
	yep: {
		'contactFormJS': 'http://shankennewsdaily.com/wp-content/plugins/contact-form-7/jquery.form.js',
		'contactScriptsJS': 'http://shankennewsdaily.com/wp-content/plugins/contact-form-7/scripts.js'
	},
	callback: {
		'contactFormJS' : function(url, result, key){
			console.info('Mother Liken was loaded');
		}
	}
},
{
	load : 'ielt7!https://ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js',
	callback : function () {
		window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})});
	}
},
{
	load : 'http://www.google-analytics.com/ga.js'
}
]);