var TournamentMenu =  function() {
	var dashboard = document.getElementById('dashboard');
	var content = document.getElementById('content');
	
	var divisionA = document.getElementById('divisionA');
	var divisionB = document.getElementById('divisionB');
	var divisionB2 = document.getElementById('divisionB2');
	
	var menues = new Array();
	menues[0] = divisionA;
	menues[1] = divisionB;
	menues[2] = divisionB2;
	
	this.bindEvents = new function() {
		
		divisionA.addEventListener('click', function() {
			setStyleActivate(divisionA.parentNode);
			load_page('Tournament', 'positions','tournament=divisionA', content);
		}, false);
		
		divisionB.addEventListener('click', function() {
			setStyleActivate(divisionB.parentNode);
			load_page('Tournament', 'positions','tournament=divisionB', content);
		}, false);
		
		divisionB2.addEventListener('click', function() {
			setStyleActivate(divisionB2.parentNode);
			load_page('Tournament', 'positions','tournament=primeraB', content);
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