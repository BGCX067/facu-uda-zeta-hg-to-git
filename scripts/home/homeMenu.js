var HomeMenu =  function() {
	var dashboard = document.getElementById('dashboard');
	var content = document.getElementById('content');
	
	var aboutMenu = document.getElementById('about');
	var contactMenu = document.getElementById('contactme');
	var price = document.getElementById('price');
	
	var menues = new Array();
	menues[0] = aboutMenu;
	menues[1] = contactMenu;
	menues[2] = price;
	
	this.bindEvents = new function() {
		
		aboutMenu.addEventListener('click', function() {
			setStyleActivate(aboutMenu.parentNode);
			load_page('Home', 'about', null, content);
		}, false);
		
		contactMenu.addEventListener('click', function() {
			setStyleActivate(contactMenu.parentNode);
			load_page('Home', 'contactme', null, content);
		}, false);
		
		price.addEventListener('click', function() {
			setStyleActivate(price.parentNode);
			load_page('Home', 'price', null, content);
		}, false);	
	};
	
	
	function setStyleActivate(component) {
		addClass(component, "active");
		var len=menues.length;
		for(var i=0; i<len; i++) {
			var nav = menues[i].parentNode;
			if(component != nav){
				removeClass(nav, "active");
			}
		}
	}
};