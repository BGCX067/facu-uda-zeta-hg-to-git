var Comments = function() {
	
	this.content = document.getElementById('content');
	
	this.bindEvent = function() {
		var navigators = document.getElementsByName('nav');
		for (var i=0;i<navigators.length;i++) {
			navigators[i].addEventListener('click',navigationButtonClick,false);
	      }
	};
	
	function navigationButtonClick(event) {
		var element = event.currentTarget;
		var page = element.getAttribute("data-page");
		
		load_page("Comment", "listCommnets", "index="+page , this.content );
	};
};