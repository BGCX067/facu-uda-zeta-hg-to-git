function Ajax() {
	    var xmlhttp;
	    try{
	        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	    }catch(e){
	        try{
	            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	        }catch(E){
	        	xmlhttp = false;
	        }
	    }

	    if(!xmlhttp && typeof XMLHttpRequest!='undefined'){
	        xmlhttp = new XMLHttpRequest();
	    }
	    return xmlhttp;
}
function load_page(cotroller,action,params,contenedor){
	 return load(cotroller,action,params,contenedor,new Ajax());
}

function load(cotroller,action,params,contenedor,ajax){
    //ajax=new Ajax(); 
    var url = '/depo-web/index.php?c=' + cotroller + '&a=' + action;
    if(!(params=="" || params==null)){
    	url += '&' + params;
    }
    ajax.open("GET", url,true); 
    ajax.onreadystatechange=function(){
        if(ajax.readyState==1){
            //Sucede cuando se esta cargando la pagina
            contenedor.innerHTML = "cargando()";//<-- Aca puede ir una precarga
        }else if(ajax.readyState==4){
            //Sucede cuando la pagina se cargó
            if(ajax.status==200){
                //Todo OK
                contenedor.innerHTML = ajax.responseText;
                runJs(ajax.responseText);
            }else if(ajax.status==404){
                //La pagina no existe
                contenedor.innerHTML = "La página no existe";
            }else{
                //Mostramos el posible error
                contenedor.innerHTML = "Error:".ajax.status; 
            }
        }
    };
    ajax.send(null);
}

function sendPost(cotroller,action,params,contenedor) {
	sendRequestPost(cotroller,action,params,contenedor,new Ajax());
}

function sendRequestPost(cotroller,action,params,contenedor,http) {
	var url = '/depo-web/index.php?c=' + cotroller + '&a=' + action;
	http.open("POST", url, true);

	//Send the proper header information along with the request
	http.setRequestHeader("Content-type", "multipart/form-data");
	http.setRequestHeader("Content-length", params.length);
	http.setRequestHeader("Connection", "close");

	http.onreadystatechange =function(){
        if(http.readyState==1){
            //Sucede cuando se esta cargando la pagina
        }else if(http.readyState==4){
            //Sucede cuando la pagina se cargó
            if(http.status==200){
                //Todo OK
                contenedor.innerHTML = http.responseText;
                runJs(http.responseText);
            }else if(http.status==404){
                //La pagina no existe
                contenedor.innerHTML = "La página no existe";
            }else{
                //Mostramos el posible error
                contenedor.innerHTML = "Error:".ajax.status; 
            }
        }
    };
	http.send(params);
}


function runJs(response) {
	var search = response;
    var script;
 
    while( script = search.match(/(<script[^>]+javascript[^>]+>\s*(<!--)?)/i)) 
    { 
      search = search.substr(search.indexOf(RegExp.$1) + RegExp.$1.length); 
 
      if (!(endscript = search.match(/((-->)?\s*<\/script>)/))) break; 
 
      block = search.substr(0, search.indexOf(RegExp.$1)); 
      search = search.substring(block.length + RegExp.$1.length); 
 
      var oScript = document.createElement('script'); 
      oScript.text = block; 
      document.getElementsByTagName("head").item(0).appendChild(oScript); 
    }
}