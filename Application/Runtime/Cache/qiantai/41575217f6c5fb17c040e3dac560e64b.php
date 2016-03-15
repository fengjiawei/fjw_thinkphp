<?php if (!defined('THINK_PATH')) exit();?><div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><a href="#">我的订单</a></li>
                    <li class="active">我的回单</li>
                </ol>
            </div>

            <div class="panel panel-default" style="color: #5E5E5E;">
                <div class="panel-heading">
                    <form class="form-inline" method="post" role="form">
                        <label class="control-label">订单号：</label>
                        <input type="text" id="goodscode" class="form-control" placeholder="订单编号"
                               style="width: 200px;">
                        <button id="serch" type="button" class="btn btn-primary btn-sm">搜　索</button>
                        <button id="reset" type="button" class="btn btn-primary btn-sm">重　置</button>
                        <input id="res" name="res" type="reset" style="display:none;"/>
                    </form>
                </div>
            </div>

            <!--信息列表-->

            <div class="panel panel-default">
                <div class="panel-heading">回单列表</div>
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
        'click .picture': function (e, value, row, index) {
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
            field: '',
            title: '订单编号',
        }, {
            field: 'startAddress',
            title: '装车地址',
            visible: false,

        }, {
            field: 'endAddress',
            title: '卸货地址',
            visible: false

        }, {
            field: 'name',
            title: '货主名',
            visible: false
        }, {
            field: 'phone',
            title: '货主电话',

        }, {
            field: 'cost',
            title: '成交价格',
//            visible: false
        }, {
            field: 'damageCost',
            title: '运损',
            visible: false,
            sortable: true
        }, {
            field: 'extraCost',
            title: '杂费',
            visible: false,
            sortable: true
        }, {
            field: 'priceTime',
            title: '报价时间',
            visible: false

        }, {
            field: 'deliveryTime',
            title: '发货时间',
            visible: false
        }, {
            field: 'arrivedTime',
            title: '送达时间',
            visible: false
        }, {
            field: 'confirmTime',
            title: '签收时间'
        }, {
//                field: '',
            title: '操作',
            formatter: function (value, row, index) {
                return [
                    '<a class="picture" href="javascript:void(0)" title="picture">',
                    '<i class="glyphicon glyphicon-picture"></i>查看回单',
                    '</a>'
                ].join('&nbsp;');
            },
            events: operateEvents
        }]
    });


    function queryParams(params) {
//        console.log(params.order)
        params.code = $('#goodscode').val();
        return params
    }
</script>