<?php if (!defined('THINK_PATH')) exit();?><link rel="stylesheet" href="http://cache.amap.com/lbs/static/main.css"/>
<script type="text/javascript"
        src="http://webapi.amap.com/maps?v=1.3&key=ce69d8b5bff1639849e1d874d630a58d"></script>
<title>订单跟总</title>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="page-header">
               <ol class="breadcrumb">
                 <li><a href="#">我的订单</a></li>
                 <li class="active">订单跟踪</li>
               </ol>
            </div>

            <div class="panel panel-default" style="color: #5E5E5E;">
                <div class="panel-heading">
                    <form id="form" class=" form-inline" role="form">


                        <label class="control-label">订单号：</label>
                        <input type="text" name="goodsId" class="form-control"
                               style="width: 200px;">
                        <button type="button" class="btn btn-primary btn-sm" onclick="search()">搜　索</button>
                    </form>
                    <script>
                        function search() {
                            $.post('<?php echo U("testpost");?>',
                                    $('#form').serialize(),
//                                    {goodsId: 122, seesion: "98"},
                                    function (data) {
                                        $.each(data.list, function (n,value) {
                                            $('#gz').append("时间："+value.date+"---"+"状态："+value.title+"<br>")
                                        })
                            },'json')
                        }
                    </script>
                </div>
            </div>

            <!--跟踪信息-->
            <div style="height: 500px">
                <div id="gz"></div>
            </div>

            <!--<div class="col-sm-7" style="height: 500px">-->
                <!--<div id="mapContainer"></div>-->
                <!--<div id="tip">-->
                    <!--<b>鼠标左键在地图上单击获取坐标</b>-->
                    <!--<br>-->

                    <!--<div>X：<input type="text" id="lngX" name="lngX" value=""/>&nbsp;Y：<input type="text" id="latY"-->
                                                                                             <!--name="latY"-->
                                                                                             <!--value=""/></div>-->
                <!--</div>-->
            <!--</div>-->


        </div>
    </div>
</div>