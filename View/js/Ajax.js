var objAJAX;

function Ajax(){
	if(window.XMLHttpRequest){
		objAJAX = new XMLHttpRequest();
	}
	else{
		objAJAX = new ActiveXObject();
	}
	return objAJAX;
}

/*Llama a los metodos y funciones de Estanteria EN Caja*/
function preparingShelves(){
    Ajax();
    
    objAJAX.open('POST', 'http://localhost/Almacen/Controller/controlFreeShelves.php?', true);
    objAJAX.onreadystatechange = makeSelectShelves;
    objAJAX.send();
}

function makeSelectShelves(){
	if(objAJAX.readyState === 4 && objAJAX.status === 200){
		var shelve = objAJAX.responseText;

            if( shelve === false ){
                document.getElementById('loc-caja').innerHTML = "-- no hay estanterías disponibles --";
            }
            else{
                document.getElementById('loc-caja').innerHTML = shelve;
            }
    }
}

/*Llama a los metodos y funciones de Leja EN Caja*/
function preparingShelf(value){
    Ajax();
    
    objAJAX.open('POST', 'http://localhost/Almacen/Controller/controlShelf.php?shelve='+value, true);
    objAJAX.onreadystatechange = makeSelectShelf;
    objAJAX.send();
}

function makeSelectShelf(){
    if(objAJAX.readyState === 4 && objAJAX.status === 200){
		var shelf = objAJAX.responseText;	
                
            if( shelf === false ){
                document.getElementById('leja-caja').innerHTML = "-- no hay lejas disponibles --";
            }
            else{
                document.getElementById('leja-caja').innerHTML = shelf;
            }
    }
}

/*Llama a los metodos y funciones que generan elementos básicos en cadena*/
function basicElements(){
    Ajax();
    
    objAJAX.open('POST', 'http://localhost/Almacen/Controller/basicElements.php?option=material', true);
    objAJAX.send();
    objAJAX.onreadystatechange = makeMaterial;
}

function makeMaterial(){
    if(objAJAX.readyState === 4 && objAJAX.status === 200){
		var material = objAJAX.responseText;	
                
            if( material === false ){
                document.getElementById('material').innerHTML = "-- introducir materiales en la bbdd --";
            }
            else{
                document.getElementById('material').innerHTML = material;
            }
    basicCorridor();
    }
}

function basicCorridor(){
    Ajax();
    
    objAJAX.open('POST', 'http://localhost/Almacen/Controller/basicElements.php?option=corridor', true);
    objAJAX.send();
    objAJAX.onreadystatechange = makeCorridor;
}

function makeCorridor(){
    if(objAJAX.readyState === 4 && objAJAX.status === 200){
		var material = objAJAX.responseText;	
                
            if( material === false ){
                document.getElementById('pasillo-estanteria').innerHTML = "-- introducir pasillos en la bbdd --";
            }
            else{
                document.getElementById('pasillo-estanteria').innerHTML = material;
            }
    }    
}

function positionAt(value){
    Ajax();
    
    objAJAX.open('POST', 'http://localhost/Almacen/Controller/basicElements.php?option=position&corridor='+value, true);
    objAJAX.send();
    objAJAX.onreadystatechange = makePosition;
}

function makePosition(){
    if(objAJAX.readyState === 4 && objAJAX.status === 200){
		var position = objAJAX.responseText;	
                
            if( position === false ){
                document.getElementById('num-pasillo').innerHTML = "-- introducir pasillos en la bbdd --";
            }
            else{
                document.getElementById('num-pasillo').innerHTML = position;
            }
    } 
}

function deleteTypeBox(value){
    Ajax();
    objAJAX.open('POST', 'http://localhost/Almacen/Controller/controlIdBox.php?typeBox='+value, true);
    objAJAX.onreadystatechange = makeIdDeleteBox;
    objAJAX.send();
}

function makeIdDeleteBox(){
    if(objAJAX.readyState === 4 && objAJAX.status === 200){
		var idBox = objAJAX.responseText;	
                
            if( idBox === false ){
                document.getElementById('idBoxDelete').innerHTML = "-- no existen cajas de este tipo --";
            }
            else{
                document.getElementById('idBoxDelete').innerHTML = idBox;
            }
    }
}

function secureDeleteBox(typeBox, idBox){
    Ajax();
    objAJAX.open('POST', 'http://localhost/Almacen/Controller/controlDeleteBox.php?action=searchBox&deleteType='+typeBox+'&idBox='+idBox, true);
    objAJAX.send();
    objAJAX.onreadystatechange = confirmDeleteBox;
}

function confirmDeleteBox(){//añadir parámetros
    
    if(objAJAX.readyState === 4 && objAJAX.status === 200){
		var idBox = JSON.parse(objAJAX.responseText);	
                
            if( idBox === false ){
                document.getElementById('idBoxDelete').innerHTML = "-- no existen cajas de este tipo --";
            }
            else{
                var type = idBox.TIPO_CAJA;
                
                switch(type){
                    case "Caja Sorpresa":
                        typeBox = 'caja_sorpresa';
                        break;
                    case "Caja Negra":
                        typeBox = 'caja_negra';
                        break;
                    case "Caja Fuerte":
                        typeBox = 'caja_fuerte';
                        break;
                }
                
                id = idBox.CODIGO;
                
                div = document.createElement('div');
                div.setAttribute('id', 'secureDeleteDiv');
                div.setAttribute('class', 'secureDelete');
                span = document.createElement('span');
                text1 = document.createTextNode('¿Eliminar '+idBox.TIPO_CAJA+' con ID: '+idBox.CODIGO+' que se encuentra en la estanteria '+idBox.ESTANTERIA+' leja '+idBox.LEJA+'?');
                span.appendChild(text1);
                span.setAttribute('class', 'title');
                div.appendChild(span);

                table = document.createElement('table');
                table.setAttribute('class', 'tablaDelete');
                    trcab = document.createElement('tr');
                        td = document.createElement('td');
                        td.appendChild(document.createTextNode('DIMENSIONES'));
                    trcab.appendChild(td);
                        td = document.createElement('td');
                        td.appendChild(document.createTextNode('COLOR'));
                    trcab.appendChild(td);
                        td = document.createElement('td');
                        td.appendChild(document.createTextNode('CARACTERISTICA'));
                    trcab.appendChild(td);
                table.appendChild(trcab);
                    trdat = document.createElement('tr');
                        td = document.createElement('td');
                        td.appendChild(document.createTextNode(idBox.DIMENSIONES));
                    trdat.appendChild(td);
                        td = document.createElement('td');
                        td.setAttribute('style', 'background-color:'+idBox.COLOR);
                    trdat.appendChild(td);
                        td = document.createElement('td');
                        td.appendChild(document.createTextNode(idBox.CARACTERISTICA));
                    trdat.appendChild(td);
                table.appendChild(trdat);
                
                div.appendChild(table);
                
                cancelar = document.createElement('button');
                text = document.createTextNode('Cancelar');
                cancelar.appendChild(text);
                cancelar.setAttribute('onclick', 'noDelete()');

                aceptar = document.createElement('button');
                text = document.createTextNode('Aceptar');
                aceptar.appendChild(text);
                aceptar.setAttribute('onclick', 'deleteBox("'+typeBox+'",'+id+')');
//                aceptar.addEventListener('click', function(){deleteBox(typeBox, id);});

                div.appendChild(document.createElement('br'));
                div.appendChild(cancelar);
                div.appendChild(aceptar);

                document.body.appendChild(div);
                
            }
    }
    //return false;
}

function deleteBox(typeBox, idBox){
    Ajax();
    objAJAX.open('POST', 'http://localhost/Almacen/Controller/controlDeleteBox.php?action=delete&deleteType='+typeBox+'&idBox='+idBox, true);
    objAJAX.send();
    objAJAX.onreadystatechange = deleteOk(typeBox, idBox);
}

function deleteOk(typeBox, idBox){
    document.body.removeChild(document.getElementById("secureDeleteDiv"));
    
    div = document.createElement('div');
    div.setAttribute('class', 'secureDelete');
    div.setAttribute('id', 'secureDeleteDiv');
    
    span = document.createElement('span');
    text = document.createTextNode('¡Eliminada '+typeBox+', id '+idBox+' con éxito!');
    span.appendChild(text);
    span.setAttribute('class', 'title');
    div.appendChild(span);
    
    document.body.appendChild(div);
    
    setTimeout(function(){noDelete();}, 3000);
}

function preparingShelvesReturn(){
    Ajax();
    
    objAJAX.open('POST', 'http://localhost/Almacen/Controller/controlFreeShelves.php?', true);
    objAJAX.onreadystatechange = makeSelectShelvesReturn;
    objAJAX.send();
}

function makeSelectShelvesReturn(){
	if(objAJAX.readyState === 4 && objAJAX.status === 200){
		var shelve = objAJAX.responseText;

            if( shelve === false ){
                document.getElementById('reubCaja').innerHTML = "-- no hay estanterías disponibles --";
            }
            else{
                document.getElementById('reubCaja').innerHTML = shelve;
            }
    }
}

/*Llama a los metodos y funciones de Leja EN Caja*/
function preparingShelfReturn(value){
    Ajax();
    
    objAJAX.open('POST', 'http://localhost/Almacen/Controller/controlShelf.php?shelve='+value, true);
    objAJAX.onreadystatechange = makeSelectShelfReturn;
    objAJAX.send();
}

function makeSelectShelfReturn(){
    if(objAJAX.readyState === 4 && objAJAX.status === 200){
		var shelf = objAJAX.responseText;	
                
            if( shelf === false ){
                document.getElementById('reubLejaCaja').innerHTML = "-- no hay lejas disponibles --";
            }
            else{
                document.getElementById('reubLejaCaja').innerHTML = shelf;
            }
    }
}

function returnTypeBox(typeBox){
    Ajax();
    objAJAX.open('POST', 'http://localhost/Almacen/Controller/controlReturnBox.php?action=muestra&typeBox='+typeBox, true);
    objAJAX.onreadystatechange = makeIdReturnBox;
    objAJAX.send();
}

function makeIdReturnBox(){
    if(objAJAX.readyState === 4 && objAJAX.status === 200){
		var idBox = objAJAX.responseText;	
                
            if( idBox === false ){
                document.getElementById('idBoxReturned').innerHTML = "-- no existen cajas de este tipo --";
            }
            else{
                document.getElementById('idBoxReturned').innerHTML = idBox;
            }
    }
}

function secureReturnBox(typeBoxReturned, idBoxReturned, estanteria, leja){
    Ajax();
    objAJAX.open('POST', 'http://localhost/Almacen/Controller/controlReturnBox.php?action=reubica&typeBox='+typeBoxReturned+'&idBox='+idBoxReturned+'&shelve='+estanteria+'&shelf='+leja, true);
    objAJAX.onreadystatechange = responseReturnBox;
    objAJAX.send();
}

function responseReturnBox(){
    if(objAJAX.readyState === 4 && objAJAX.status === 200){
	
        div = document.createElement('div');
        div.setAttribute('class', 'secureDelete');
        div.setAttribute('id', 'secureDeleteDiv');

        span = document.createElement('span');
        text = document.createTextNode('¡Reubicación exitosa!');
        span.appendChild(text);
        span.setAttribute('class', 'title');
        div.appendChild(span);

        document.body.appendChild(div);

        setTimeout(function(){noDelete();}, 5000);

    }
//    else{
//        
//        div = document.createElement('div');
//        div.setAttribute('class', 'secureDelete');
//        div.setAttribute('id', 'secureDeleteDiv');
//
//        span = document.createElement('span');
//        text = document.createTextNode('¡'+objAJAX.status+'!');
//        span.appendChild(text);
//        span.setAttribute('class', 'title');
//        div.appendChild(span);
//
//        document.body.appendChild(div);
//
//        setTimeout(function(){noDelete();}, 5000);
//    }
}

function login(){
    
    user = nomUsuario.value;
    pass = contrasena.value;
    
    Ajax();
    objAJAX.open('POST', 'http://localhost/Almacen/Controller/controlUsers.php?user='+user+'&pass='+pass, true);
    objAJAX.send();
    objAJAX.onreadystatechange = permiso;
    return false;
    /*
     * devolver "falso" permite cargar todos los datos
     * tras ejecutar todas las funciones oportunas sin que se 
     * recargue el formulario automáticamente, pues
     * es su naturaleza, recargarse una vez haces click en un boton.
     * 
     * @returns {false}
     */
}


