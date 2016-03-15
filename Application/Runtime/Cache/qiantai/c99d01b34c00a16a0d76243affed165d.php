<?php if (!defined('THINK_PATH')) exit();?><style>
    input,select{
        min-width: 150px;
    }

    .form-group{
        margin-top: 10px;
    }
</style>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><a href="#">我的订单</a></li>
                    <li class="active">订单查看</li>
                </ol>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">我的货源列表</div>
                <div class="panel-body">
                    <form class="form-inline">
                        <div class="form-group">
                            <label>订单编号</label>
                            <input type="text" class="form-control" id="code" style="width: 250px;">
                        </div>

                        <div class="form-group">
                                <label>发货时间</label>
                                <input type="date" class="form-control" id="from_date">
                                <label>至</label>
                                <input type="date" class="form-control" id="to_date">
                            <label>状　　态</label>
                            <select id="state" class="form-control" style="width: 130px;">
                                <option value=""></option>
                                <option value="order">通知司机提货</option>
                                <option value="cost">等待确认实发信息</option>
                                <option value="settle">等待确认杂费</option>
                                <option value="settlecomplete">等待签收</option>
                                <option value="contract">等待发货</option>
                                <option value="signoff">送达</option>
                                <option value="delivery">运输中</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">运输城市 </label>
                            <select id="loc_province" class="form-control"></select>
                            <select id="loc_city" class="form-control"></select>
                            <label>至</label>
                            <select id="loc_province1" class="form-control"></select>
                            <select id="loc_city1" class="form-control"></select>
                        </div>
                        <br>

                        <div class="form-group" style="float: right">
                            <button id="serch" type="button" class="btn btn-primary btn-sm">搜　　索
                            </button>
                        </div>
                    </form>
                </div>
            </div>


            <div class="panel panel-default">
                <div class="panel-heading">
                    订单信息
                </div>
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
        'click .replyCost': function (e, value, row, index) {
            replyCost(row.orderId)
        },
        'click .replyExtras': function (e, value, row, index) {
            replyExtras(row.orderId)
        }
    }
    $('#table').bootstrapTable({
        url: '<?php echo U("order");?>',
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
                if (value == 'order') {
                    return '<span class="label label-default">通知司机提货</span>'
                } else if (value == 'cost') {
                    return '<span class="label label-warning">等待确认实发信息</span>'
                } else if (value == 'settle') {
                    return '<span class="label label-warning">等待确认杂费</span>'
                } else if (value == 'settlecomplete') {
                    return '<span class="label label-warning">等待签收</span>'
                } else if (value == 'contract') {
                    return '<span class="label label-warning">等待发货</span>'
                } else if (value == 'signoff') {
                    return '<span class="label label-success">送达</span>'
                } else {
                    return '<span class="label label-primary">运输中</span>'
                }
            }
        }, {
            title: '订单编号',
            field: '',
        }, {
            title: '发货日期',
            field: 'deliveryDate',
        }, {
            title: '货物名称',
            field: 'deliveryDate',
        }, {
            title: '装车地区',
            field: 'startStation',
            visible: false
        }, {
            field: 'startAddress',
            title: '装车详细地址',
            visible: false,

        }, {
            title: '卸货地区',
            field: 'endStation',
            visible: false
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
            field: 'describe',
            title: '备注',
            visible: false
        }, {
            field: 'price',
            title: '报价'
        }, {
            field: 'cost',
            title: '实际运费',
            formatter: function (value, row, index) {
                return '<span class="label label-info">' + value + '</span>'
            },

        }, {
            field: 'damageCost',
            title: '运损',
            formatter: function (value, row, index) {
                return '<span class="label label-warning">' + value + '</span>'
            },
        }, {
            field: 'extraCost',
            title: '杂费',
            formatter: function (value, row, index) {
                return '<span class="label label-warning">' + value + '</span>'
            },
        }, {
//                field: '',
            title: '操作',
            formatter: function (value, row, index) {
                if (row.state == 'cost') {
                    return ['<a class="replyCost" href="javascript:void(0)">接受运费</a>'].join('&nbsp;')
                } else if (row.state == 'settle') {
                    return ['<a class="replyExtras" href="javascript:void(0)">接受杂费</a>'].join('&nbsp;')
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
    function replyCost(id) {
        $.post(
                "<?php echo U('Car/replyCost');?>",
                {
                    orderId: id
                },
                function (data) {
                    console.log(data)
                    if (data.result == 'success') {
                        Lobibox.notify('success', {
                            size: 'mini',
                            width: 300,
                            msg: '确认费用成功，等待发货'
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
                    }
                },
                'json'
        )
    }

    function replyExtras(id) {
        $.post(
                "<?php echo U('Car/replyExtras');?>",
                {
                    orderId: id
                },
                function (data) {
                    console.log(data)
                    if (data.result == 'success') {
                        Lobibox.notify('success', {
                            size: 'mini',
                            width: 300,
                            msg: '确认杂费成功，等待签收'
                        });
                        $('#table').bootstrapTable('refresh')
                    } else if (data.result == 'error') {
                        Lobibox.notify('error', {
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
                    }
                },
                'json'
        )
    }
</script>