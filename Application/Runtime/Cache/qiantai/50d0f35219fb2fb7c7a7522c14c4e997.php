<?php if (!defined('THINK_PATH')) exit();?><div style="background-color: #ffffff">
    <!--轮播-->
    <div class="container" id="mycarousel">
        <div id="carousel-example-generic" class="carousel slide" data-interval="2000">
            <ol class="carousel-indicators">
                <li data-target="carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="carousel-example-generic" data-slide-to="1" class=""></li>
                <li data-target="carousel-example-generic" data-slide-to="2" class=""></li>
            </ol>

            <div class="carousel-inner">
                <div class="item active">
                    <img src="/Uploads/img/slider1.jpg">

                    <div class="carousel-caption">
                        <h3>齐心协力 共同向前</h3>
                        <p>团队的良好协作是前进的基础！</p>
                    </div>
                </div>
                <div class="item ">
                    <img src="/Uploads/img/slider2.jpg">

                    <div class="carousel-caption">
                        <h3> 齐心协力 共同向前</h3>

                        <p>团队的良好协作是前进的基础！</p>
                    </div>
                </div>
                <div class="item ">
                    <img src="/Uploads/img/slider3.jpg">

                    <div class="carousel-caption">
                        <h3> 齐心协力 共同向前</h3>

                        <p>团队的良好协作是前进的基础！</p>
                    </div>
                </div>
            </div>
            <br>

        </div>
        <div class="alert alert-success col-md-12" style="background-color: #ffffff;border-color: gainsboro;padding: 5px 10px 5px 10px" role="alert">
            <!--<div class="col-sm-4" style="padding: 0;margin: 0">车辆：2560</div>-->
            <!--<div class="col-sm-4" style="padding: 0;margin: 0">货源：5320</div>-->
            <!--<div class="col-sm-4" style="padding: 0;margin: 0">订单：10536</div>-->
            <div class="col-md-6" style="text-align: center">累计  ：车辆：2560  | 货源：5320 | 订单：10536</div>
            <div class="col-md-6" style="text-align: center">新增  ：车辆：20  | 货源：122 | 订单：253</div>
        </div>
    </div>
    <!--信息列表-->
    <div class="container" id="liebiao">
        <div class="list">
            <div class="panel panel-info ">
                <div class="panel-heading">
                    货源信息
                </div>
                <div class="panel-body">
                    <p  style="text-align: right"><a href="#" onclick="goodinfo()">更多信息...</a>
                    </p>
                </div>
                <script>
                    function goodinfo(){
                            $.get("<?php echo U('Good/goodinfo');?>", function (data) {
                                $('#view').html(data);
                            })
                    }
                </script>
                <style>
                    .table-responsive th{
                        text-align: center;
                    }
                </style>
                <div class="table-responsive">
                    <table class="table table-hover table-striped text-center table-condensed">
                        <thead>
                        <tr class="active text-center">
                            <!--<th>NO.</th>-->
                            <!--<th>货物名称</th>-->
                            <th>发货日期</th>
                            <th>货主名</th>
                            <th>货物类型</th>
                            <th>货物重量</th>
                            <!--<th>备注</th>-->
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($good)): $k = 0; $__LIST__ = array_slice($good,0,10,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr class="sucess">
                                <!--<td><?php echo ($k); ?></td>-->
                                <!--<td><?php echo ($vo["goodsName"]); ?></td>-->
                                <td><?php echo ($vo["deliveryDate"]); ?></td>
                                <td><?php echo ($vo["name"]); ?></td>
                                <td><?php echo ($vo["goodsType"]); ?></td>
                                <td><?php echo ($vo["goodsLoadSize"]); ?></td>
                                <!--<td><?php echo ($vo["describe"]); ?></td>-->
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="list">
            <div class="panel panel-info">
                <div class="panel-heading">
                    车源信息
                </div>
                <div class="panel-body">
                    <p  style="text-align: right"><a href="#" onclick="carinfo()">更多信息...</a>
                    </p>
                </div>
                <script>
                    function carinfo(){
                        $.get("<?php echo U('Car/carinfo');?>", function (data) {
                            $('#view').html(data);
                        })
                    }
                </script>
                <div class="table-responsive">
                    <table class="table table-hover table-striped text-center table-condensed">
                        <thead>
                        <tr class="active text-center">
                            <!--<th>NO.</th>-->
                            <!--<th>发布日期</th>-->
                            <!--<th>起运城市</th>-->
                            <!--<th>目的城市</th>-->
                            <th>车牌号</th>
                            <th>车型</th>
                            <th>车长</th>
                            <th>载重</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($car)): $c = 0; $__LIST__ = array_slice($car,0,10,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$car): $mod = ($c % 2 );++$c;?><tr class="sucess">
                                <!--<td><?php echo ($c); ?></td>-->
                                <!--<td><?php echo ($car["startStation"]); ?></td>-->
                                <!--<td><?php echo ($car["endStation"]); ?></td>-->
                                <td><?php echo ($car["license"]); ?></td>
                                <td><?php echo ($car["carType"]); ?></td>
                                <td><?php echo ($car["carLen"]); ?></td>
                                <td><?php echo ($car["carLoad"]); ?></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<script>

    function test() {
        $.ajax({
            type: 'post',
            url: '<?php echo U("Index/listgood");?>',
            contentType: 'json',
            success: function (data) {
                console.log(data)
            },
            error: function (data) {
                console.log(data)
            }
        })
    }

    ////			导航
    $("#mytab a").click(function (e) {
        e.preventDefault();
        $(this).tab("show");
    })
    //			轮播
    $(".carousel").carousel({
        interval: 3000
    })

    //
    $(".js-affixed-element-bottom").affix({
        offset: {}
    })


</script>