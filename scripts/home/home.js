window.onload = function() {
	var dashboard = document.getElementById('dashboard');
	var content = document.getElementById('content');
	
	var nav_home = document.getElementById("global-nav-home");
	var nav_comment = document.getElementById("global-nav-comment");
	var nav_tournament = document.getElementById("global-nav-tournament");
	var nav_logout = document.getElementById("global-nav-logout");
	
	var navs = new Array();
	navs[0] = nav_home;
	navs[1] = nav_comment;
	navs[2] = nav_tournament;
	navs[3] = nav_logout;
	
	
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
		load_page('Tournament','positions',"tournament=divisionA", content);
	}, false);
	
	nav_logout.addEventListener('click', function() {
			var form = document.createElement("form");
		    form.setAttribute("method", "post");
		    form.setAttribute("action", "?c=Login&a=logout");
		    document.body.appendChild(form);
		    form.submit();
	}, false);
	
	
	for(var i=0; i < navs.length; i++) {
		navs[i].addEventListener('mouseover', function() {
			addClass(this, "selected");
			}, false);
		navs[i].addEventListener('mouseout', function() {
			removeClass(this, "selected");
			}, false);
	}
	
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