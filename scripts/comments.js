var Comments = function() {

	this.bindEvents = function() {
		var navigators = document.getElementsByName('nav');
		for (var i=0;i<navigators.length;i++) {
			navigators[i].addEventListener('click',navigationButtonClick,false);
	      }
	};
	
	function navigationButtonClick(event) {
		var element = event.currentTarget;
		var page = element.getAttribute("data-page");
		
		load_page("Comment", "listCommnets", "index="+page , document.getElementById('content') );
	};
};

var NewComment = function() {
	
	this.name;
	this.email;
	this.message;
	this.file;
	this.commit;
	
	this.initialize = function() {
		this.name = document.getElementsByName("name")[0];
		this.email = document.getElementsByName("email")[0];
		this.message = document.getElementsByName("message")[0];
		this.file = document.getElementsByName("file")[0];
		this.commit = document.getElementById("commit");
	};
	
	this.bindEvents = function() {
		this.commit.addEventListener('click',function(){
			if(validateForm()){
				document.getElementById("message-form").submit();
			}
		},false);
	
		this.file.addEventListener('change',function(){
			setTextContent(document.getElementById("file-name"),this.files[0].name);	
		},false);
	};
};


function setTextContent(element, text) {
    while (element.firstChild!==null)
    element.removeChild(element.firstChild); // remove all existing content
    element.appendChild(document.createTextNode(text));
}

function validateForm() {
	
	var name = document.getElementsByName("name")[0].value.trim();
	var email = document.getElementsByName("email")[0].value.trim();
	var message = document.getElementsByName("message")[0].value.trim();
	var file = document.getElementsByName("file")[0];
	var result = true;
	if(name == ""){
		addClass(document.getElementsByName("name")[0],'error');
		result = false;
	}else{
		removeClass(document.getElementsByName("name")[0],'error');
	}
	
	if(email == ""){
		addClass(document.getElementsByName("email")[0],'error');
		result = false;
	}else{
		if(!validaMail(email)){
			addClass(document.getElementsByName("email")[0],'error');
			result = false;
		}else{
			removeClass(document.getElementsByName("email")[0],'error');
		}
	}

	if(message == ""){
		addClass(document.getElementById("message-text-area"),'text-area-error');
		result = false;
	}else{
		removeClass(document.getElementById("message-text-area"),'text-area-error');
	}
	if(file.size > 70){
		setTextContent(document.getElementById("file-name"),"El archivo no puede exceder los 700Kb");	
		result = false;
	}

	return result;
}

function validaMail(mail) {
	var exr = /^[0-9a-z_\-\.]+@[0-9a-z\-\.]+\.[a-z]{2,4}$/i;
		return exr.test(mail);
	}

function getMessage(id) {
	
	var parent = document.getElementById("comment-container"); 
	var newDiv = document.createElement("div");
	
	if(parent.firstChild){
		document.getElementById("comment-container").insertBefore(newDiv, parent.firstChild);
	}else{
		document.getElementById("comment-container").appendChild(newDiv);	
	}
	load_page("Comment", "retrieveComment", "id="+id,newDiv);
	
	clearForm();
}
function imageError(){
	setTextContent(document.getElementById("file-name"),'La imagen que intenta subir es demasiado grande');
	document.getElementsByName("file")[0].value ="";
}

function clearForm(){
	document.getElementsByName("name")[0].value = "";
	document.getElementsByName("email")[0].value="";
	document.getElementsByName("message")[0].value ="";
	document.getElementsByName("file")[0].value ="";
	setTextContent(document.getElementById("file-name"),'No se ha seleccionado ning\u00FAn archivo');
}