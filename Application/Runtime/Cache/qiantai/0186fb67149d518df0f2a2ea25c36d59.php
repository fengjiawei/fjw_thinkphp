<?php if (!defined('THINK_PATH')) exit();?><div class="container-fluid">
    <div class="row">
        <!--手风琴-->
        <div class="leftmenu col-md-2" style="float: left">
            <div class="panel-group" id="accordion">
                <div class="panel panel-primary">
                    <div class="panel-heading" role="tab" id="headingone">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion"
                               data-target="#collapseone">我要找货</a>
                        </h4>
                    </div>
                    <div id="collapseone" class="panel-collapse collapse" role="tabfpanel">
                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="javascript:void(0);" id="lookGood">货源查看</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="panel panel-primary">
                    <div class="panel-heading" role="tab" id="headingtwo">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion"
                               data-target="#collapsetwo">车源发布</a>

                        </h4>
                    </div>
                    <div id="collapsetwo" class="panel-collapse collapse" role="tabfpanel">
                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="javascript:void(0);" id="myCarResoure">我的车队</a></li>
                                <li><a href="javascript:void(0);" id="orderCar">车源列表</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading" role="tab">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" data-target="#collapse2">我的报价</a>

                        </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse" role="tabfpanel">
                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="javascript:void(0);" id="myPrice">我的报价</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="panel panel-primary">

                    <div class="panel-heading" role="tab" id="headingthree">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion"
                               data-target="#collapsethree">我的订单</a>

                        </h4>
                    </div>
                    <div id="collapsethree" class="panel-collapse collapse" role="tabfpanel">
                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="javascript:void(0);" id="carOrder">订单查看</a></li>
                                <li><a href="javascript:void(0);" id="myReceipt">我的回单</a></li>
                                <li><a href="javascript:void(0);" id="myFreight">我的运费</a></li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="panel panel-primary">

                    <div class="panel-heading" role="tab" id="headingfive">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion"
                               data-target="#collapsefive">个人中心 &raquo;</a>

                        </h4>
                    </div>
                    <div id="collapsefive" class="panel-collapse collapse in" role="tabfpanel">
                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="javascript:void(0);" id="account">账户管理</a></li>
                                <li><a href="javascript:void(0);" id="authentication">会员认证</a></li>
                                <li><a href="javascript:void(0);" id="safety">安全设置</a></li>
                                <li><a href="javascript:void(0);" id="message">消息中心</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-10" style="float: right;background-color: #ffffff" id="carChildView">
        </div>
        <script>
            var userState = "<?php echo $_SESSION['authentication']?>";
            $(function ($) {
                $.get("<?php echo U('Car/manage');?>", function (data) {
                    $('#carChildView').html(data);
                })
                $('.panel-group a').each(function () {
                    var id = $(this).attr('id')
                    $(this).on('click', function () {
                        switch (id) {
                            case 'lookGood':
                                if (userState == 0) {
                                    Lobibox.notify('warning', {
                                        width: 300,
                                        msg: '没有通过企业认证，没有访问权限'
                                    });
                                } else {
                                    $.get("<?php echo U('Car/carcenter');?>", function (data) {
                                        $('#carChildView').html(data);
                                    });
                                }
                                ;

                                break;
                            case 'myCarResoure':
                                if (userState == 0) {
                                    Lobibox.notify('warning', {
                                        width: 300,
                                        msg: '没有通过企业认证，没有访问权限'
                                    });
                                } else {
                                    $.get("<?php echo U('myCarResoure');?>", function (data) {
                                        $('#carChildView').html(data);
                                    });
                                }
                                ;

                                break;
                            case 'myPrice':
                                if (userState == 0) {
                                    Lobibox.notify('warning', {
                                        width: 300,
                                        msg: '没有通过企业认证，没有访问权限'
                                    });
                                } else {
                                    $.get("<?php echo U('myPrice');?>", function (data) {
                                        $('#carChildView').html(data);
                                    });
                                }
                                ;
                                break;
                            case 'carOrder':
                                if (userState == 0) {
                                    Lobibox.notify('warning', {
                                        width: 300,
                                        msg: '没有通过企业认证，没有访问权限'
                                    });
                                } else {
                                    $.get("<?php echo U('carOrder');?>", function (data) {
                                        $('#carChildView').html(data);
                                    });
                                }
                                ;

                                break;
                            case 'myReceipt':
                                if (userState == 0) {
                                    Lobibox.notify('warning', {
                                        width: 300,
                                        msg: '没有通过企业认证，没有访问权限'
                                    });
                                } else {
                                    $.get("<?php echo U('myReceipt');?>", function (data) {
                                        $('#carChildView').html(data);
                                    });
                                }
                                ;
                                break;
                            case 'myFreight':
                                if (userState == 0) {
                                    Lobibox.notify('warning', {
                                        width: 300,
                                        msg: '没有通过企业认证，没有访问权限'
                                    });
                                } else {
                                    $.get("<?php echo U('myFreight');?>", function (data) {
                                        $('#carChildView').html(data);
                                    });
                                }
                                ;

                                break;
                            case 'orderCar':
                                if (userState == 0) {
                                    Lobibox.notify('warning', {
                                        width: 300,
                                        msg: '没有通过企业认证，没有访问权限'
                                    });
                                } else {
                                    $.get("<?php echo U('orderCar');?>", function (data) {
                                        $('#carChildView').html(data);
                                    });
                                }
                                ;

                                break;
                            case 'authentication':
                                $.get("<?php echo U('authentication');?>", function (data) {
                                    $('#carChildView').html(data);
                                });
                                break;
                            case 'account':
                                $.get("<?php echo U('Car/manage');?>", function (data) {
                                    $('#carChildView').html(data);
                                });
                                break;
                            case 'safety':
                                $.get("<?php echo U('Car/safety');?>", function (data) {
                                    $('#carChildView').html(data);
                                });
                                break;
                            case 'message':
                                $.get("<?php echo U('Car/message');?>", function (data) {
                                    $('#carChildView').html(data);
                                });
                                break;
                        }

                    })

                })
            });
        </script>
    </div>
</div>