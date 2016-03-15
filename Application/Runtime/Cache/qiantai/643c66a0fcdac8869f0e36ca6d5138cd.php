<?php if (!defined('THINK_PATH')) exit();?><script type="text/javascript">

    function Quote(id) {
//            alert(id);
        $("#myModal1").modal('show');
        $('#good_id').val(id);
    }

    function choose() {
        $.post(
                "<?php echo U('Car/quote');?>",
                $('#price').serialize(),
                function (data) {
                    console.log(data.result);
                    if (data.result == 'success') {
                        Lobibox.notify('success', {
                            size: 'mini',
                            width: 300,
                            msg: '报价成功'
                        });
                        $('#myModal1').modal('hide')

                        $('#table').bootstrapTable('refresh')

                    } else if (data.result == 'error') {

                        Lobibox.notify('warning', {
                            size: 'mini',
                            width: 300,
                            msg: data.describe
                        });
                        $('#myModal1').modal('hide')
                        $('#table').bootstrapTable('refresh')

                    } else {
                        Lobibox.notify('error', {
                            size: 'mini',
                            width: 300,
                            msg: '操作失败，请联系客服'
                        });
                        $('#myModal1').modal('hide')
                    }
                },
                'json'
        )
    }

</script>
<style>

    table {
        padding: 0;
        text-align: center;
        font-size: 12px;
    }

    table th {
        text-align: center;
    }

    table {
        text-align: center;
        font-size: 10px;
    }

    input {
        margin: 10px 0 10px 0;
    }

    button {
        margin-left: 10px;
    }
</style>

<!-- Modal 报价 -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
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
                        <input style="display: none" type="text" name="goodsId" id="good_id">
                        <label>报价&nbsp;</label>
                        <input name="price" type="number" class="form-control" placeholder="请输入报价"
                               style="width: 200px;">
                    </div>
                </form>

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-primary" onclick="choose()">提 交</button>
                &nbsp;&nbsp;&nbsp;&nbsp;
            </div>
        </div>
    </div>
</div>

<!-- 提示框-->
<div class="modal fade" id="tip" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" style="width: 420px;;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">提示</h4>
            </div>
            <div class="modal-body" id="tip_body">
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="page-header">
                <h3>
                    货源查看
                </h3>
            </div>
            <div class="container" style="width: 800px;">
                <form class="form-inline" method="get">
                    <div class="col-sm-8">

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

                    </div>
                    <div class="col-sm-4" style="margin-top: 3%">
                        <button id="reset" type="button" class="btn btn-primary"
                                style="float:right;;margin-bottom: 10px">
                            重　　置
                        </button>
                        <button id="serch" type="button" class="btn btn-primary"
                                style="float: right;;margin-bottom: 10px">
                            搜　　索
                        </button>

                        <input type="reset" name="res" style="display:none;">
                    </div>
                </form>
            </div>
            <div class="container" style="width: 100%">
                <div class="panel panel-default">
                    <div class="heading" style="padding-top: 10px;">
                        货源查看
                    </div>
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
        'click .quote': function (e, value, row, index) {
//            alert(row.goodsId)
            Quote(row.goodsId)
        }

    };
    $('#table').bootstrapTable({
        url: '<?php echo U("lookgoods");?>',
//        method: 'post',
        height: 700,
        sidePagination: 'server',
        pagination: true,
//        pageSize: 1,
        pageList: [1, 2, 3, 4, 5],
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
            field: 'startAddress',
            title: '装货地址',
            visible: false
        }, {
            field: 'endAddress',
            title: '卸货地址',
        }, {
            field: 'describe',
            title: '备注'
        }, {
//                field: '',
            title: '操作',
            formatter: function (value, row, index) {
                return [
                    '<a class="quote" href="javascript:void(0)" title="quote">抢单报价</a>'
//                    '<i class="glyphicon glyphicon-map-marker"></i>',
//                    '</a>',

                ].join('&nbsp;');
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