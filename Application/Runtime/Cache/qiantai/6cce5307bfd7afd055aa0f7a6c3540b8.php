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
</style>
<script>
    function carry(id) {
        $.post(
                "<?php echo U('Good/carry');?>",
                {
                    orderId: id
                },
                function (data) {
                    if (data.result == 'success') {
                        Lobibox.notify('success', {
                            size: 'mini',
                            width: 300,
                            msg: '委托车主承运成功'
                        });
                        $.get('<?php echo U("myGood");?>', function (data) {
                            $('#goodChildView').html(data);
                        })
//                        $('#table').bootstrapTable('refresh')
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
                            msg: '委托失败'
                        });
                        $('#table').bootstrapTable('refresh')
                    }
                },
                'json'
        )
    }
    function regect(id){
        $.post(
                "<?php echo U('Good/regect');?>",
                {
                    orderId: id
                },
                function (data) {
                    if (data.result == 'success') {
                        Lobibox.notify('success', {
                            size: 'mini',
                            width: 300,
                            msg: '已让车主重新报价！'
                        });
                        $.get('<?php echo U("myGood");?>', function (data) {
                            $('#goodChildView').html(data);
                        })
//                        $('#table').bootstrapTable('refresh')
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
                            msg: '操作失败！请联系客服'
                        });
                        $('#table').bootstrapTable('refresh')
                    }
                },
                'json'
        )
    }
</script>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="page-header">
                <ol class="breadcrumb">
                  <li><a href="#">发布货源</a></li>
                  <li><a href="#">已发布货源</a></li>
                  <li class="active">查看报价</li>
                </ol>
            </div>
            <ul id="mytab" class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#person">个人车主</a></li>
                <li role="presentation"><a href="#company">企业车主</a>
                </li>

            </ul>

            <div class="tab-content" ng-app='app' ng-controller='cityCtrl'>
                <!--tab页 1 个人车主-->
                <div class="tab-pane active" id="person">
                    <!--信息列表-->
                    <div class="container" style="width:100%;margin-top: 10px">
                        <div class="panel panel-default">
                            <div class="heading" style="padding-top: 10px;">
                                <p>个人车主报价信息</p>
                            </div>
                            <table id="tablePerson"
                                   data-detail-view="true"
                                   data-detail-formatter="detailFormatter"></table>
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
                                    <p>企业报价信息</p>
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
        $('#table').bootstrapTable('refresh')
    })

    $('#reset').on('click', function () {
        $("input[name='res']").click();
        $('#table').bootstrapTable('refresh')
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
        'click .carry': function (e, value, row, index) {
//            alert(row.orderId)
            carry(row.orderId)
        },
        'click .regect': function (e, value, row, index) {
//            alert(row.orderId)
            regect(row.orderId)
        }
    };
    $('#tableCompany').bootstrapTable({
        url: '<?php echo U("lookpricecompany");?>',
        height: 700,
//        sidePagination:'server',
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
//            field: 'goodsName',
            title: 'NO.',
            formatter: function (value, row, index) {
                return index + 1
            }
//            visible: false
        }
//            ,{
//            field: 'code',
//            title: '订单号',
//            visible: false
//        }
            , {
                field: 'carrierName',
                title: '承运企业',
//            visible: false
            }, {
                field: 'carrierPhone',
                title: '企业电话',
//            visible: false
            }, {
                field: 'price',
                title: '报价',
                sortable: true
            }, {
//                field: '',
                title: '操作',
                formatter: function (value, row, index) {
                    return ['<a class="regect" href="javascript:void(0)">重新报价</a>','<a class="carry" href="javascript:void(0)">让他运</a>'].join("&nbsp;")

                },
                events: operateEvents
            }]
    });

    $('#tablePerson').bootstrapTable({
        url: '<?php echo U("lookpriceperson");?>',
        height: 700,
//        sidePagination:'server',
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
//            field: 'goodsName',
            title: 'NO.',
            formatter: function (value, row, index) {
                return index + 1
            }
//            visible: false
        }
//            ,{
//            field: 'code',
//            title: '订单号',
//            visible: false
//        }
            , {
                field: 'carrierName',
                title: '承运人姓名',
//            visible: false
            }, {
                field: 'carrierPhone',
                title: '承运人电话',
//            visible: false
            }, {
                field: 'license',
                title: '车牌',
//            visible: false
            }, {
                field: 'carrierType',
                title: '车型',
//            visible: false
            }, {
                field: 'carrierLen',
                title: '车长',
//            visible: false
            }, {
                field: 'carrierLoad',
                title: '载重',
//            visible: false
            }, {
                field: 'price',
                title: '报价',
                sortable: true
            }, {
//                field: '',
                title: '操作',
                formatter: function (value, row, index) {
                    return ['<a class="regect" href="javascript:void(0)">重新报价</a>','<a class="carry" href="javascript:void(0)">让他运</a>'].join("&nbsp;")

                },
                events: operateEvents
            }]
    });


    function queryParams(params) {
//        console.log(params.order)
        params.from_date = $('#from_date').val();
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