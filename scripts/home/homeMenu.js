var HomeMenu =  function() {
	var dashboard = document.getElementById('dashboard');
	var content = document.getElementById('content');
	
	var aboutMenu = document.getElementById('about');
	var contactMenu = document.getElementById('contactme');
	var price = document.getElementById('price');
	
	this.bindEvents = new function() {
		
		aboutMenu.addEventListener('click', function() {
			load_page('Home', 'about', null, content);
		}, false);
		
		contactMenu.addEventListener('click', function() {
			load_page('Home', 'contactme', null, content);

		}, false);
		
		price.addEventListener('click', function() {
			load_page('Home', 'price', null, content);
		}, false);	
	};
	
};