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