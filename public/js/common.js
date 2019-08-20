function ajax(type, url, postdata = '', callback) {
    var ajax = new XMLHttpRequest();
    ajax.open(type, url);
    //用于标识当前为ajax请求
    ajax.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    if ('post' == type) {
        //post请求
        ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    }
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var res = JSON.parse(ajax.responseText);
            callback(res);
        }
    };
    ajax.send(postdata);
}

function formatDate(times) { 
    var now=new Date(parseInt(times) * 1000); 
     var year=now.getFullYear(); 
     var month=now.getMonth()+1; 
     var date=now.getDate(); 
     var hour=now.getHours(); 
     var minute=now.getMinutes(); 
     var second=now.getSeconds(); 
     return year+"-"+month+"-"+date+" "+hour+":"+minute+":"+second; 
} 