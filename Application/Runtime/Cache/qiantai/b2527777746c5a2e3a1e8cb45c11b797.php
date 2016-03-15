<?php if (!defined('THINK_PATH')) exit();?><link rel="stylesheet" type="text/css" href="/Public/css/star/star-rating.css" />
<script type="text/javascript" src="/Public/js//star/star-rating.js"></script>
<div class="container-fluid">
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
<!--回单图片-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                <img id="img" src="" alt="">
            </div>
        </div>
    </div>
</div>
<!--评价-->
<div class="modal fade" id="star" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form class="form-inline">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">评价</h4>
                </div>
                <div class="modal-body">
                    <input type="text" name="orderId" id="orderId" style="display: none">
                    <div class="control-group" style="margin-bottom: 10px">
                        <!--<label class="control-label" >评分</label>-->
                    <input id="input-21e" value="0" type="number" name="socre" class="rating form-control" data-size="xs">
                        </div>
                    <div class="control-group">
                        <label class="control-label">评语</label>
                        <textarea class="form-control" name="content" style="width: 100%;font-size: 12px"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal" onclick="sum()">提交评价</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    function sum(){
        alert($('#input-21e').val()+"---"+$('#con').val())
    }
    jQuery(document).ready(function () {
        $(".rating-kv").rating();
    });
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
            $.post('<?php echo U("lookImage");?>', {goodsId: row.goodsId}, function (data) {
//                console.log(data)
                if (data.result == 'success') {
                    $('#img').attr('src', 'data:image/png;base64,' + data.image);
                    $('#myModal').modal('show')
                }
            }, 'json')
        },
        'click .evaluate': function (e, value, row, index) {
            $('#orderId').val(row.goodsId);
            $('#star').modal('show');
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
//            visible: false,
        }, {
            field: 'goodsName',
            title: '货物名称',
//            visible: false,
        }, {
            field: 'goodsType',
            title: '货物类型',
            visible: false,
        }, {
            field: 'goodsLoadSize',
            title: '货物描述',
            visible: false,
        }, {
            field: 'startAddress',
            title: '装车地址',
            visible: false,

        }, {
            field: 'endAddress',
            title: '卸货地址',
            visible: false,

        }, {
            field: 'name',
            title: '货主名',
            visible: false,
        }, {
            field: 'phone',
            title: '货主电话'
        }, {
            field: 'cost',
            title: '成交价格',
            visible: false
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
            visible: false,

        }, {
            field: 'deliveryTime',
            title: '发货时间',
            visible: false,
        }, {
            field: 'arrivedTime',
            title: '送达时间',
            visible: false,
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
                    '</a>', '<a class="evaluate" href="javascript:void(0)" title="picture">评价</a>'
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