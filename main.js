function request_lock(type){
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    } else {  
        // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
            alert(this.responseText);

        }
    }
    
    xmlhttp.open("GET","handle_request.php?request_type="+type,true);
    xmlhttp.send();
}

var refresh_rate;

function continous_request_lock(type){
    refresh_rate = setInterval(function(){
                        request_lock(type);
                    },500);
}

function release_lock(){
    if(refresh_rate!=null && refresh_rate!=undefined){
        clearInterval(refresh_rate);
    }
}

function refresh_read_queue(){
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    } else {  
        // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
            alert(this.responseText);

        }
    }
    
    xmlhttp.open("GET","refresh_queue.php?queue_type=read",true);
    xmlhttp.send();
}

function refresh_write_queue(){
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    } else {  
        // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
            alert(this.responseText);

        }
    }
    
    xmlhttp.open("GET","refresh_queue.php?queue_type=write",true);
    xmlhttp.send();
}

setInterval(function(){
    refresh_read_queue();
},100);

setInterval(function(){
    refresh_write_queue();
},100);