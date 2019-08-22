$ = {};
$.ajax = function (config) {
    var type = config.type ? config.type : 'get';
    var url = config.url ? config.url : '';
    var data = config.data ? config.data : {};
    var callback = config.success ? config.success : function (e) {};
    //处理参数为query查询字符串格式
    var param = [];
    for (var k in data) {
        param.push(k + '=' + data[k]);
    }
    param = param.join('&');
    //如果是get请求将参数拼接到url上
    if (type.toLocaleLowerCase() == 'get') {
        url += '?' + param;
    }

    var ajax = new XMLHttpRequest();

    ajax.open(type, url);
    //ajax请求标识，用于后台判断
    ajax.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    //判断是否为pos请求
    if (type.toLocaleLowerCase() == 'post') {
        //设置post请求类型
        ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    }


    ajax.onreadystatechange = function () {
        if (ajax.status == 200 && ajax.readyState == 4) {
            //将返回的json数据转换为js对象
            var res = JSON.parse(ajax.responseText);
            //调用回调函数进行后续处理
            callback(res);
        }
    };

    ajax.send(param);
};

$.formatData = function (times) {
    var now = new Date(parseInt(times) * 1000);
    var year = now.getFullYear();
    var month = now.getMonth() + 1;
    var date = now.getDate();
    var hour = now.getHours();
    var minute = now.getMinutes();
    var second = now.getSeconds();
    return year + "-" + month + "-" + date + " " + hour + ":" + minute + ":" + second;
};

var requestData = {};
var page_box = document.getElementById('page-box');
page_box.addEventListener('click', function (e) {
    e.preventDefault(); //禁用默认事件
    if (e.target.tagName.toLowerCase() == 'a') {
        //获取a标签的属性值
        requestData.p = e.target.getAttribute('page');
        getData();
    }
});

function change_status(t, controller) {
    var id = t.parentNode.parentNode.getAttribute('id');
    var url = '/' + controller + '/changeStatus';
    $.ajax({
        url: url,
        data: {id: id},
        success: function (res) {
            if (res.code == 0) {
                getData();
                return false;
            }
            alert(res.message);
        }
    });
}

function del(t, controller) {
    var id = t.parentNode.parentNode.getAttribute('id');
    var url = '/' + controller + '/del';
    $.ajax({
        url: url,
        data: {id: id},
        success: function (res) {
            if (res.code == 0) {
                getData();
                return false;
            }
            alert(res.message);
        }
    });
}

function search() {
    requestData.keyword = document.getElementById('keyword').value;
    requestData.p = 1;
    getData();
}
var listUrl;
function getData(url = null) {
    listUrl = url != null ? url : listUrl;
    $.ajax({
        type: 'get',
        url: listUrl,
        data: requestData,
        success: function (res) {
            if (res.code != 0) {
                alert(res.message);
                return false;
            }
            document.getElementById('page-box').innerHTML = res.data.page;
            var tmp = document.getElementById('tmp-box').innerHTML;
            var data = res.data.list;
            var box = document.getElementById('data-box');
            box.innerHTML = '';
            for (var i = 0; i < data.length; i++) {
                var _tmp = tmp;
                data[i].status = data[i].status == 1 ? '启用' : '禁用';
                for (var key in data[i]) {
                    _tmp = _tmp.replace(eval('/__' + key + '__/g'), data[i][key]);
                }
                box.innerHTML += _tmp;
            }
        }
    });
}