window.onload = function() {
	var dashboard = document.getElementById('dashboard');
	var content = document.getElementById('content');
	
	var nav_home = document.getElementById("global-nav-home");
	var nav_comment = document.getElementById("global-nav-comment");
	
	var navs = new Array();
	navs[0] = nav_home;
	navs[1] = nav_comment;
	
	
	load_page('Home','menu',"", dashboard);
	load_page('Home','about',"", content);
	
	nav_comment.addEventListener('click', function() {
		setStyleActivate(nav_comment);
		load_page('Comment','newCommentForm',"", dashboard);
		load_page('Comment','listCommnets',"", content);
	}, false);
	
	nav_home.addEventListener('click', function() {
		setStyleActivate(nav_home);
		load_page('Home','menu',"", dashboard);
		load_page('Home','about',"", content);
	}, false);
	
	function setStyleActivate(component) {
		addClass(component, "active");
		var len=navs.length;
		for(var i=0; i<len; i++) {
			var nav = navs[i];
			if(component != nav){
				removeClass(nav, "active");
			}
		}
	}
	
};