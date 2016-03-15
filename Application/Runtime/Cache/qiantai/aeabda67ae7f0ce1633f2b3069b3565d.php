<?php if (!defined('THINK_PATH')) exit();?><style>
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
    }

    .form-group label {
        width: 50px;
    }

</style>

<script>
    function push(id) {
        var goodsId = $.cookie('goodsId');
        var targetId = id;
        $.post("<?php echo U('pushGoods');?>", {goodsId: goodsId, targetId: targetId}, function (data) {
            console.log(data)
            if (data.result == 'success') {
                Lobibox.notify('success', {
                    size: 'mini',
                    width: 300,
                    msg: '推送货源成功'
                });
            } else {
                Lobibox.notify('error', {
                    size: 'mini',
                    width: 300,
                    msg:data.describe
                });
            }
        }, 'json')
    }
</script>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="page-header">
                <h3>
                    车源列表
                </h3>
            </div>
            <ul id="mytab" class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#person">个人车主</a></li>
                <li role="presentation"><a href="#company">企业车主</a>
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
            <div class="modal fade" id="search" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">搜索条件</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-inline">
                                <div class="form-group">
                                    <label>线路</label>
                                    <input style="width: 200px" id="from_city" type="text" class="form-control"
                                           placeholder="输入城市">
                                </div>
                                <div class="form-group">
                                    <label>至</label>
                                    <input style="width: 200px;" id="to_city" type="text" class="form-control"
                                           placeholder="输入城市">
                                </div>


                                <div class="form-group">
                                    <label>车型</label>
                                    <select id="carType" class="form-control" style="width: 200px">
                                        <option value=""></option>
                                        <option>厢式车</option>
                                        <option>平板车</option>
                                        <option>高低板车</option>
                                        <option>高栏车</option>
                                        <option>中栏车</option>
                                        <option>低栏车</option>
                                        <option>罐式车</option>
                                        <option>冷藏车</option>
                                        <option>保暖车</option>
                                        <option>危险品车</option>
                                        <option>铁笼车</option>
                                        <option>集装箱</option>
                                        <option>自卸货车</option>
                                        <option>其他车型</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>车长</label>
                                    <select id="carLen" class="form-control" style="width:200px;">
                                        <option value=""></option>
                                        <option>4.2米</option>
                                        <option>4.8米</option>
                                        <option>5.2米</option>
                                        <option>5.8米</option>
                                        <option>6.2米</option>
                                        <option>6.5米</option>
                                        <option>6.8米</option>
                                        <option>7.2米</option>
                                        <option>8.0米</option>
                                        <option>9.6米</option>
                                        <option>12.0米</option>
                                        <option>13.0米</option>
                                        <option>13.5米</option>
                                        <option>15.0米</option>
                                        <option>17.5米</option>
                                        <option>18.5米</option>
                                        <option>20.0米</option>
                                        <option>22.0米</option>
                                        <option>24.0米</option>
                                    </select>
                                </div>
                                <div class="form-group" style="margin-bottom: 20px">
                                    <label>载重</label>
                                    <select id="carLoad" class="form-control" style="width: 200px;">
                                        <option value=""></option>
                                        <option>8T</option>
                                        <option>10T</option>
                                        <option>T</option>
                                        <option>20T</option>
                                        <option>25T</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <input type="reset" name="res" style="display:none;">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">关闭</button>
                                    <button type="button" class="btn btn-primary" id="serch">搜索</button>
                                </div>
                            </form>
                        </div>


                    </div>
                </div>
            </div>

            <div class="tab-content">
                <!--tab页 1 个人车主-->
                <div class="tab-pane active" id="person">
                    <!--信息列表-->
                    <div class="container" style="width:100%;margin-top: 10px">
                        <div class="panel panel-default">
                            <div class="heading" style="padding-top: 10px;">
                                <p>个人车主</p>
                            </div>
                            <table id="tablePerson"
                                   data-detail-view="true"
                                   data-detail-formatter="detailFormatter"
                                   data-toolbar="#toolbar"></table>
                        </div>

                    </div>
                </div>
                <!--tab页 2 企业车主-->
                <div class="tab-pane" id="company">
                    <div class="tab-pane active">
                        <!--信息列表-->
                        <div class="container" style="width:100%;margin-top: 10px">
                            <div class="panel panel-default">
                                <div class="heading" style="padding-top: 10px;">
                                    <p>企业车主</p>
                                </div>
                                <table id="tableCompany"
                                       data-detail-view="true"
                                       data-detail-formatter="detailFormatter"></table>
                            </div>
                        </div>

                    </div>
                </div>
                <!--</div>-->
            </div>

        </div>
    </div>
</div>
<script>
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
    window.operateEvents1 = {
        'click .push': function (e, value, row, index) {
//            alert(row.carId)
            push(row.memberIdc)
        }
    };
    window.operateEvents2 = {
        'click .push': function (e, value, row, index) {
//            alert(row.orderId)
            push(row.id)
        }
    };
    $('#tableCompany').bootstrapTable({
        url: '<?php echo U("lookCompany");?>',
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
            field: 'name',
            title: '承运企业',
//            visible: false
        }, {
            field: 'phone',
            title: '企业电话',
//            visible: false
        }, {
//                field: '',
            title: '操作',
            formatter: function (value, row, index) {
                return '<a class="push" href="javascript:void(0)">推送货源</a>'

            },
            events: operateEvents2
        }]
    });

    $('#tablePerson').bootstrapTable({
        url: '<?php echo U("lookcar");?>',
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
                field: 'name',
                title: '姓名',
//            visible: false
            }, {
                field: 'phone',
                title: '电话',
//            visible: false
            }, {
                field: 'license',
                title: '车牌',
//            visible: false
            }, {
                field: 'carType',
                title: '车型',
//            visible: false
            }, {
                field: 'carLen',
                title: '车长',
//            visible: false
            }, {
                field: 'carLoad',
                title: '载重',
//            visible: false
            }, {
                field: '',
                title: '当前位置',
//            visible: false
            }, {
                field: '',
                title: '常跑城市',
//            visible: false
            }, {
//                field: '',
                title: '操作',
                formatter: function (value, row, index) {
                    return '<a class="push" href="javascript:void(0)">推送货源</a>'

                },
                events: operateEvents1
            }]
    });


    function queryParams(params) {
        params.startStation = $('#from_city').val();
        params.endStation = $('#to_city').val();
        params.carType = $('#carType').val();
        params.carLen = $('#carLen').val();
        params.carLoad = $('#carLoad').val();
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