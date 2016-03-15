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
    #fullbg {
        height: 100%;
        width: 100%;
        /*background-color: gray;*/
        left: 0;
        opacity: 0.5;
        /*position: absolute;*/
        top: 0;
        /*z-index: 3;*/
        filter: alpha(opacity=50);
        -moz-opacity: 0.5;
        -khtml-opacity: 0.5;
        position: fixed;
        /*width: 100%;*/
        /*height: 100%;*/
        background: #000;
        /*position: absolute;*/
        /*top: 0;*/
        /*left: 0;*/
        z-index: 99;
        overflow: hidden;
        display: none;
    }

    #dialog {
        left: 50%;
        top: 50%;
        margin: -200px -400px;
        position: fixed !important; /* 浮动对话框 */
        /*position:absolute;*/
        /*top:50%;*/
        /*width:800px;*/
        /*z-index:5;*/
        /*border-radius:5px;*/
        display: none;
        /*overflow-y: auto;*/
        overflow-x: hidden; /*隐藏水平滚动条*/
        width: 800px;
        /*min-width: 70%;*/
        height: 500px /* 320px */;
        max-height: calc(100% - 20px); /* 当时窗口的最大高度减去20px*/
        background-color: #fff;
        background-repeat: no-repeat;
        border: 1px solid rgb(51, 122, 182);
        border-radius: 5px;
        position: fixed; /*保证在可视区域内居中 */
        z-index: 100;
    }

    #dialog p {
        background-color: rgb(51, 122, 182);
        height: 30px;
        line-height: 30px;
        padding-left: 5px;
        cursor: move;
        margin-top: 0;
        color: white;
    }

    #close {
        text-align: right;
        padding-right: 20px;
    }

    #close a {
        color: #fff;
        text-decoration: none;
        font-size: 18px;
        line-height: 30px;
    }
</style>
<link rel="stylesheet" type="text/css" href="/Public/css/validation/formValidation.css" />
<script type="text/javascript" src="/Public/js/validation/formValidation.js"></script>
<script type="text/javascript" src="/Public/js/validation/zh_CN.js"></script>
<script type="text/javascript" src="/Public/js/validation/bootstrap.js"></script>
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
                <form id="price" class="form-horizontal" action="" method="post">
                    <div class="form-group">
                        <input style="display: none" type="text" name="goodsId" id="good_id">
                        <input name="price" type="text" class="form-control" placeholder="请输入报价">
                    </div>
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-primary">提 交</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
<script>
    $('#price')
            .formValidation({
                message: 'This value is not valid',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    price: {
                        message: '只能填写数字。',
                        validators: {
                            notEmpty: {
                                message: '价格必填'
                            },
                            digits: {},
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
            });
</script>

<!--start diolog 查看货源详情-->
<div id="fullbg" style="display: none"></div>
<div id="dialog">
    <p id="close"><a class="close" href="javascript:void(0);" onclick="closeBg();">&times;</a></p>

    <div id="container" tabindex="0">
        <div style="height: 90px">
            <h4 style="color: blue">联系方式</h4>

            <div id="1"></div>
        </div>
        <hr>
        <div style="height: 90px">
            <h4 style="color: blue">货物信息</h4>

            <div id="2"></div>
        </div>
        <hr>
        <div style="height: 90px;">
            <h4 style="color: blue">运输要求</h4>

            <div id="3"></div>
        </div>
        <!--<hr>-->
        <!--<div>-->
        <!--<button type="button" class="btn btn-primary" style="margin-left: 380px">报价</button>-->
        <!--</div>-->
    </div>

</div>
<!--end-->
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><a href="#">我要找货</a></li>
                    <li class="active">货源查看</li>
                </ol>
            </div>
            <div class="container" style="width: 100%;">
                <div class="panel panel-info">
                    <div class="panel-heading">搜索条件</div>
                    <div class="panel-body">
                        <form class="form-inline" method="get">
                            <div class="form-group" style="margin-bottom: 10px">
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

            </div>
            <div class="container" style="width: 100%">
                <div class="panel panel-default">
                    <div class="panel-heading">货源列表</div>
                    <div class="panel-body">
                        <table id="table"
                               data-detail-view="true"
                               data-detail-formatter="detailFormatter"></table>

                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<script>
    //三级联动 省市区
    showLocation();
    showLocation1();
    //关闭dialog
    function closeBg() {
        $("#1,#2,#3").html("");
        $("#fullbg,#dialog").hide();
    }
    //查询
    $('#serch').on('click', function () {
        $('#table').bootstrapTable('refresh')
    })
    //重置
    $('#reset').on('click', function () {
        $("input[name='res']").click();
        $('#table').bootstrapTable('refresh')
    })
    //纪录详细解析方法
    function detailFormatter(index, row) {
        var html = [];
        $.each(row, function (key, value) {
            html.push('<p><b>' + key + ':</b> ' + value + '</p>');
        });
        return html.join('');
    }
    //按钮方法
    window.operateEvents = {
        'click .quote': function (e, value, row, index) {
//            alert(row.goodsId)
            Quote(row.goodsId)
        },
        'click .look': function (e, value, row, index) {
            $.post('<?php echo U("findGoodById");?>', {goodsId: row.goodsId}, function (data) {
                console.log(data)
                var good = data.goods;
                $('#1').html("<li><i class='glyphicon glyphicon-user'></i>联系人:" + good.name + "</li><li><i class='glyphicon glyphicon-earphone'></i>联系方式:" + good.phone);
                $('#2').html("货物名称:" + good.goodsName + "&nbsp;货物类型:" + good.goodsType + "货物描述:" + good.goodsLoadSize
                        + "<br>装货地:" + good.startAddress + "<br>卸货地:" + good.endAddress)
                $('#3').html("<li>装货日期: " + good.deliveryDate + "</li><li> 车型要求: " + good.carLen + " " + good.carType + " " + good.carLoad + " </li><li>备注: " + good.describe + "</li>")
            }, 'json')
            $("#fullbg").css({
                display: "block"
            });
            $("#dialog").show();
        }

    };
    //表格js
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
            visible: false
        }, {
            field: 'goodsLoadSize',
            title: '货物描述'
        }, {
            field: 'startAddress',
            title: '装货地址',
//            visible: false
        }, {
            field: 'endAddress',
            title: '卸货地址',
        }, {
            field: 'describe',
            title: '备注',
//            visible: false
        }, {
//                field: '',
            title: '操作',
            formatter: function (value, row, index) {
                return [
                    '<a class="quote" href="javascript:void(0)">报价</a>',
                    '<a class="look" href="javascript:void(0)">查看</a>',
//                    '</a>',

                ].join('<br>');
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