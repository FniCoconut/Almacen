//var typeBox;
//var idBox;

function makeFormBox(value){
    var label;
    var inpt;
    var text;
    
    while(document.getElementById("box-type").hasChildNodes()){
        document.getElementById("box-type").removeChild(document.getElementById("box-type").firstChild);
    }
    switch (value){
        case "c_sorpresa":
            label = document.createElement("label");
            label.setAttribute("for", "content");
            text = document.createTextNode("Contenido de Caja Sorpresa");
            label.appendChild(text);
            
            itext = document.createElement("textarea");
            itext.setAttribute("name","content");
            itext.setAttribute("required","required");
            
            document.getElementById("box-type").appendChild(label);
            document.getElementById("box-type").appendChild(itext);
            break;
        case "c_negra":
            document.getElementById("colorp").setAttribute("value", "#FF4401");
            document.getElementById("colorp").setAttribute("disabled","disabled");
            
            label = document.createElement("label");
            label.setAttribute("for", "p-base");
            text = document.createTextNode("Placa base de Caja Negra");
            label.appendChild(text);
            
            itext = document.createElement("input");
            itext.setAttribute("type", "text");
            itext.setAttribute("name","p-base");
            itext.setAttribute("required","required");
            itext.setAttribute("maxlength","30");
            
            document.getElementById("box-type").appendChild(label);
            document.getElementById("box-type").appendChild(itext);
            break;
        case "c_fuerte":
            label = document.createElement("label");
            label.setAttribute("for", "lock");
            text = document.createTextNode("Tipo de cerradura de Caja Fuerte");
            label.appendChild(text);
            
            itext = document.createElement("input");
            itext.setAttribute("type", "text");
            itext.setAttribute("name","lock");
            itext.setAttribute("required","required");
            itext.setAttribute("maxlength","30");
            
            document.getElementById("box-type").appendChild(label);
            document.getElementById("box-type").appendChild(itext);
            break;
        default:
            break;
    }
}

function makeGestionBox(){
    while(document.getElementById("box-type-list").hasChildNodes()){
        document.getElementById("box-type-list").removeChild(document.getElementById("box-type").firstChild);
    }//esto como el padre nuestro.
            select = document.createElement("select");
            select.setAttribute("name","typeBox");
            
            option = document.createElement("option");
            option.setAttribute("value", "tBox");
            text = document.createTextNode("Todas las cajas");
            
            option.appendChild(text);
            select.appendChild(option);
            
            option = document.createElement("option");
            option.setAttribute("value","sBox");
            text = document.createTextNode("Caja Sorpresa");
            
            option.appendChild(text);
            select.appendChild(option);
            
            option = document.createElement("option");
            option.setAttribute("value","fBox");
            text = document.createTextNode("Caja Fuerte");
            
            option.appendChild(text);
            select.appendChild(option);
            
            option = document.createElement("option");
            option.setAttribute("value","nBox");
            text = document.createTextNode("Caja Negra");
            
            option.appendChild(text);
            select.appendChild(option);
            
            document.getElementById("box-type-list").appendChild(select);
}

function noDelete(){
    document.body.removeChild(document.getElementById("secureDeleteDiv"));
    location.reload(true);
}

function menuUsuario(){
    
    if( document.getElementById('miniMenu') !== null){
        document.getElementById('miniUsuario').removeChild(document.getElementById('miniMenu'));
    }
    
    miniUsuario = document.getElementById("miniUsuario");
    div = document.createElement("div");
    div.setAttribute('id', 'miniMenu');
    
        lista = document.createElement('ul');
            elemLista = document.createElement('li');
            elemLista.setAttribute("onclick", "window.location.href='../Controller/controlSession.php'");
            elemLista.appendChild(document.createTextNode('Cerrar Sesion'));
        lista.appendChild(elemLista);
            elemUser = document.createElement('li');
            elemUser.setAttribute("onclick", "window.location.href='viewAdminUser.php'");
            elemUser.appendChild(document.createTextNode('Cuenta Usuario'));
        lista.appendChild(elemUser);
        
    div.appendChild(lista);
    miniUsuario.appendChild(div);
    
}

function validaPassword(repNueva){
    nueva = document.getElementById('nueva').value;
//    repNueva = document.getElementById('repNueva');
    if(nueva !== repNueva){
        document.getElementById('cambioPass').disabled = true;
        document.getElementById('mensaje').innerHTML = 'Las contraseñas no coinciden.';
    }else{
        document.getElementById('cambioPass').disabled = false;
        document.getElementById('mensaje').innerHTML = "";
    }
            
}

function makeAdminFields(action){
    container = document.getElementById('elementosAdminUsers');
        
        while( document.getElementById('elementosAdminUsers').hasChildNodes() ){
            document.getElementById('elementosAdminUsers').removeChild(document.getElementById('elementosAdminUsers').firstChild);
        }
        
        switch(action){
            case 'eU'://al editar
                
                labelN = document.createElement('label');
                labelN.appendChild(document.createTextNode('Nombre Usuario'));

                nombreU = document.createElement('input');
                nombreU.setAttribute('type', 'text');
                nombreU.setAttribute('name', 'nombre');
                nombreU.setAttribute('maxlength', '7');
                nombreU.setAttribute('required', 'required');
                
                labelP = document.createElement('label');
                labelP.appendChild(document.createTextNode('Nueva Contraseña'));
                
                newP = document.createElement('input');
                newP.setAttribute('type', 'password');
                newP.setAttribute('name', 'newPass');
                newP.setAttribute('required', 'required');
                
                container.appendChild(labelN);
                container.appendChild(nombreU);
                container.appendChild(document.createElement('br'));
                container.appendChild(labelP);
                container.appendChild(newP);
                
                break;

            case 'dU'://al elimiar
                
                labelN = document.createElement('label');
                labelN.appendChild(document.createTextNode('Nombre Usuario'));

                nombreU = document.createElement('input');
                nombreU.setAttribute('type', 'text');
                nombreU.setAttribute('name', 'nombre');
                nombreU.setAttribute('maxlength', '7');
                nombreU.setAttribute('required', 'required');
                
                labelR = document.createElement('label');
                labelR.appendChild(document.createTextNode('Responsabilidad'));
                
                select = document.createElement('select');
                select.setAttribute('name', 'rol');
                    gern = document.createElement('option');
                    gern.setAttribute('value', 'gern');
                    gern.appendChild(document.createTextNode('Gerente'));
                    
                    empl = document.createElement('option');
                    empl.setAttribute('value', 'empl');
                    empl.appendChild(document.createTextNode('Empleado'));
                    
                select.appendChild(gern);
                select.appendChild(empl);
                
                container.appendChild(labelN);
                container.appendChild(nombreU);
                container.appendChild(document.createElement('br'));
                container.appendChild(labelR);
                container.appendChild(select);
                
                break;

            case 'aU'://al añadir
                
                labelN = document.createElement('label');
                labelN.appendChild(document.createTextNode('Nombre Usuario'));

                nombreU = document.createElement('input');
                nombreU.setAttribute('type', 'text');
                nombreU.setAttribute('name', 'nombre');
                nombreU.setAttribute('maxlength', '7');
                nombreU.setAttribute('required', 'required');
                
                labelP = document.createElement('label');
                labelP.appendChild(document.createTextNode('Contraseña'));
                
                newP = document.createElement('input');
                newP.setAttribute('type', 'password');
                newP.setAttribute('name', 'newPass');
                newP.setAttribute('required', 'required');
                
                labelR = document.createElement('label');
                labelR.appendChild(document.createTextNode('Responsabilidad'));
                
                select = document.createElement('select');
                select.setAttribute('name', 'rol');
                    gern = document.createElement('option');
                    gern.setAttribute('value', 'gern');
                    gern.appendChild(document.createTextNode('Gerente'));
                    
                    empl = document.createElement('option');
                    empl.setAttribute('value', 'empl');
                    empl.appendChild(document.createTextNode('Empleado'));
                    
                select.appendChild(gern);
                select.appendChild(empl);
                
                container.appendChild(labelN);
                container.appendChild(nombreU);
                container.appendChild(document.createElement('br'));
                container.appendChild(labelP);
                container.appendChild(newP);
                container.appendChild(document.createElement('br'));
                container.appendChild(labelR);
                container.appendChild(select);
                
                break;
                
            case 'cP':
            
                labelP = document.createElement('label');
                labelP.appendChild(document.createTextNode('Nueva contraseña'));
                
                newP = document.createElement('input');
                newP.setAttribute('type', 'password');
                newP.setAttribute('name', 'newPass');
                newP.setAttribute('required', 'required');
                newP.setAttribute('id', 'nueva');
                
                container.appendChild(labelP);
                container.appendChild(newP);
                container.appendChild(document.createElement('br'));
                
                labelP = document.createElement('label');
                labelP.appendChild(document.createTextNode('Repite nueva contraseña'));
                
                newP = document.createElement('input');
                newP.setAttribute('type', 'password');
                newP.setAttribute('name', 'repNewPass');
                newP.setAttribute('required', 'required');
                newP.setAttribute('id', 'repNueva');
                newP.setAttribute('onblur', 'validaPassword()')
                container.appendChild(labelP);
                container.appendChild(newP);
                break;
        }
    
}

function permiso(permisos){
    
        switch(permisos){
            case 0://eliminar input radio y div
                estanteria = document.getElementsByClassName('tab')[0];
                estanteria.removeChild(document.getElementById('p-shelve'));
                while( document.getElementById('delret').hasChildNodes() ){
                    document.getElementById('delret').removeChild(document.getElementById('delret').firstChild);
                }
                
                break;
                
            case 1://eliminar div
                estanteria = document.getElementsByClassName('tab')[0];
                estanteria.removeChild(document.getElementById('p-shelve'));
                break;
                
            default:
                break;
        }
    }