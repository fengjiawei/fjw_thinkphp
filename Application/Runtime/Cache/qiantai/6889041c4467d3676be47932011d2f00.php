<?php if (!defined('THINK_PATH')) exit();?>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><a href="#">发布货源</a></li>
                    <li class="active">已发布货源</li>
                </ol>
            </div>
            <div class="container" style="width: 100%">
                <div class="panel panel-primary">
                    <div class="panel-heading">搜索条件</div>
                    <div class="panel-body">
                        <form class="form-inline" method="get">

                            <div class="form-group">
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
                            <div class="form-group" style="float: right;;">
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

            </div>


            <!--信息列表-->
            <div class="panel panel-default">
                <div class="panel-heading">我的货源列表</div>
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
        //查看报价
        'click .look': function (e, value, row, index) {
//            alert(row.goodsId)
            var id = row.goodsId
//            window.location.replace("<?php echo U('modal');?>?goodsId=" + id)
            $.get('<?php echo U("modal");?>', {goodsId: id}, function (data) {
                $('#goodChildView').html(data);
            })
        },
        'click .push': function (e, value, row, index) {
//            alert(row.goodsId)
            var id = row.goodsId
            $.cookie('goodsId', id);
//            window.location.replace("<?php echo U('modal');?>?goodsId=" + id)
            $.get('<?php echo U("carlist");?>', function (data) {
                $('#goodChildView').html(data);
            })
        }

    };
    $('#table').bootstrapTable({
        url: '<?php echo U("Good/listMyGood");?>',
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
            field: 'state',
            title: '状态',
            formatter: function (value, row, index) {
                if (row.orderCnt > 0) {
                    return '<span class="label label-success">已报价</span>'
                } else {
                    return '<span class="label label-danger">等待</span>'
                }
            }
//            visible: false
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
//            visible: false
        }, {
            field: 'goodsLoadSize',
            title: '货物描述'
        }, {
            field: 'startStation',
            title: '装货地址',
//            visible: false
        }, {
            field: 'endStation',
            title: '卸货地址',
        }, {
            field: 'describe',
            title: '备注',
            visible: false
        }, {
//                field: '',
            title: '操作',
            formatter: function (value, row, index) {
                if (row.orderCnt > 0) {
                    return [
                        '<a class="look" href="javascript:void(0)" title="look">查看报价</a>',
                        '<a class="push" href="javascript:void(0)" title="push">订车</a>'
                    ].join('&nbsp;');
                } else {
                    return '<a class="push" href="javascript:void(0)" title="push">订车</a>'
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
</script>
<script>
    function lookprice(id) {
        $.post(
                "<?php echo U('Good/modal');?>",
                {id: id}
        )
    }
</script>