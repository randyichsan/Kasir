var ajakL; 
function buatajax(){ 
    if (window.XMLHttpRequest){ 
        return new XMLHttpRequest(); 
    } 
    if (window.ActiveXObject){ 
        return new ActiveXObject("Microsoft.XMLHTTP"); 
    } 
    return null; 
} 
function stateChanged(){ 
var data; 
    if (ajakL.readyState==4 && ajakL.status==200){ 
        data=ajakL.responseText; 
        if(data.length>0){ 
            document.getElementById("sugesbrg").innerHTML = data; 
            document.getElementById("sugesbrg").style.visibility = ""; 
        }else{ 
            document.getElementById("sugesbrg").innerHTML = ""; 
            document.getElementById("sugesbrg").style.visibility = "hidden"; 
        } 
    } 
} 
function hargabrg(m,n){ 
	document.getElementById("plu").value = m;
    document.getElementById("hrbarang").value = n;
    document.getElementById("hrgbrg").value = n;
	document.getElementById("sugesbrg").style.visibility = "hidden"; 
    document.getElementById("sugesbrg").innerHTML = ""; 
    
}
function namabrg(o){ 
	document.getElementById("nmbarang").value = o; 
}
