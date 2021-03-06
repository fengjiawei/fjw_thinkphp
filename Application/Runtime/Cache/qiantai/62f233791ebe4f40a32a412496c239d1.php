<?php if (!defined('THINK_PATH')) exit();?><link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="http://cache.amap.com/lbs/static/main.css"/>
<link rel="stylesheet" type="text/css" href="/Public/css/validation/formValidation.css" />
<script type="text/javascript"
        src="http://webapi.amap.com/maps?v=1.3&key=ce69d8b5bff1639849e1d874d630a58d"></script>
<style>
    input, select {
        min-width: 250px;
    }

    .form-group {
        margin-top: 10px;
    }
</style>
<!--修改个人车辆信息-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">修改车辆信息</h4>
            </div>
            <div class="modal-body">
                <form id="info" class="form-inline jiange" action="" method="post" style="text-align: center">
                    <div class="form-group">
                        <label>司　　机</label>
                        <input name="name" type="text" class="form-control" placeholder="请输入司机姓名">
                        <input name="memberId" style="width: 185px;display: none" type="text" class="form-control"
                               placeholder="请输入司机姓名">
                    </div>
                    <div class="form-group">
                        <label>手机号码</label>
                        <input name="phone" type="text" class="form-control"
                               placeholder="请输入手机号码">
                    </div>
                    <div class="form-group">
                        <label>牌　　照</label>
                        <input name="license" type="text" class="form-control"
                               placeholder="请输入车牌号">
                    </div>

                    <div class="form-group">
                        <label>车　　型</label>
                        <select name="type" class="form-control">
                            <option value=""></option>
                            <option>平板</option>
                            <option>高栏</option>
                            <option>封箱</option>
                            <option>高低板</option>
                            <option>槽罐</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>车　　长</label>
                        <select name="len" class="form-control">
                            <option value=""></option>
                            <option>9.6米</option>
                            <option>10.5米</option>
                            <option>13.5米</option>
                            <option>17米</option>
                            <option>18米</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>载　　重</label>
                        <select name="load" class="form-control">
                            <option value=""></option>
                            <option>8T</option>
                            <option>10T</option>
                            <option>15T</option>
                            <option>20T</option>
                            <option>25T</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="edit()">Save changes</button>
            </div>
            <script>
                function edit() {
                    $.post(
                            '<?php echo U("updateCar");?>',
                            $('#info').serialize(),
                            function (data) {
                                console.log(data)
                                if (data.result == 'success') {
//                                    alert('修改车辆信息成功')
//                                    window.location.replace("<?php echo U('myCarResoure');?>")
                                    Lobibox.notify('success', {
                                        size: 'mini',
                                        width: 300,
                                        msg: '修改车辆信息成功'
                                    });
                                    $('#myModal').modal('hide')
                                    $('#table').bootstrapTable('refresh')
                                } else if (data.result == 'error') {
                                    Lobibox.notify('warning', {
                                        size: 'mini',
                                        width: 300,
                                        msg: data.describe
                                    });
                                    $('#myModal').modal('hide')

                                    $('#table').bootstrapTable('refresh')
                                } else {
                                    Lobibox.notify('error', {
                                        size: 'mini',
                                        width: 300,
                                        msg: '操作失败，请联系客服'
                                    });
                                    $('#myModal').modal('hide')

                                    $('#table').bootstrapTable('refresh')
                                }
                            },
                            'json'
                    )
                }
            </script>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="page-header">
            <ol class="breadcrumb">
                <li><a href="#">车源发布</a></li>
                <li class="active">我的车队</li>
            </ol>
        </div>
        <ul id="mytab" class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#ownCar">自有车辆</a></li>
            <li role="presentation"><a href="#socialCar">社会车辆</a>
            </li>

        </ul>

        <div class="tab-content">
            <!--tab页 1 自有车辆-->
            <div class="tab-pane active" id="ownCar">
                <div class="panel panel-info" style="margin-top: 10px">
                    <!--<div class="panel-heading"></div>-->
                    <div class="panel-body">
                        <form id="car" method="post" class="form-inline">

                            <div class="form-group">
                                <div class="form-group">
                                    <label class="control-label">账号</label>

                                    <input type="text" class="form-control" name="account" placeholder="账号"/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">密码</label>


                                    <input type="text" class="form-control" name="password" placeholder="密码"/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">司机</label>

                                    <input type="text" class="form-control" name="name" placeholder="司机"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">手机</label>

                                <input type="text" class="form-control" name="phone" placeholder="手机"/>
                                <label class=" control-label">牌照</label>

                                <input type="text" class="form-control" name="license" placeholder="牌照"/>
                                <label class=" control-label">车型</label>

                                <select name="carType" class="form-control">
                                    <option>厢式车</option>
                                    <option>平板车</option>
                                    <option>高低板车</option>
                                    <option>高栏车</option>
                                    <option>中栏车</option>
                                    <option>低栏车</option>
                                    <option>罐式车</option>
                                    <option>冷藏车</option>
                                    <option>保暖车</option>
                                    <option>危险品车</option>
                                    <option>铁笼车</option>
                                    <option>集装箱</option>
                                    <option>自卸货车</option>
                                    <option>其他车型</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">车长</label>

                                <select name="carSize" class="form-control">
                                    <option value=""></option>
                                    <option>4.2米</option>
                                    <option>4.8米</option>
                                    <option>5.2米</option>
                                    <option>5.8米</option>
                                    <option>6.2米</option>
                                    <option>6.5米</option>
                                    <option>6.8米</option>
                                    <option>7.2米</option>
                                    <option>8.0米</option>
                                    <option>9.6米</option>
                                    <option>12.0米</option>
                                    <option>13.0米</option>
                                    <option>13.5米</option>
                                    <option>15.0米</option>
                                    <option>17.5米</option>
                                    <option>18.5米</option>
                                    <option>20.0米</option>
                                    <option>22.0米</option>
                                    <option>24.0米</option>
                                </select>
                                <label class=" control-label">载重</label>

                                <select name="carLoad" class="form-control">
                                    <option value=""></option>
                                    <option>8T</option>
                                    <option>10T</option>
                                    <option>15T</option>
                                    <option>20T</option>
                                    <option>25T</option>
                                </select>
                            </div>
                            <br>

                            <div class="form-group" style="float: right">
                                <!--<button type="submit" class="btn btn-default">Sign in</button>-->
                                <button type="submit" class="btn btn-primary btn-sm">创建
                                </button>
                                <button id="reset" type="button" class="btn btn-primary btn-sm">重置
                                </button>
                                <input id="res" name="res" type="reset" style="display:none;"/>
                                <script>
                                    function createCar() {
                                        $.post(
                                                '<?php echo U("createCar");?>',
                                                $('#car').serialize(),
                                                function (data) {
                                                    console.log(data)
                                                    if (data.result == 'success') {
                                                        Lobibox.notify('success', {
                                                            size: 'mini',
                                                            width: 300,
                                                            msg: '创建车辆成功'
                                                        });
                                                        $('#table').bootstrapTable('refresh')
                                                    } else if (data.result == 'error') {
                                                        Lobibox.notify('warning', {
                                                            size: 'mini',
                                                            width: 300,
                                                            msg: data.describe
                                                        });
                                                        $('#table').bootstrapTable('refresh')
                                                    } else {
                                                        Lobibox.notify('error', {
                                                            size: 'mini',
                                                            width: 300,
                                                            msg: '创建失败，请联系客服'
                                                        });
                                                    }
                                                },
                                                'json'
                                        )
                                    }
                                </script>
                                　　　
                            </div>
                        </form>
                    </div>


                </div>
                <!--信息列表-->
                <div class="panel panel-default">
                    <div class="panel-heading">我的车辆列表</div>
                    <div class="panel-body">
                        <table id="table"
                               data-detail-view="true"
                               data-detail-formatter="detailFormatter"
                               data-toolbar="#toolbar"></table>

                    </div>
                </div>


            </div>
            <!--tab页 2 社会车辆-->
            <div class="tab-pane" id="socialCar">
                <div class="tab-pane active">
                    <!--信息列表-->
                    <div class="panel panel-default" style="margin-top: 10px">
                        <div class="panel-heading">社会车辆</div>
                        <div class="panel-body">
                            <table id="tableSocial"
                                   data-detail-view="true"
                                   data-detail-formatter="detailFormatter"></table>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
</div>
<div id="map" title="车辆跟踪(按ESC退出)">
    <div id="mapContainer"></div>
</div>
<script>
    $("#mytab a").click(function (e) {
        e.preventDefault();
        $(this).tab("show");
    })
    $(function () {
        $("#map").dialog({
            resizable: false,
            autoOpen: false,
            modal: true,
            height: 600,
            width: 700,
            position: 'center',
            buttons: {
                "取消": function () {
                    $(this).dialog("close");
                }
            }
        });
    });
    function track(x, y) {
        var map;
        //初始化地图对象，加载地图
        map = new AMap.Map("mapContainer", {
            resizeEnable: true,
            zoom: 15,
            center: [x, y]
        });
//                map.setZoom(18)


        marker = new AMap.Marker({
//                            icon: "http://webapi.amap.com/images/marker_sprite.png",
            position: [x, y]
        });
//                map.setCenter(x,y)
//                map.setZoom(18)

        marker.setMap(map); // 在地图上添加点
//                map.setFitView(); // 调整到合理视野


        $("#map").dialog("open");
    }
</script>

<div id="toolbar">
    <button type="button" class="btn btn-deault" onclick="carDetails()">所有车辆</button>
</div>
<script>
    function carDetails() {
        var data = $('#table').bootstrapTable('getData');
        var arr = new Array();
        var carDetails = new Array();
        $.each(data, function () {
//            console.log(this.posX+" "+this.posY)
            arr = [this.posY, this.posX];
            carDetails.push(arr);
        })
//        console.log(carDetails);
        var mapObj = new AMap.Map('mapContainer', {resizeEnable: true, zoom: 4});
        var markers = [];
        for (var i = 0; i < carDetails.length; i += 1) {
//            console.log(carDetails[i])
            var marker;
            marker = new AMap.Marker({
                position: carDetails[i],
//                title: provinces[i].name,
                map: mapObj
            });
            markers.push(marker);

        }
//        mapObj.setFitView();
        $("#map").dialog("open");


    }
    function loadData(obj) {
//        var obj = eval("("+jsonStr+")");
        var key, value, tagName, type, arr;
        for (x in obj) {
            key = x;
            value = obj[x];

            $("[name='" + key + "'],[name='" + key + "[]']").each(function () {
                tagName = $(this)[0].tagName;
                type = $(this).attr('type');
                if (tagName == 'INPUT') {
                    if (type == 'radio') {
                        $(this).attr('checked', $(this).val() == value);
                    } else if (type == 'checkbox') {
                        arr = value.split(',');
                        for (var i = 0; i < arr.length; i++) {
                            if ($(this).val() == arr[i]) {
                                $(this).attr('checked', true);
                                break;
                            }
                        }
                    } else {
                        $(this).val(value);
                    }
                } else if (tagName == 'SELECT' || tagName == 'TEXTAREA') {
                    $(this).val(value);
                }

            });
        }
    }
    $('#serch').on('click', function () {
        $('#table').bootstrapTable('refresh')
    })

    $('#reset').on('click', function () {
//        $("input[name='res']").click();
        window.location.reload()

//        $('#table').bootstrapTable('refresh')
    })
    function detailFormatter(index, row) {
        var html = [];
        $.each(row, function (key, value) {
            html.push('<p><b>' + key + ':</b> ' + value + '</p>');
        });
        return html.join('');
    }
    window.operateEvents = {
        //取消订车
        'click .cancelCar': function (e, value, row, index) {
            $.post('<?php echo U("cancelCar");?>', {rentalId: row.id}, function (data) {
                console.log(data)
                if (data.result == 'success') {
                    $('#tableSocial').bootstrapTable('refresh')
                    Lobibox.notify('success', {
                        size: 'mini',
                        width: 300,
                        msg: '取消成功，可以查看其他车源'
                    });
                } else {
                    Lobibox.notify('error', {
                        size: 'mini',
                        width: 300,
                        msg: data.describe
                    });
                }
            }, 'json')
        },
        'click .map': function (e, value, row, index) {
            track(row.posY, row.posX)
        },
        'click .edit': function (e, value, row, index) {
            loadData(row);
            $('#myModal').modal('show')
        },
        'click .remove': function (e, value, row, index) {
            if (row.state == 'order') {
//                alert('车辆正在使用中不能删除')
                Lobibox.notify('warning', {
                    size: 'mini',
                    width: 300,
                    msg: '车辆正在使用中不能删除'
                });
            } else {
                $.post(
                        '<?php echo U("deleteCar");?>',
                        {memberId: row.memberId},
                        function (data) {
                            console.log(data)
                            if (data.result == 'success') {
//                                alert('删除车队成功')
                                Lobibox.notify('success', {
                                    size: 'mini',
                                    width: 300,
                                    msg: '删除车辆成功'
                                });
                                $('#table').bootstrapTable('refresh')
//                                                window.location.replace("<?php echo U('myCarResoure');?>")
                            } else if (data.result == 'error') {
                                Lobibox.notify('warning', {
                                    size: 'mini',
                                    width: 300,
                                    msg: data.describe
                                });
                                $('#table').bootstrapTable('refresh')
                            } else {
                                Lobibox.notify('error', {
                                    size: 'mini',
                                    width: 300,
                                    msg: '删除失败，请联系客服'
                                });
                            }
                        },
                        'json'
                )
            }


        },
        'click .editpwd': function (e, value, row, index) {
            $('#' + index).popover({
                title: '修改密码',
                content: "",
                placement: 'top',

                template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title">修改密码</h3><div class="popover-content"></div><input type="text" value = "' + value + '"/></div>'
            })
        }
    };
    $('#table').bootstrapTable({
        url: '<?php echo U("car");?>',
        height: 800,
//        sidePagination:'server',
        pagination: true,
        pageSize: 10,
//        pageList: [5,10, 15, 20, 25],
        search: true,
        showColumns: true,
        showRefresh: true,
        clickToSelect: true,
        singleSelect: true,
        queryParams: queryParams,//参数
//        onClickRow: function (row) {
////          console.log(row)
//            track(row.posY,row.posX)
//        },
        columns: [{
            field: 'state',
            title: '状态',
            formatter: function (value) {
                if (value == 'order') {
                    return '<span class="label label-danger">使用中</span>'
                } else {
                    return '<span class="label label-success">空闲</span>'
                }
            }
        }, {
            field: 'account',
            title: '账号',
            visible: false
        }, {
            field: 'password',
            title: '密码',
            visible: false,
//            formatter: function (value, row, index) {
//                return '<a href="javascript:void(0);" id="' + index + '" class ="editpwd" rel="popover">' + value + '</a>'
//            },
//            events: operateEvents
//                editable:true
        }, {
            field: 'license',
            title: '车牌号'
        }, {
            field: 'name',
            title: '驾驶员'
        }, {
            field: 'phone',
            title: '手机号',
        }, {
            field: 'type',
            title: '车型'
        }, {
            field: 'len',
            title: '车长',
            sortable: true
        }, {
            field: 'load',
            title: '载重',
            sortable: true
        }, {
//                field: '',
            title: '操作',
            formatter: function (value, row, index) {
                return [
                    '<a class="map" href="javascript:void(0)" title="map">',
                    '<i class="glyphicon glyphicon-map-marker"></i>',
                    '</a>',
                    '<a class="edit" href="javascript:void(0)" title="Edit">',
                    '<i class="glyphicon glyphicon-edit"></i>',
                    '</a>',
                    '<a class="remove" href="javascript:void(0)" title="Remove">',
                    '<i class="glyphicon glyphicon-remove"></i>',
                    '</a>'
                ].join('&nbsp;');
            },
            events: operateEvents
        }]
    });
    $('#tableSocial').bootstrapTable({
        url: '<?php echo U("rentalList");?>',
        height: 800,
        sidePagination: 'server',
        pagination: true,
        pageSize: 10,
//        pageList: [5,10, 15, 20, 25],
        search: true,
        showColumns: true,
        showRefresh: true,
        clickToSelect: true,
        singleSelect: true,
//        queryParams: queryParams,//参数
//        onClickRow: function (row) {
////          console.log(row)
//            track(row.posY,row.posX)
//        },
        columns: [{
            field: 'state',
            title: '状态',
            formatter: function (value) {
                if (value == 'wait') {
                    return '<span class="label label-danger">等待回复</span>'
                } else if (value == 'accept') {
                    return '<span class="label label-success">接受</span>'
                } else if (value == 'reject') {
                    return '<span class="label label-warning">拒绝</span>'
                } else if (value == 'order') {
                    return '<span class="label label-primary">指定货单</span>'
                } else if (value == 'over') {
                    return '<span class="label label-default">结束</span>'
                }
            }

        }, {
            field: 'date',
            title: '订车日期'

        }, {
            field: 'carLicense',
            title: '车牌'

        }, {
            field: 'carLoad',
            title: '载重'

        }, {
            field: 'carSize',
            title: '车长'

        }, {
            field: 'carType',
            title: '车型'

        }, {
            field: 'start',
            title: '起始地'

        }, {
            field: 'end',
            title: '目的地'

        }, {
//            field: 'end',
            title: '操作',
            formatter: function (value, row, index) {
                return '<a class="cancelCar" href="javascript:void(0)">取消订车</a>'

            },
            events: operateEvents

        }]
    });


    function queryParams(params) {
//        console.log(params.order)
        params.from_date = $('#from_date').val();
        return params
    }
</script>
<script type="text/javascript" src="/Public/js/validation/formValidation.js"></script>
<script type="text/javascript" src="/Public/js/validation/zh_CN.js"></script>
<script type="text/javascript" src="/Public/js/validation/bootstrap.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(document).ready(function () {
            // Generate a simple captcha
            function randomNumber(min, max) {
                return Math.floor(Math.random() * (max - min + 1) + min);
            };
            $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));

            $('#car')
                    .formValidation({
                        message: 'This value is not valid',
                        icon: {
                            valid: 'glyphicon glyphicon-ok',
                            invalid: 'glyphicon glyphicon-remove',
                            validating: 'glyphicon glyphicon-refresh'
                        },
                        fields: {
                            account: {

                                message: 'The username is not valid',
                                validators: {
                                    notEmpty: {
                                        message: '用户名必须设置'
                                    },
                                }
                            },
                            password: {

                                validators: {
                                    notEmpty: {
                                        message: '密码不能为空'
                                    },
                                    different: {
                                        field: 'account',
                                        message: '密码不能和用户名相同'
                                    }
                                }
                            },
                            name: {

                                validators: {
                                    notEmpty: {
                                        message: '司机姓名不能为空'
                                    }
                                }
                            },
                            phone: {

                                validators: {
                                    notEmpty: {
                                        message: '手机号码不能为空'
                                    },
                                    phone: {
                                        country: 'CN',
                                        message: '请输入有效的手机号码'
                                    }
                                }
                            },
                            license: {

                                validators: {
                                    notEmpty: {
                                        message: '牌照不能为空'
                                    }
                                }
                            },
                            carType: {

                                validators: {
                                    notEmpty: {
                                        message: '车型不能为空'
                                    }
                                }
                            },
                            carLoad: {

                                validators: {
                                    notEmpty: {
                                        message: '载重不能为空'
                                    }
                                }
                            },
                            carSize: {

                                validators: {
                                    notEmpty: {
                                        message: '车长不能为空'
                                    }
                                }
                            }
                        }
                    })
                    .on('success.form.fv', function (e) {
                        // Prevent form submission
                        e.preventDefault();

                        // Get the form instance
                        var $form = $(e.target);

                        // Get the FormValidation instance
                        var bv = $form.data('formValidation');

                        // Use Ajax to submit form data
                        $.post(
                                '<?php echo U("createCar");?>',
                                $('#car').serialize(),
                                function (data) {
                                    console.log(data)
                                    if (data.result == 'success') {
                                        Lobibox.notify('success', {
                                            size: 'mini',
                                            width: 300,
                                            msg: '创建车辆成功'
                                        });
                                        $('#table').bootstrapTable('refresh')
                                    } else if (data.result == 'error') {
                                        Lobibox.notify('warning', {
                                            size: 'mini',
                                            width: 300,
                                            msg: data.describe
                                        });
                                        $('#table').bootstrapTable('refresh')
                                    } else {
                                        Lobibox.notify('error', {
                                            size: 'mini',
                                            width: 300,
                                            msg: '创建失败，请联系客服'
                                        });
                                    }
                                },
                                'json'
                        )
                    });

        });
        ;
    });
</script>
</body>
</html>