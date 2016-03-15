<?php if (!defined('THINK_PATH')) exit();?><style>
    table {
        padding: 0;
        text-align: center;
        font-size: 12px;
    }

    table th {
        text-align: center;
    }
</style>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><a href="#">我的订单</a></li>
                    <li class="active">我的运费</li>
                </ol>
            </div>

            <div class="panel panel-default" style="color: #5E5E5E;">
                <div class="panel-heading">
                    <form class="form-horizontal form-inline" method="get" role="form">


                        <label class="control-label">订单号：</label>
                        <input id="goodcode" type="text" class="form-control" placeholder="订单编号"
                               style="width: 200px;">
                        <button id="serch" type="button" class="btn btn-primary btn-sm">搜　索</button>
                        <button id="reset" type="button" class="btn btn-primary btn-sm">重　置
                        </button>
                        <input id="res" name="res" type="reset" style="display:none;"/>
                    </form>
                </div>
            </div>

            <!--信息列表-->
            <div class="panel panel-primary">
                <div class="panel-heading">运费列表</div>
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
        'click .pay': function (e, value, row, index) {
            Lobibox.notify('warning', {
//                size: 'mini',
                width: 300,
                msg: '此功能暂未开放，敬请期待！'
            });
        }
    };
    $('#table').bootstrapTable({
        url: '<?php echo U("receipt");?>',
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
            formatter: function (value) {
                return '<span class="label label-danger">未付款</span>'
            }
        }, {
            field: '',
            title: '订单号',
//            visible: false,
        }, {
            field: 'startStation',
            title: '装车地址',
            visible: false,

        }, {
            field: 'endStation',
            title: '卸货地址',
            visible: false

        }, {
            field: 'goodsName',
            title: '货物名称',
//            visible: false

        }, {
            field: 'name',
            title: '货主名',
            visible: false
        }, {
            field: 'phone',
            title: '货主电话'
        }, {
            field: 'priceTime',
            title: '报价时间',
            visible: false,

        }, {
            field: 'confirmTime',
            title: '签收时间',
            visible: false,
        }, {
            field: 'cost',
            title: '实际运费'
        }, {
            field: 'damageCost',
            title: '运损'
        }, {
            field: 'extraCost',
            title: '杂费'
        }, {
            field: 'premium',
            title: '保费'
        }, {
            field: 'total',
            title: '应付',
            formatter: function (value) {
                return '<p style="color:red">' + value + '</p>'
            }
        }, {
//                field: '',
            title: '操作',
            formatter: function (value, row, index) {
                return [
                    '<a class="pay" href="javascript:void(0)">付款</a>'
                ].join('&nbsp;');
            },
            events: operateEvents
        }]
    });


    function queryParams(params) {
//        console.log(params.order)
        params.code = $('#goodcode').val();
        return params
    }
</script>
<script>
    function lookReceipt() {
        $('#myModal').modal('show');
    }
</script>