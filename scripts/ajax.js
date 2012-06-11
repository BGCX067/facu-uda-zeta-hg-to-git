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