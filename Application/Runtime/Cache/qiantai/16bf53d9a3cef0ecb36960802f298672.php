<?php if (!defined('THINK_PATH')) exit();?><div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
    <div class="modal-dialog" style="width: 300px" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">请输入您的报价</h4>
            </div>
            <div class="modal-body">
                <form id="price" class="form-inline" action="" method="post">
                    <div class="form-group" style="margin-bottom: 10px">
                        <input style="display: none" type="text" id="order_id">
                        <label>报价&nbsp;</label>
                        <input name="price" id="renewprice" type="number" class="form-control" placeholder="请输入报价"
                               style="width: 200px;">
                    </div>
                </form>

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="renewPrice()">提 交</button>
                <script>
                    function renewPrice() {
                        $.post('<?php echo U("renewPrice");?>', {
                            orderId: $('#order_id').val(),
                            price: $('#renewprice').val()
                        }, function (data) {
                            console.log(data)
                            if (data.result == 'success') {
                                Lobibox.notify('success', {
                                    size: 'mini',
                                    width: 300,
                                    msg: '重新报价成功！'
                                });
                                $('#table').bootstrapTable('refresh')

                            } else {
                                Lobibox.notify('error', {
                                    size: 'mini',
                                    width: 300,
                                    msg: data.describe
                                });
                                $('#table').bootstrapTable('refresh')
                            }
                        }, 'json')
                    }
                </script>
            </div>
        </div>
    </div>
</div>
<!--选车-->
<div class="modal fade" id="chooseCar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">选择车辆</h4>
            </div>
            <div class="modal-body">
                <ul id="mytab" class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#ownCar">自有车辆</a></li>
                    <li role="presentation"><a href="#socialCar">社会车辆</a>
                    </li>

                </ul>
                <div class="tab-content">
                    <input type="text" name="orderId" id="orderId" style="display: none">
                    <!--tab页 1 自有车辆-->
                    <div class="tab-pane active" id="ownCar">

                        <div class="container" style="width: 100%;margin-top: 10px">
                            <table class="table table-hover table-striped">
                                <thead>
                                <tr class="active text-center">
                                    <th>状态</th>
                                    <th>车牌号</th>
                                    <th>驾驶员</th>
                                    <th>手机号</th>
                                    <th>车型</th>
                                    <th>车长</th>
                                    <th>载重</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(is_array($mycarresourelist)): $mcrk = 0; $__LIST__ = $mycarresourelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mcr): $mod = ($mcrk % 2 );++$mcrk;?><tr class="sucess">
                                        <td>
                                            <?php if($mcr["state"] == 'order'): ?><p style="color: red">使用中</p>
                                                <?php else: ?>
                                                <p style="color:green;">空闲</p><?php endif; ?>
                                        </td>
                                        <td><?php echo ($mcr["license"]); ?></td>
                                        <td><?php echo ($mcr["name"]); ?></td>
                                        <td><?php echo ($mcr["phone"]); ?></td>
                                        <td><?php echo ($mcr["type"]); ?></td>
                                        <td><?php echo ($mcr["load"]); ?></td>
                                        <td><?php echo ($mcr["len"]); ?></td>
                                        <td><a onclick="order('<?php echo ($mcr["carId"]); ?>')">选车</a></td>
                                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--tab页 2 社会车辆-->
                    <div class="tab-pane" id="socialCar">
                        <!--信息列表-->
                        <div class="container" style="width:100%;margin-top: 10px">
                            <div class="panel panel-default">
                                <div class="heading" style="padding-top: 10px;">
                                    <p>社会车辆</p>
                                </div>
                                <table id="tableSocial"
                                       data-detail-view="true"
                                       data-detail-formatter="detailFormatter"
                                       data-title="你好"></table>
                            </div>
                        </div>
                    </div>
                </div>

                <script type="text/javascript">
                    $("#mytab a").click(function (e) {
                        e.preventDefault();
                        $(this).tab("show");
                    })
                    window.operateEvents = {
                        //让社会车辆去运输
                        'click .appointOrder': function (e, value, row, index) {
                            $.post('<?php echo U("appointOrder");?>', {
                                rentalId: row.id,
                                orderId: $('#orderId').val()
                            }, function (data) {
                                console.log(data)
                                if (data.result == 'success') {
                                    $('#tableSocial').bootstrapTable('refresh')
                                    Lobibox.notify('success', {
                                        size: 'mini',
                                        width: 300,
                                        msg: '通知司机提货运输！'
                                    });
                                    $('#chooseCar').modal('hide');
                                } else {
                                    Lobibox.notify('error', {
                                        size: 'mini',
                                        width: 300,
                                        msg: data.describe
                                    });
                                    $('#chooseCar').modal('hide');
                                }
                            }, 'json')
                        }
                    }
                    $('#tableSocial').bootstrapTable({
                        url: '<?php echo U("rentalList");?>',
                        height: 300,
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
                                if (value == 'accept') {
                                    return '<p style="color: green">空闲</p>'
                                } else {
                                    return '<p style="color: red">等待</p>'
                                }
                            }

                        }, {
                            field: 'date',
                            title: '订车日期',
                            visible: false

                        }, {
                            field: 'carLicense',
                            title: '车牌',
                            visible: false

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
                            title: '操作',
                            formatter: function (value, row, index) {
                                return '<a class="appointOrder" href="javascript:void(0)">选车</a>'

                            },
                            events: operateEvents

                        }]
                    });

                    function order(id) {
                        $.post(
                                "<?php echo U('orders');?>",
                                {
                                    orderId: $('#orderId').val(),
                                    carId: id
                                },
                                function (data) {
                                    if (data.result == 'success') {
                                        Lobibox.notify('success', {
                                            size: 'mini',
                                            width: 300,
                                            msg: '通知司机，请尽快提货'
                                        });
                                        $('#chooseCar').modal('hide')
                                        $('#table').bootstrapTable('refresh')
                                    } else if (data.result === 'error') {
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
                                            msg: '操作失败'
                                        });
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
</div>


<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><a href="#">我的报价</a></li>
                    <li class="active">我的报价</li>
                </ol>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">搜索条件</div>
                <div class="panel-body">
                    <form class="form-inline" method="get">

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
                            </div>
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
                        </div>
                        <br>
                        <div class="form-group" style="float: right">
                            <button id="reset" type="button" class="btn btn-primary btn-sm">
                                重　　置
                            </button>
                            <button id="serch" type="button" class="btn btn-primary btn-sm">
                                搜　　索
                            </button>

                            <input type="reset" name="res" style="display:none;">
                        </div>
                    </form>
                </div>
            </div>


            <!--<div class="container">-->
            <div class="panel panel-default">
                <div class="panel-heading">报价列表</div>
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
    showLocation();
    showLocation1();
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
    window.operateEvents = {
        'click .reply': function (e, value, row, index) {
            reply(row.orderId)
        }
        , 'click .chooseCar': function (e, value, row, index) {
            chooseCar(row.orderId)
        }
        , 'click .price': function (e, value, row, index) {
            $('#order_id').val(row.orderId);
            $('#myModal1').modal('show');
        }
    }
    $('#table').bootstrapTable({
        url: '<?php echo U("price");?>',
        height: 800,
        sidePagination: 'server',
        pagination: true,
        pageSize: 15,
        pageList: [15, 20, 25, 30, 35],
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
            title: '状态',
            field: 'state',
            formatter: function (value) {
                if (value == 'price') {
                    return '<span class="label label-primary">已报价</span>'
                } else if (value == 'order') {
                    return '<span class="label label-success">已委托</span>'
                }
                if (value == "reprice") {
                    return '<span class="label label-warning">重新报价</span>'
                }
            }
        }, {
            title: '货物名称',
            field: 'goodsName',
        }, {
            title: '发货日期',
            field: 'deliveryDate',
        }, {
            title: '装车地区',
            field: 'startStation',
        }, {
            field: 'startAddress',
            title: '装车详细地址',
            visible: false,

        }, {
            title: '卸货地区',
            field: 'endStation',
        }, {
            field: 'endAddress',
            title: '卸货详细地址',
            visible: false,

        }, {
            field: 'goodsType',
            title: '货物类型',
            visible: false
        }, {
            field: 'goodsLoadSize',
            title: '货物描述',
            visible: false
        }, {
            field: 'goodsDescribe',
            title: '备注',
            visible: false
        }, {
            field: 'price',
            title: '价格',
            formatter: function (value, row, index) {
                return '<span class="label label-info">'+value+'</span>';
            },
        }, {
//                field: '',
            title: '操作',
            formatter: function (value, row, index) {
                if (row.state == 'order') {
                    return ['<a class="reply" href="javascript:void(0)">拒绝承运</a>', '<a class="chooseCar" href="javascript:void(0)">选车</a>'].join('&nbsp;')
                } else if (row.state == "reprice") {
                    return '<a class="price" href="javascript:void(0)">重新报价</a>'
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
        return params
    }
    function reply(id) {
        $.post(
                "<?php echo U('Car/reply');?>",
                {
                    orderId: id
                },
                function (data) {
                    console.log(data)
                    if (data.result == 'success') {
                        Lobibox.notify('success', {
                            size: 'mini',
                            width: 300,
                            msg: '拒绝承运成功'
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
                            msg: '操作失败'
                        });
                        $('#table').bootstrapTable('refresh')
                    }
                },
                'json'
        )
    }

    function chooseCar(id) {
        $('#orderId').val(id);
        $('#chooseCar').modal('show');
    }
</script>