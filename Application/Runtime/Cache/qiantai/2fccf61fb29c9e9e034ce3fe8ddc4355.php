<?php if (!defined('THINK_PATH')) exit();?><div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><a href="#">我的订单</a></li>
                    <li class="active">订单查看</li>
                </ol>
            </div>
            <div class="container" style="width: 100%;">
                <div class="panel panel-primary">
                    <div class="panel-heading">搜索条件</div>
                    <div class="panel-body">
                        <form class="form-inline">
                            <div class="form-group" style="width: 100%">
                                <div class="form-group">
                                    <label class="control-label">运输城市 </label>
                                    <select id="loc_province" class="form-control"></select>
                                    <select id="loc_city" class="form-control"></select>
                                </div>
                                <div class="form-group">
                                    <label>至</label>
                                    <select id="loc_province1" class="form-control"></select>
                                    <select id="loc_city1" class="form-control"></select>
                                    <label>状　　态</label>
                                    <select id="state" class="form-control" style="width: 130px;">
                                        <option value=""></option>
                                        <option value="order">等待装货</option>
                                        <option value="cost">等待车主确认装货信息</option>
                                        <option value="settle">等待确认杂费</option>
                                        <option value="settlecomplete">已确认杂费</option>
                                        <option value="contract">通知发货</option>
                                        <option value="signoff">送达</option>
                                        <option value="delivery">运输中</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>发货时间</label>
                                        <input type="date" class="form-control" id="from_date">
                                    </div>
                                    <div class="form-group">
                                        <label>至</label>
                                        <input type="date" class="form-control" id="to_date">
                                    </div>
                                    <div class="form-group">
                                        <label>订单编号</label>
                                        <input type="text" class="form-control" id="code" style="width: 250px;">
                                    </div>
                                </div>
                                <br>

                                <div class="form-group" style="float: right;">　
                                    <button id="serch" type="button" class="btn btn-primary btn-sm">搜　　索
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

                <!--实发信息-->
                <style>
                    input, select {
                        margin-bottom: 5px;
                    }
                </style>
                <div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" style="width: 800px" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">实发信息</h4>
                            </div>
                            <div class="modal-body">
                                <form id="realInfo" class="form-inline" action="" method="post">
                                    <input type="text" name="orderId" id="orderId" style="display:none;">

                                    <div class="form-group" style="width: 100%">
                                        <!--<input name="type" value="nonstop" style="display: none">-->

                                        <div class="form-group">
                                            <label class="control-label">发货区域</label>
                                            <input type="text" name="startStation" id="startStation"
                                                   class="form-control"
                                                   style="width: 185px;" readonly>
                                            <label>装车地址</label>
                                            <input id='zc' name="startAddress" type="text" class="form-control"
                                                   onclick="openMap(1)"
                                                   placeholder="详细地址"
                                                   style="width: 310px; font-size: 11px">
                                            <input type="text" name="positionY" id="positionx" readonly
                                                   style="display:none;">
                                            <input type="text" name="positionX" id="positiony" readonly
                                                   style="display:none;">
                                        </div>
                                    </div>
                                    <div class="form-group" style="width: 100%">
                                        <div class="form-group">
                                            <label class="control-label">到货地址</label>
                                            <input type="text" name="endStation" id="endStation" class="form-control"
                                                   style="width: 185px;" readonly>
                                            <label>卸货地址</label>
                                            <input name="endAddress" type="text" class="form-control" placeholder="详细地址"
                                                   style="width: 310px;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>联系人名</label>
                                        <input name="name" type="text" style="width: 185px;" class="form-control"
                                               placeholder="请输入姓名">
                                    </div>
                                    <div class="form-group">
                                        <label>手机号码</label>
                                        <input name="phone" type="text" style="width: 185px;" class="form-control"
                                               placeholder="请输入手机号码">
                                    </div>
                                    <div class="form-group">
                                        <!--<label>固定电话</label>-->
                                        <!--<input name="tel" type="text" style="width: 185px;" class="form-control" readonly-->
                                        <!--placeholder="请输入固话号码">-->
                                        <label>发货日期</label>
                                        <input name="deliveryDate" type="date" class="form-control"
                                               style="width: 185px;">
                                    </div>

                                    <div class="form-group">
                                        <label>货物种类</label>
                                        <select id="good_types" class="form-control" style="width: 185px;">
                                            <option>重货</option>
                                            <option>泡货</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>货物类型</label>
                                        <select name="goodsType" class="form-control" style="width: 185px;">
                                            <option>设备</option>
                                            <option>矿产</option>
                                            <option>建材</option>
                                            <option>食品</option>
                                            <option>蔬菜</option>
                                            <option>生鲜</option>
                                            <option>药品</option>
                                            <option>化工</option>
                                            <option>木材</option>
                                            <option>家畜</option>
                                            <option>纺织品</option>
                                            <option>日用品</option>
                                            <option>电子电器</option>
                                            <option>农夫产品</option>
                                            <option>其他类型</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>货物名称</label>
                                        <input name="goodsName" type="text" style="width: 185px;" class="form-control"
                                               placeholder="输入货物名称">
                                    </div>
                                    <div class="form-group">
                                        <label>件　　数</label>
                                        <input id="good_number" type="number" name="" style="width: 185px;"
                                               class="form-control"
                                               placeholder="输入货物件数">
                                    </div>
                                    <label>体　　积</label>

                                    <div class="input-group input-group-sm">
                                        <input id="good_volume" type="number" style="width: 153px;" class="form-control"
                                               placeholder="输入体积">
                                        <span class="input-group-addon">方</span>
                                    </div>
                                    <label>重　　量</label>

                                    <div class="input-group input-group-sm">

                                        <input id="good_weight" type="number" class="form-control" placeholder="输入重量"
                                               style="width: 153px;">
                                        <span class="input-group-addon">吨</span>
                                    </div>
                                    <input type="text" name="goodsLoadSize" id="goodsLoadSize" style="display: none">

                                    <!--<div class="form-group">-->
                                    <!--<label>车　　型</label>-->
                                    <!--<select name="carType" class="form-control" id="chexing" style="width: 185px;">-->
                                    <!--<option>厢式车</option>-->
                                    <!--<option>平板车</option>-->
                                    <!--<option>高低板车</option>-->
                                    <!--<option>高栏车</option>-->
                                    <!--<option>中栏车</option>-->
                                    <!--<option>低栏车</option>-->
                                    <!--<option>罐式车</option>-->
                                    <!--<option>冷藏车</option>-->
                                    <!--<option>保暖车</option>-->
                                    <!--<option>危险品车</option>-->
                                    <!--<option>铁笼车</option>-->
                                    <!--<option>集装箱</option>-->
                                    <!--<option>自卸货车</option>-->
                                    <!--<option>其他车型</option>-->
                                    <!--</select>-->
                                    <!--</div>-->
                                    <!--<div class="form-group">-->
                                    <!--<label>车　　长</label>-->
                                    <!--<select name="carLen" class="form-control" style="width: 185px;">-->
                                    <!--<option>4.2米</option>-->
                                    <!--<option>4.8米</option>-->
                                    <!--<option>5.2米</option>-->
                                    <!--<option>5.8米</option>-->
                                    <!--<option>6.2米</option>-->
                                    <!--<option>6.5米</option>-->
                                    <!--<option>6.8米</option>-->
                                    <!--<option>7.2米</option>-->
                                    <!--<option>8.0米</option>-->
                                    <!--<option>9.6米</option>-->
                                    <!--<option>12.0米</option>-->
                                    <!--<option>13.0米</option>-->
                                    <!--<option>13.5米</option>-->
                                    <!--<option>15.0米</option>-->
                                    <!--<option>17.5米</option>-->
                                    <!--<option>18.5米</option>-->
                                    <!--<option>20.0米</option>-->
                                    <!--<option>22.0米</option>-->
                                    <!--<option>24.0米</option>-->
                                    <!--</select>-->
                                    <!--</div>-->
                                    <!--<div class="form-group">-->
                                    <!--<label>载　　重</label>-->
                                    <!--<select name="carLoad" class="form-control" style="width: 185px;">-->
                                    <!--<option>8T</option>-->
                                    <!--<option>10T</option>-->
                                    <!--<option>15T</option>-->
                                    <!--<option>20T</option>-->
                                    <!--<option>25T</option>-->
                                    <!--</select>-->
                                    <!--</div>-->
                                    <div class="form-group">
                                        <label>备　　注</label>
                                        <input name="describe" type="text" class="form-control" placeholder="填写运输要求"
                                               style="width: 300px;">
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label style="color: red">实际运费</label>
                                        <input name="actualCost" type="number" style="width: 185px;"
                                               class="form-control"
                                                >
                                    </div>

                                    <div class="form-group">
                                        <label style="color: red">是否投保</label>
                                        <select id="is" class="form-control" style="width: 185px;">
                                            <option>是</option>
                                            <option>否</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label style="color: red">货物价值</label>
                                        <input id="declarePrice" name="declarePrice" type="number" style="width: 185px;"
                                               class="form-control"
                                               placeholder="请声明货物价值">
                                    </div>
                                    <div class="form-group">
                                        <label style="color: red">付款方式</label>
                                        <select name="payMethod" class="form-control" placeholder="暂时未使用"
                                                style="width: 185px;">
                                            <option></option>
                                            <option>现付</option>
                                            <option>月结</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" onclick="cost()">保存</button>
                                <script>
                                    $('#is').change(function () {
                                        if ($('#is').val() == '否') {
                                            $('#declarePrice').attr("readonly", "readonly");
                                        } else {
                                            $('#declarePrice').removeAttr("readonly")
                                        }
                                    })

                                    function cost() {
                                        $('#goodsLoadSize').val($('#good_types').val() + " " + $('#good_volume').val() + "立方/" + $('#good_weight').val() + "吨")
                                        $.post(
                                                '<?php echo U("costGoods");?>',
                                                $('#realInfo').serialize(),
                                                function (data) {
                                                    if (data.result == 'success') {
//                                                    alert('录入成功')
//                                                    window.location.replace("<?php echo U('myGooding');?>")
                                                        Lobibox.notify('success', {
                                                            size: 'mini',
                                                            width: 300,
                                                            msg: '录入成功，等待车主确认'
                                                        });
                                                        $('#info').modal('hide')
                                                        $('#table').bootstrapTable('refresh')
                                                    } else if (data.result == 'error') {
                                                        Lobibox.notify('warning', {
                                                            size: 'mini',
                                                            width: 300,
                                                            msg: data.describe
                                                        });
                                                        $('#info').modal('hide')
                                                        $('#table').bootstrapTable('refresh')
                                                    } else {
                                                        Lobibox.notify('error', {
                                                            size: 'mini',
                                                            width: 300,
                                                            msg: '操作失败'
                                                        });
                                                        $('#info').modal('hide')
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
                </div>
                <div class="modal fade" id="extraInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" style="width: 300px" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">运损／杂费</h4>
                            </div>
                            <div class="modal-body">
                                <input type="text" name="orderId" id="orderId1" style="display: none">

                                <form class="form-inline">
                                    <div class="form-group">
                                        <label class="control-label">杂费：</label>
                                        <input type="number" class="form-control" name="extraCost" id="extraCost"
                                               style="margin-bottom: 10px;width:200px;">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">运损：</label>

                                        <input type="number" class="form-control" name="damageCost" id="damageCost"
                                               style="margin-bottom: 10px;width: 200px">
                                    </div>

                                </form>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" onclick="extra()">确定</button>
                                <script>
                                    function extra() {
                                        $.post(
                                                '<?php echo U("extrasGoods");?>',
                                                {
                                                    orderId: $('#orderId1').val(),
                                                    extraCost: $('#extraCost').val(),
                                                    damageCost: $('#damageCost').val()
                                                },
                                                function (data) {
                                                    if (data.result == 'success') {

//                                                    alert('录入成功')
                                                        Lobibox.notify('success', {
                                                            size: 'mini',
                                                            width: 300,
                                                            msg: '录入成功，等待车主确认'
                                                        });
                                                        $('#extraInfo').modal('hide');
//                                                    window.location.replace("<?php echo U('myGooding');?>")
                                                        $('#table').bootstrapTable('refresh')

                                                    } else if (data.result == 'error') {
                                                        Lobibox.notify('warning', {
                                                            size: 'mini',
                                                            width: 300,
                                                            msg: data.describe
                                                        });
                                                        $('#extraInfo').modal('hide');
//                                                    window.location.replace("<?php echo U('myGooding');?>")
                                                        $('#table').bootstrapTable('refresh')
                                                    } else {
                                                        Lobibox.notify('error', {
                                                            size: 'mini',
                                                            width: 300,
                                                            msg: '操作失败'
                                                        });
                                                        $('#extraInfo').modal('hide');
//                                                    window.location.replace("<?php echo U('myGooding');?>")
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
                </div>

                <div id="map" title="车辆跟踪(按ESC退出)">
                    <div id="mapContainer"></div>
                </div>
                <!--信息列表-->
                <div class="panel panel-default">
                    <div class="panel-heading">订单列表</div>
                    <div class="panel-body">
                        <table id="table"
                               data-detail-view="true"
                               data-detail-formatter="detailFormatter"></table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
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

        showLocation();
        showLocation1();
        showLocation3();
        showLocation4();
        $('#serch').on('click', function () {
            $('#table').bootstrapTable('refresh')
        })

        $('#reset').on('click', function () {
            $("input[name='res']").click();
            $('#table').bootstrapTable('refresh')
        })
        function detailFormatter(index, row) {
            var html = [];
            $.each(row, function (key, value) {
                html.push('<p style="text-align: left"><b>' + key + ':</b> ' + value + '</p>');
            });
            return html.join('');
        }
        window.operateEvents = {
            'click .cost': function (e, value, row, index) {
//            alert(row.orderId)
                loadData(row)
                openCost(row)
            },
            'click .deliver': function (e, value, row, index) {
//            alert(row.orderId)
                deliver(row.orderId)
            },
            'click .arrived': function (e, value, row, index) {
//            alert(row.orderId)
                arrived(row.orderId)
            },
            'click .extra': function (e, value, row, index) {
//            alert(row.orderId)
                openExtra(row.orderId)
            },
            'click .receive': function (e, value, row, index) {
//            alert(row.orderId)
                receive(row.orderId)
            }


        };
        $('#table').bootstrapTable({
            url: '<?php echo U("listmyGooding");?>',
            height: 700,
            sidePagination: 'server',
            pagination: true,
            pageSize: 10,
//        pageList: [5,10, 15, 20, 25],
//        search: true,
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
//            field: 'goodsName',
                title: '订单编号',
//            visible: false
            }, {
                field: 'state',
                title: '状态',
                formatter: function (value, row, index) {
                    if (value == 'order') {
                        return '<span class="label label-danger">等待装货</span>'
                    } else if (value == 'cost') {
                        return '<span class="label label-default">等待车主确认装货信息</span>'
                    } else if (value == 'contract') {
                        return '<span class="label label-warning">通知发货</span>'
                    } else if (value == 'delivery') {
                        return '<span class="label label-primary">运输中</span>'
                    } else if (value == 'signoff') {
                        return '<span class="label label-success">送达</span>'
                    } else if (value == 'settle') {
                        return '<span class="label label-default">等待确认杂费</span>'
                    } else if (value == 'settlecomplete') {
                        return '<span class="label label-primary">已确认杂费</span>'
                    }
                }
            }, {
                field: 'goodsName',
                title: '货物名称',
//            visible: false
            }, {
                field: 'deliveryDate',
                title: '发货日期',
//            visible: false
            }, {
                field: 'goodsType',
                title: '货物类型',
                visible: false
            }, {
                field: 'goodsLoadSize',
                title: '货物描述',
                visible: false
            }, {
                field: 'startStation',
                title: '装货地址',
                visible: false
            }, {
                field: 'endStation',
                title: '卸货地址',
                visible: false
            }, {
                field: 'price',
                title: '报价',
//            visible: false
            }, {
                field: 'cost',
                title: '实际运费',
                formatter: function (value, row, index) {
                    return '<span class="label label-info">'+value+'</span>'
                }
            }, {
                field: 'damageCost',
                title: '运损',
                formatter: function (value, row, index) {
                    return '<span class="label label-warning">'+value+'</span>'
                }
//            visible: false
            }, {
                field: 'extraCost',
                title: '杂费',
                formatter: function (value, row, index) {
                    return '<span class="label label-warning">'+value+'</span>'
                }
//            visible: false
            }, {
                field: '',
                title: '保费',
                formatter: function (value, row, index) {
                    return '<span class="label label-dangrt">'+value+'</span>'
                }
//            visible: false
            }, {
                field: 'describe',
                title: '备注',
                visible: false
            }, {
//                field: '',
                title: '操作',
                formatter: function (value, row, index) {
                    if (row.state == 'order') {
                        return '<a class="cost" href="javascript:void(0)">实发信息</a>'
                    } else if (row.state == 'contract') {
                        return '<a class="deliver" href="javascript:void(0)">发货</a>'
                    } else if (row.state == 'delivery') {
                        return '<a class="arrived" href="javascript:void(0)">送达</a>'
                    } else if (row.state == 'signoff') {
                        return '<a class="extra" href="javascript:void(0)">杂费录入</a>'
                    } else if (row.state == 'settlecomplete') {
                        return '<a class="receive" href="javascript:void(0)">签收</a>'
                    }

                },
                events: operateEvents
            }]
        });


        function queryParams(params) {
            if ($('#loc_city').val() == "") {
                params.startStation = ""
            } else {
                params.startStation = $('#loc_city  option:selected').text();
            }
            if ($('#loc_city1').val() == "") {
                params.endStation = ""
            } else {
                params.endStation = $('#loc_city1  option:selected').text();
            }
            params.startDate = $('#from_date').val();
            params.endDate = $('#to_date').val();
            params.code = $('#code').val();
            params.state = $('#state').val();
            return params
        }
    </script>
    <script>

        function openMap(x, y) {
            var map;
            //初始化地图对象，加载地图
            map = new AMap.Map("mapContainer", {
                resizeEnable: true,
            });
            marker = new AMap.Marker({
//                            icon: "http://webapi.amap.com/images/marker_sprite.png",
                position: [x, y]
            });

            marker.setMap(map); // 在地图上添加点
            map.setFitView(); // 调整到合理视野


            $("#map").dialog("open");
        }
        function openCost(row) {
            $("#orderId").val(row.orderId);
            var str = row.goodsLoadSize;
//        alert(str.substring(str.indexOf('货 ')+2,str.indexOf('立方')))
//        alert(str.substring(str.indexOf('/')+1,str.indexOf('吨')))
            $('#good_volume').val(str.substring(str.indexOf('货 ') + 2, str.indexOf('立方')))
            $('#good_weight').val(str.substring(str.indexOf('/') + 1, str.indexOf('吨')))
            $('#info').modal('show');
        }

        function openExtra(id) {
            $("#orderId1").val(id);
            $('#extraInfo').modal('show');
        }

        function deliver(id) {
            $.post(
                    '<?php echo U("deliver");?>',
                    {
                        orderId: id
                    },
                    function (data) {
                        if (data.result == 'success') {
//                        alert('发货成功')
//                        window.location.replace("<?php echo U('myGooding');?>")
                            Lobibox.notify('success', {
                                size: 'mini',
                                width: 300,
                                msg: '发货成功'
                            });
                            $('#table').bootstrapTable('refresh')
                        } else if (data.result == 'error') {
//                        alert(data.describe)
//                        window.location.replace("<?php echo U('myGooding');?>")
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
                                msg: '发货失败'
                            });
                            $('#table').bootstrapTable('refresh')
                        }

                    },
                    'json'
            )
        }
        function arrived(id) {
            $.post(
                    '<?php echo U("arrived");?>',
                    {
                        orderId: id
                    },
                    function (data) {
                        if (data.result == 'success') {
                            Lobibox.notify('success', {
                                size: 'mini',
                                width: 300,
                                msg: '货物已送达'
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
                                msg: '操作失败，请联系客服'
                            });
                            $('#table').bootstrapTable('refresh')
                        }
                    },
                    'json'
            )
        }

        function receive(id) {
            $.post(
                    '<?php echo U("reveiveGoods");?>',
                    {
                        orderId: id
                    },
                    function (data) {
                        if (data.result == 'success') {
                            Lobibox.notify('success', {
                                size: 'mini',
                                width: 300,
                                msg: '货物已签收'
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
                                msg: '操作失败，请联系客服'
                            });
                            $('#table').bootstrapTable('refresh')
                        }
                    },
                    'json'
            )
        }
    </script>
</div>