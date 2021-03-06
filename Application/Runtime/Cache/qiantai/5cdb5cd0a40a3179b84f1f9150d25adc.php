<?php if (!defined('THINK_PATH')) exit();?><!--手风琴-->
<div class="container-fluid">
    <div class="row">
        <div class="leftmenu col-md-2" style="float: left;">
            <div class="panel-group" id="accordion" role="tablist">
                <div class="panel panel-primary">
                    <div class="panel-heading" role="tab" id="headingone">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion"
                               data-target="#collapseone">我要发货</a>
                        </h4>
                    </div>
                    <div id="collapseone" class="panel-collapse collapse" role="tabfpanel">
                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="javascript:void(0);" id="invoiceGood">发布货源</a></li>
                                <li><a href="javascript:void(0);" id="newGood">已发布货源</a></li>
                            </ul>


                            <!--<p><a href="<?php echo U('myGooding');?>" target="c">进行中货源</a></p>-->

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
                                <li><a href="javascript:void(0);" id="lookGoodOrder">订单查看</a></li>
                                <li><a href="javascript:void(0);" id="track">订单跟踪</a></li>
                                <li><a href="javascript:void(0);" id="goodReceipt">我的回单</a></li>
                                <li><a href="javascript:void(0);" id="myFreight">我的运费</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary">

                    <div class="panel-heading" role="tab" id="headingfive">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion"
                               data-target="#collapsefive">个人中心</a>

                        </h4>
                    </div>
                    <div id="collapsefive" class="panel-collapse collapse in" role="tabfpanel">
                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="javascript:void(0);" id="account">账户管理</a></li>
                                <li><a href="javascript:void(0);" id="authentication">会员认证</a></li>
                                <li><a href="javascript:void(0);" id="safety">安全设置</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-10" style="float:right;background-color: #ffffff;" id="goodChildView">
        </div>
    </div>
</div>

<script>
    var userState = "<?php echo $_SESSION['authentication']?>";
    $(function ($) {
        $.get("<?php echo U('Good/manage');?>", function (data) {
            $('#goodChildView').html(data);
        })
        $('.panel-group a').each(function () {
            var id = $(this).attr('id')
            $(this).on('click', function () {
                switch (id) {
                    case 'invoiceGood':
                        if (userState == 0) {
                            Lobibox.notify('warning', {
                                width: 300,
                                msg: '没有通过企业认证，没有访问权限'
                            });
                        } else {
                            $.get("<?php echo U('Good/goodcenter');?>", function (data) {
                                $('#goodChildView').html(data);
                            });
                        }
                        ;
                        break;
                    case 'newGood':
                        if (userState == 0) {
                            Lobibox.notify('warning', {
                                width: 300,
                                msg: '没有通过企业认证，没有访问权限'
                            });
                        } else {
                            $.get("<?php echo U('Good/myGood');?>", function (data) {
                                $('#goodChildView').html(data);
                            });
                        }
                        ;
                        break;
                    case 'lookGoodOrder':
                        if (userState == 0) {
                            Lobibox.notify('warning', {
                                width: 300,
                                msg: '没有通过企业认证，没有访问权限'
                            });
                        } else {
                            $.get("<?php echo U('Good/myGooding');?>", function (data) {
                                $('#goodChildView').html(data);
                            });
                        }
                        ;

                        break;
                    case 'track':
                        if (userState == 0) {
                            Lobibox.notify('warning', {
                                width: 300,
                                msg: '没有通过企业认证，没有访问权限'
                            });
                        } else {
                            $.get("<?php echo U('Good/track');?>", function (data) {
                                $('#goodChildView').html(data);
                            });
                        }
                        ;

                        break;
                    case 'goodReceipt':
                        if (userState == 0) {
                            Lobibox.notify('warning', {
                                width: 300,
                                msg: '没有通过企业认证，没有访问权限'
                            });
                        } else {
                            $.get("<?php echo U('Good/myReceipt');?>", function (data) {
                                $('#goodChildView').html(data);
                            });
                        }
                        ;

                        break;
                    case 'authentication':
                        $.get("<?php echo U('Good/authentication');?>", function (data) {
                            $('#goodChildView').html(data);
                        });
                        break;
                    case 'myFreight':
                        if (userState == 0) {
                            Lobibox.notify('warning', {
                                width: 300,
                                msg: '没有通过企业认证，没有访问权限'
                            });
                        } else {
                            $.get("<?php echo U('Good/myFreight');?>", function (data) {
                                $('#goodChildView').html(data);
                            });
                        }
                        ;

                        break;
                    case 'account':
                        $.get("<?php echo U('Good/manage');?>", function (data) {
                            $('#goodChildView').html(data);
                        });
                        break;
                    case 'safety':
                        $.get("<?php echo U('Good/safety');?>", function (data) {
                            $('#goodChildView').html(data);
                        });
                        break;
                }
            })

        })
    });
</script>