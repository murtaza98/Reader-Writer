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
            
            var read_div = document.getElementById("read_queue");
            
            read_div.innerHTML = "";
            
            var myObj = JSON.parse(this.responseText);
            
            for (x in myObj) {
                
                var temp_process_name = myObj[x].process_name;
                var temp_arrival_time = myObj[x].arrival_time;
                
                var tr_div = document.createElement("tr");
                
                var td_div_process = document.createElement("td");
                td_div_process.innerHTML = temp_process_name;
                
                var td_div_time = document.createElement("td");
                td_div_time.innerHTML = temp_arrival_time;
                
                tr_div.appendChild(td_div_process);
                tr_div.appendChild(td_div_time);
            
                read_div.appendChild(tr_div);
            }            

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
            
            var write_div = document.getElementById("write_queue");
            
            write_div.innerHTML = "";
            
            var myObj = JSON.parse(this.responseText);
            
            for (x in myObj) {
                
                var temp_process_name = myObj[x].process_name;
                var temp_arrival_time = myObj[x].arrival_time;
                
                var tr_div = document.createElement("tr");
                
                var td_div_process = document.createElement("td");
                td_div_process.innerHTML = temp_process_name;
                
                var td_div_time = document.createElement("td");
                td_div_time.innerHTML = temp_arrival_time;
                
                tr_div.appendChild(td_div_process);
                tr_div.appendChild(td_div_time);
            
                write_div.appendChild(tr_div);
            }

        }
    }
    
    xmlhttp.open("GET","refresh_queue.php?queue_type=write",true);
    xmlhttp.send();
}

setInterval(function(){
    refresh_read_queue();
},1000);

setInterval(function(){
    refresh_write_queue();
},1000);