window.onload = function() {
	var dashboard = document.getElementById('dashboard');
	var content = document.getElementById('content');
	
	var nav_home = document.getElementById("global-nav-home");
	var nav_comment = document.getElementById("global-nav-comment");
	var nav_tournament = document.getElementById("global-nav-tournament");
	
	var navs = new Array();
	navs[0] = nav_home;
	navs[1] = nav_comment;
	navs[2] = nav_tournament;
	
	
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
	
	nav_tournament.addEventListener('click', function() {
		setStyleActivate(nav_tournament);
		load_page('Tournament','menu',"", dashboard);
		load_page('Tournament','primera',"", content);
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