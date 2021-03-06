<?php if (!defined('THINK_PATH')) exit();?><link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="http://cache.amap.com/lbs/static/main.css"/>
<script type="text/javascript"
        src="http://webapi.amap.com/maps?v=1.3&key=ce69d8b5bff1639849e1d874d630a58d"></script>
<style>
    input,select{
        min-width: 180px;
    }
    .form-group .control-label{
        width: 50px;
    }
    .form-group{
        margin-top: 10px;
    }
    #articletitle {
        padding-bottom: 5px;
    }

    input {
        font-size: 10px;
    }

    #container {
        height: 85%;
        /*margin: 0px*/
    }

    .panel1 {
        background-color: #ddf;
        color: #333;
        border: 1px solid silver;
        box-shadow: 3px 4px 3px 0px silver;
        position: absolute;
        top: 10px;
        right: 10px;
        border-radius: 5px;
        overflow: hidden;
        line-height: 20px;
        margin-top: 36px;
    }

    #input1 {
        width: 250px;
        height: 25px;
        border: 0;
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
        width: auto;
        min-width: 70%;
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
        $.each(row, function (key, value) {
            html.push('<p><b>' + key + ':</b> ' + value + '</p>');
        });
        return html.join('');
    }
    window.operateEvents = {
        'click .map': function (e, value, row, index) {
//            alert('You click like icon, row: ' + JSON.stringify(row));
//            console.log(value, row, index);
//            alert(row.positionX)
            var id = "<?php echo $_SESSION['account']?>"
            if (id != "" && id != null) {
                track(row.positionY, row.positionX)
            } else {
                alert('你没有操作权限，请先登陆')
            }

        }
    };
    $('#table').bootstrapTable({
        url: '<?php echo U("listcar");?>',
        height: 750,
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
//            field: 'goodsName',
            title: 'NO.',
            formatter: function (value, row, index) {
                return index + 1
            }
//            visible: false
        }, {
            field: 'license',
            title: '车牌号',
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
            title: '载重'
        }, {
//            field: 'carLoad',
            title: '当前位置',
            formatter: function (value, row, index) {
                return [
                    '<a class="map" href="javascript:void(0)" title="map">',
                    '<i class="glyphicon glyphicon-map-marker"></i>当前位置',
                    '</a>'
                ].join('&nbsp;');
            },
            events: operateEvents
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
<div id="fullbg" style="display: none"></div>
<div id="dialog">
    <p id="close"><a class="close" href="javascript:void(0);" onclick="closeBg();">&times;</a></p>

    <div id="container" tabindex="0"></div>

</div>
<script>
    function closeBg() {
        $("#fullbg,#dialog").hide();
    }
    function track(x, y) {
        $("#fullbg").css({
            display: "block"
        });
        var map;
        //初始化地图对象，加载地图
        map = new AMap.Map("container", {
            resizeEnable: true,
            zoom: 15,
            center: [x, y]
        });
        marker = new AMap.Marker({
            position: [x, y]
        });

        marker.setMap(map); // 在地图上添加点
//                map.setFitView(); // 调整到合理视野

        $("#dialog").show();
    }
</script>
<section class="content-wrap">
    <div class="container">
        <div class="row">
            <main class="col-md-9 main-content">
                <article class="post tag-about-ghost tag-ghost-in-depth tag-zhu-shou-han-shu" id="articletitle">

                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form class="form-inline">
                                <div class="form-group">
                                    <label class="control-label">线路</label>

                                    <input id="from_city" type="text" class="form-control" placeholder="输入城市">
                                    <label class="control-label">至</label>

                                    <input id="to_city" type="text" class="form-control" placeholder="输入城市">
                                </div>
                                <br>

                                <div class="form-group">
                                    <label class="control-label">车型</label>

                                    <select id="carType" class="form-control" id="chexing">
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
                                    <label class="control-label">车长</label>

                                    <select id="carLen" class="form-control">
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
                                    <label class=" control-label ">载重</label>

                                    <select id="carLoad" class="form-control">
                                        <option value=""></option>
                                        <option>8T</option>
                                        <option>10T</option>
                                        <option>T</option>
                                        <option>20T</option>
                                        <option>25T</option>
                                    </select>
                                </div>

                                <div class="form-group" style="float: right">
                                    <a id="serch" class="button button-uppercase button-primary">搜索</a>
                                </div>
                            </form>
                        </div>
                    </div>

                </article>


                <article class="post tag-about-ghost tag-ghost-in-depth tag-zhu-shou-han-shu">
                    <div style="height: 700px">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                车源信息
                            </div>
                            <table id="table" data-detail-view="true"
                                   data-detail-formatter="detailFormatter"></table>
                            <!--<div class="table-responsive">-->
                            <!--<table class="table table-hover table-striped text-center table-condensed">-->
                            <!--<thead>-->
                            <!--<tr class="active text-center">-->
                            <!--<th>NO.</th>-->
                            <!--&lt;!&ndash;<th>发布日期</th>&ndash;&gt;-->
                            <!--&lt;!&ndash;<th>起运城市</th>&ndash;&gt;-->
                            <!--&lt;!&ndash;<th>目的城市</th>&ndash;&gt;-->
                            <!--<th>车牌号</th>-->
                            <!--<th>车型</th>-->
                            <!--<th>车长</th>-->
                            <!--<th>载重</th>-->
                            <!--</tr>-->
                            <!--</thead>-->
                            <!--<tbody>-->
                            <!--<?php if(is_array($list)): $c = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$car): $mod = ($c % 2 );++$c;?>-->
                            <!--<tr class="sucess">-->
                            <!--<td><?php echo ($c); ?></td>-->
                            <!--&lt;!&ndash;<td><?php echo ($car["startStation"]); ?></td>&ndash;&gt;-->
                            <!--&lt;!&ndash;<td><?php echo ($car["endStation"]); ?></td>&ndash;&gt;-->
                            <!--<td><?php echo ($car["license"]); ?></td>-->
                            <!--<td><?php echo ($car["carType"]); ?></td>-->
                            <!--<td><?php echo ($car["carLen"]); ?></td>-->
                            <!--<td><?php echo ($car["carLoad"]); ?></td>-->
                            <!--</tr>-->
                            <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
                            <!--</table>-->
                            <!--</div>-->

                        </div>
                    </div>

                </article>

            </main>


            <aside class="col-md-3 sidebar">
                <div class="widget">
                    <h4 class="title">标签云</h4>

                    <div class="content tag-cloud">
                        <a href="#">发货</a>
                        <a href="#">找车</a>
                        <a href="#">货物投保</a>
                        <a href="#">车辆投保</a>
                        <a href="#">理赔</a>
                        <a href="#">招聘司机</a>
                    </div>
                </div>
                <div class="widget">
                    <h4 class="title">衢州—南京 </h4>

                    <div class="content community">
                        <p>电话：13757186868</p>

                        <p>车牌号：浙A35168</p>

                        <p>地址：A区168号</p>

                        <div class="content download">
                            <a href="#" class="btn btn-default btn-block">详情</a>
                        </div>
                    </div>

                </div>

                <div class="widget">
                    <h4 class="title">衢州—广州 </h4>

                    <div class="content community">
                        <p>电话：13757186868</p>

                        <p>车牌号：浙A35168</p>

                        <p>地址：A区168号</p>

                        <div class="content download">
                            <a href="#" class="btn btn-default btn-block">详情</a>
                        </div>
                    </div>

                </div>
                <div class="widget">
                    <h4 class="title">衢州—北京 </h4>

                    <div class="content community">
                        <p>电话：13757186868</p>

                        <p>车牌号：浙A35168</p>

                        <p>地址：A区168号</p>

                        <div class="content download">
                            <a href="#" class="btn btn-default btn-block">详情</a>
                        </div>
                    </div>
                </div>
                <br>

            </aside>
        </div>
    </div>
</section>