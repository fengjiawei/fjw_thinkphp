<?php if (!defined('THINK_PATH')) exit();?><style>

    .form-group label {
        width: 50px;
    }

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
<!--start 主体-->
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><a href="#">个人中心</a></li>
                    <li class="active">消息中心</li>
                </ol>
            </div>
            <ul id="mytab" class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#goods">推送货源信息</a></li>
                <li role="presentation"><a href="#message">消息</a>
                </li>

            </ul>
            <div style="margin-left: 20px" id="toolbar">
                <!--<button type="button" class="" onclick="carDetails()">所有车辆</button>-->
                <button type="button" class="btn btn-default" style="border: 1px solid grey" onclick="openSearch()">
                    <span class="glyphicon glyphicon glyphicon-search" aria-hidden="true"></span>
                </button>
                <script>
                    function openSearch() {
                        $('#search').modal('show')
                    }
                </script>
            </div>
            <!-- start modal 搜索框-->
            <div class="modal fade" id="search" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">搜索条件</h4>
                        </div>
                        <div class="modal-body">
                            <div class="modal-footer">
                                <input type="reset" name="res" style="display:none;">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">关闭</button>
                                <button type="button" class="btn btn-primary" id="serch">搜索</button>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <!--end-->
            <!-- start modal 报价框-->
            <div class="modal fade" id="priceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
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
                                    <input style="display: none" type="text" name="messageId" id="messageId">
                                    <label>报价&nbsp;</label>
                                    <input name="price" type="number" class="form-control" placeholder="请输入报价"
                                           style="width: 200px;">
                                </div>
                            </form>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" onclick="sub()">提 交</button>
                        </div>
                        <script>
                            function sub() {
                                $.post('<?php echo U("priceGoodsMessage");?>', $('#price').serialize(), function (data) {
                                    console.log(data)
                                    if (data.result == 'success') {
                                        Lobibox.notify('success', {
                                            size: 'mini',
                                            width: 300,
                                            msg: '报价成功'
                                        });
                                    } else {
                                        Lobibox.notify('error', {
                                            size: 'mini',
                                            width: 300,
                                            msg: data.describe
                                        });
                                    }
                                }, 'json')
                                $('#priceModal').modal('hide')
                                $('#tableGoods').bootstrapTable('refresh')

                            }
                        </script>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <!--tab页 1 货主推送货源信息-->
                <div class="tab-pane active" id="goods">
                    <!--信息列表-->
                    <div class="container" style="width:100%;margin-top: 10px">
                        <div class="panel panel-default">
                            <div class="panel-heading">消息列表</div>
                            <div class="panel-body">
                                <table id="tableGoods"
                                       data-detail-view="true"
                                       data-detail-formatter="detailFormatter"
                                       data-toolbar="#toolbar"></table>
                            </div>
                        </div>

                    </div>
                </div>
                <!--tab页 2 消息-->
                <div class="tab-pane" id="message">
                    <div class="tab-pane active">
                        <!--信息列表-->
                        <div class="container" style="width:100%;margin-top: 10px">
                            <div class="panel panel-default">
                                <div class="heading" style="padding-top: 10px;">
                                    <p></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!--end-->

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
<script>
    function closeBg() {
        $("#1,#2,#3").html("");
        $("#fullbg,#dialog").hide();
    }
    $('#serch').on('click', function () {

        $('#tablePerson').bootstrapTable('refresh')
        $('#search').modal('hide');
        $("input[name='res']").click();

    })
    function detailFormatter(index, row) {
        var html = [];
        ;
        $.each(row, function (key, value) {
//            if(key=='price'){
//                var name =  '价格'
//            }
            html.push('<p style="text-align: left"><b>' + key + ':</b> ' + value + '</p>');
        });
        return html.join('');
    }
    window.operateEvents = {
        'click .look': function (e, value, row, index) {
//            alert(row.relateId);
            $.post('<?php echo U("findGoodById");?>', {goodsId: row.relateId}, function (data) {
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
        , 'click .pushPrice': function (e, value, row, index) {
            $('#messageId').val(row.id);
            $('#priceModal').modal('show');
        }
    };
    $('#tableGoods').bootstrapTable({
        url: '<?php echo U("goodsMessage");?>',
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
        columns: [
            {
                field: 'date',
                title: '消息日期',
//            visible: false
            }, {
                field: 'type',
                title: '消息类型',
                visible: false
            }, {
                field: 'title',
                title: '标题',
//            visible: false
            }, {
                field: 'content',
                title: '内容',
//            visible: false
            }, {
                field: 'sendId',
                title: '发送者ID',
                visible: false
            }, {
                field: 'receiveId',
                title: '接受者ID',
                visible: false
            }, {
                field: 'relateId',
                title: '关联ID',
                visible: false
            }, {
//                field: '',
                title: '操作',
                formatter: function (value, row, index) {
                    return [
                        '<a class="look" href="javascript:void(0)">查看</a>',
                        '<a class="pushPrice" href="javascript:void(0)">报价</a>'
                    ].join('&nbsp;');


                },
                events: operateEvents
            }]
    });


    function queryParams(params) {
//        params.startStation = $('#from_city').val();
//        params.endStation = $('#to_city').val();
//        params.carType = $('#carType').val();
//        params.carLen = $('#carLen').val();
//        params.carLoad = $('#carLoad').val();
        return params
    }
</script>
</div>
<script>
    $("#mytab a").click(function (e) {
        e.preventDefault();
        $(this).tab("show");
    })
</script>