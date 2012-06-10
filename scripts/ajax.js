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

function load_page (cotroller,action,params,contenedor){
    ajax=Ajax(); 
    var url = '/depo-web/index.php?c=' + cotroller + '&a=' + action;
    if(!(params=="" || params==null)){
    	url += '?' + params;
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