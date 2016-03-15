<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <meta charset="UTF-8">
    <title>进行中货单</title>
                <!-- jQuery -->
            <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js  "></script>
            <script src="http://apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>


            <!-- Bootstrap JavaScript -->
            <script type="text/javascript" src="/Public/js/bootstrap.js"></script>
            <script type="text/javascript" src="/Public/js/bootstrap-table.js"></script>
            <script type="text/javascript" src="/Public/js/bootstrap-table-zh-CN.js"></script>
            <script src="http://apps.bdimg.com/libs/angular.js/1.4.0-beta.4/angular.min.js"></script>
            <!--<script src="http://apps.bdimg.com/libs/angular-route/1.3.13/angular-route.js"></script>-->
            <!-- import -->
            <!-- <script type="text/javascript" src="/Public/Js/bootstrap.js"></script> -->

            <!-- load -->
             <!---->

            <!-- css -->
             <link rel="stylesheet" type="text/css" href="/Public/css/bootstrap.min.css" />
             <link rel="stylesheet" type="text/css" href="/Public/css/bootstrap-table.css" />
             <link rel="stylesheet" type="text/css" href="/Public/css/normalize.css" />
             <link rel="stylesheet" type="text/css" href="/Public/css/jquery-ui-1.10.0.custom.css" />
             <!--<link rel="stylesheet" type="text/css" href="/Public/css/lanrenzhijia.css" />-->



            <!-- js -->
             <script type="text/javascript" src="/Public/js/json.js"></script>
            <script>

                var app = angular.module('app', []);

                app.controller('cityCtrl', ['$scope', function ($scope) {
                    $scope.error = {};
                    $scope.list = json;
                }]);
            </script>
</head>
<body style="background-color: #ffffff">
<style>

    table {
        padding: 0;
        text-align: center;
        font-size: 12px;
    }

    table th {
        text-align: center;
    }

    p {
        color: #0000bf;
    }
</style>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="page-header">
                <h3>
                    我的货源
                </h3>
            </div>
            <div class="container jiange" style="width: 800px;">
                <form class="form-inline" id="serchInfo">
                    <div class="form-group" style="width: 100%">
                        <div class="form-group" style="width: 100%" ng-app='app' ng-controller='cityCtrl'>
                            <div class="form-group">
                                <label class="control-label formlabel1">发货城市 </label>
                                <select class="form-control" ng-model="selected1" ng-options="s.text for s in list">
                                    <option value="">--请选择--</option>
                                </select>
                                <input hidden name='from_province' value="{{selected1.text}}">
                                <select class="form-control" ng-model="selected2"
                                        ng-options="sh.text for sh in selected1.children">
                                    <option value="">--请选择--</option>
                                </select>
                                <input hidden name='from_city' value="{{selected2.text}}">
                            </div>
                            <label class="control-label formlabel1">到货城市</label>

                            <div class="form-group">
                                <select class="form-control" ng-model="selected3" ng-options="s.text for s in list">
                                    <option value="">--请选择--</option>
                                </select>
                                <input hidden name='to_province' value="{{selected3.text}}">
                                <select class="form-control" ng-model="selected4"
                                        ng-options="sh.text for sh in selected3.children">
                                    <option value="">--请选择--</option>
                                </select>
                                <input hidden name='to_city' value="{{selected4.text}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>发货日期</label>
                            <input id="from_date" name="from_date" type="date" class="form-control" placeholder=""
                                   style="width: 185px;">
                            <label>－－－－</label>
                            <input name="to_date" type="date" class="form-control" placeholder="" style="width: 185px;">
                        </div>
                        <div class="col-md-10"></div>
                        <div class="col-md-2" style="text-align: right">
                            <button id="serch" type="button" class="btn btn-primary"
                                    style="width: 80px;height: 30px;margin: 10px">搜　　索
                            </button>
                            <button  id="reset" type="button" class="btn btn-primary"
                                     style="width: 80px;height: 30px;margin: 10px">重　　置
                            </button>
                            <input id="res" name="res" type="reset" style="display:none;" />
                        </div>
                    </div>
                </form>
            </div>

            <!--实发信息-->

            <div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" style="width: 300px" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">实发信息</h4>
                        </div>
                        <div class="modal-body">
                            <input type="text" name="orderId" id="orderId" style="display: none">
                            实际运费：<input type="text" name="cost" id="cost">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" onclick="cost()">确定</button>
                            <script>
                                function cost() {
                                    $.post(
                                            '<?php echo U("costGoods");?>',
                                            {
                                                orderId: $('#orderId').val(),
                                                cost: $('#cost').val()
                                            },
                                            function (data) {
                                                if (data.result == 'success') {
                                                    alert('录入成功')
                                                    window.location.replace("<?php echo U('myGooding');?>")
                                                } else {
                                                    alert(data.describe);
                                                    window.location.replace("<?php echo U('myGooding');?>")
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
                <div class="modal-dialog" style="width: 450px" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">运损／杂费</h4>
                        </div>
                        <div class="modal-body">
                            <input type="text" name="orderId" id="orderId1" style="display: none">

                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">杂费：</label>

                                    <div class="col-sm-9">
                                        <!--<input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
                                        <input type="text" class="form-control" name="extraCost" id="extraCost"
                                               style="margin-bottom: 10px">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">运损：</label>

                                    <div class="col-sm-9">
                                        <!--<input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
                                        <input type="text" class="form-control" name="damageCost" id="damageCost"
                                               style="margin-bottom: 10px">
                                    </div>
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

                                                    alert('录入成功')
                                                    $('#extraInfo').modal('hide');
                                                    window.location.replace("<?php echo U('myGooding');?>")

                                                } else {
                                                    alert(data.describe);
                                                    window.location.replace("<?php echo U('myGooding');?>")
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
            <div class="container" style="min-width: 100%">
                <div class="panel panel-default">
                    <div class="heading" style="padding-top: 10px;">
                        我的货源列表
                    </div>
                    <table id="table"
                           data-detail-view="true"
                           data-detail-formatter="detailFormatter"></table>
                </div>
            </div>


        </div>
    </div>
</div>
<style>
    th {
        background-color: lightgrey
    }
</style>
<script>
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
            html.push('<p><b>' + key + ':</b> ' + value + '</p>');
        });
        return html.join('');
    }
    $('#table').bootstrapTable({
        url: '<?php echo U("Good/tableTest");?>',
        height: 500,
        sidePagination:'server',
        pagination: true,
//        pageSize: 1,
        pageList: [1,2, 3, 4, 5],
        search: true,
        showColumns: true,
        showRefresh: true,
        clickToSelect: true,
        singleSelect: true,
        queryParams: queryParams,//参数
        columns: [
            {
                field: 'status',
                checkbox: true
            }, {
                field: 'state',
                title: '状态'
            }, {
                field: 'deliveryDate',
                title: '发货日期'
            }, {
                field: 'goodsType',
                title: '货物类型',
                visible: false
            }, {
                field: 'goodsLoadSize',
                title: '货物描述'
            }, {
                field: 'startAddress',
                title: '装货地址'
            }, {
                field: 'endAddress',
                title: '卸货地址'
            },]
    });

    function queryParams(params) {
//        console.log(params.order)
        params.from_date = $('#from_date').val();
        return params
    }
</script>
</body>
</html>