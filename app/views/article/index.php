<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="renderer" content="webkit|ie-comp|ie-stand">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
        <meta http-equiv="Cache-Control" content="no-siteapp" />
        <link rel="Bookmark" href="/favicon.ico" >
        <link rel="Shortcut Icon" href="/favicon.ico" />
        <!--[if lt IE 9]>
        <script type="text/javascript" src="lib/html5shiv.js"></script>
        <script type="text/javascript" src="lib/respond.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="/public/admin/static/h-ui/css/H-ui.min.css" />
        <link rel="stylesheet" type="text/css" href="/public/admin/static/h-ui.admin/css/H-ui.admin.css" />
        <link rel="stylesheet" type="text/css" href="/public/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
        <link rel="stylesheet" type="text/css" href="/public/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
        <link rel="stylesheet" type="text/css" href="/public/admin/static/h-ui.admin/css/style.css" />
        <!--[if IE 6]>
        <script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
        <script>DD_belatedPNG.fix('*');</script>
        <![endif]-->
        <title>管理员列表</title>
    </head>
    <body onload="load()">
        <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 管理员列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
        <div class="page-container">
            <div class="text-c"> 日期范围：
<!--                <input type="text" onfocus="WdatePicker({maxDate: '#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}'})" id="datemin" class="input-text Wdate" style="width:120px;">
                -
                <input type="text" onfocus="WdatePicker({minDate: '#F{$dp.$D(\'datemin\')}', maxDate: '%y-%M-%d'})" id="datemax" class="input-text Wdate" style="width:120px;">-->
                <input id="keyword" type="text" class="input-text" style="width:250px" placeholder="输入管理员名称" id="" name="">
                <button type="button" class="btn btn-success" onclick="search()" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
            </div>
            <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="javascript:;" onclick="admin_add('添加管理员', '/Admin/add', '800', '500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加管理员</a></span> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
            <table class="table table-border table-bordered table-bg">
                <thead>
                    <tr>
                        <th scope="col" colspan="9">员工列表</th>
                    </tr>
                    <tr class="text-c">
                        <th width="25"><input type="checkbox" name="" value=""></th>
                        <th width="40">ID</th>
                        <th width="150">标题</th>
                        <th width="130">排序</th>
                        <th width="130">添加时间</th>
                        <th width="100">是否已启用</th>
                        <th width="100">操作</th>
                    </tr>
                </thead>
                <tbody id="data-box">
                </tbody>
                <tbody id="tmp-box" style="display: none;">
                    <tr class="text-c" id="__article_id__">
                        <td><input type="checkbox" value="__article_id__" name=""></td>
                        <td>__article_id__</td>
                        <td>__title__</td>
                        <td>__sort__</td>
                        <td>__create_at__</td>
                        <td class="td-status">__status__</td>
                        <td class="td-manage">
                            <a style="text-decoration:none" onclick="change_status(this, '<?= CONTROLLER_NAME?>')" href="javascript:;" title="状态修改"><i class="Hui-iconfont">&#xe631;</i></a>
                            <a title="编辑" href="javascript:;" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> 
                            <a title="删除" href="javascript:;" onclick="del(this, '<?= CONTROLLER_NAME?>')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
                        </td>
                    </tr>
                </tbody>
                <div id="page-box"></div>
            </table>
        </div>
        <script type="text/javascript" src="/public/js/common.js"></script>
        <script type="text/javascript">
            function load(){
                getData('/Article/index');
            }
        </script>
    </body>
</html>