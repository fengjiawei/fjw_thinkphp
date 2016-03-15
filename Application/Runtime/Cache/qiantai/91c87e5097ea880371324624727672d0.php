<?php if (!defined('THINK_PATH')) exit();?><!--<link rel="stylesheet" href="http://cache.amap.com/lbs/static/main.css"/>-->
<script type="text/javascript" src="http://webapi.amap.com/maps?v=1.3&key=ce69d8b5bff1639849e1d874d630a58d"></script>
<link rel="stylesheet" type="text/css" href="/Public/css/validation/formValidation.css" />
<script type="text/javascript" src="/Public/js/validation/formValidation.js"></script>
<script type="text/javascript" src="/Public/js/validation/zh_CN.js"></script>
<script type="text/javascript" src="/Public/js/validation/bootstrap.js"></script>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><a href="#">我要发货</a></li>
                    <li class="active">发布货源</li>
                </ol>
            </div>

            <ul id="mytab" class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#zhengchefahuo">整车发货</a></li>
                <li role="presentation"><a href="#lingdanfahuo">零担发货</a>
                </li>

            </ul>
            <!--tab页content-->
            <div class="tab-content">
                <!--tab页 1 整车发货-->
                <div class="tab-pane active" id="zhengchefahuo">
                    <div class="container" style="width: 800px;">
                        <form id="vehicle" class="form-inline" action="" method="post">
                            <div class="form-group">
                                <label class="control-label">发货日期</label>

                                <input name="deliveryDate" type="date" class="form-control" placeholder="">
                            </div>
                            <br>

                            <div class="form-group">
                                <input name="type" value="nonstop" style="display: none">

                                <label class="control-label">发货城市 </label>
                                <select id="loc_province" name="loc_province" class="form-control"></select>
                            </div>
                            <div class="form-group">
                                <select id="loc_city" name="loc_city" class="form-control"></select>
                            </div>
                            <div class="form-group">
                                <select id="loc_town" name="loc_town" class="form-control"></select>
                                <input type="text" name="startStation" id="startStation" style="display: none">
                            </div>
                            <div class="form-group">
                                <label class="control-label">装车地址</label>

                                <div class="input-group">
                                    <input id='zc' name="startAddress" type="text" class="form-control"
                                           placeholder="详细地址"
                                           style="width: 200px;">
                                    <span class="input-group-btn ">
                                        <button class="btn btn-default btn-sm" type="button" onclick="openMap(1)"><span
                                                class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                                        </button>
                                    </span>
                                </div>
                                <input type="text" name="positionY" id="positionx" readonly style="display: none">
                                <input type="text" name="positionX" id="positiony" readonly style="display: none">
                            </div>
                            <div class="form-group">
                                <label class="control-label">到货城市 </label>
                                <select id="loc_province1" name="loc_province" class="form-control"></select>
                            </div>
                            <div class="form-group">
                                <select id="loc_city1" name="loc_city" class="form-control"></select>
                            </div>
                            <div class="form-group">
                                <select id="loc_town1" name="loc_town" class="form-control"></select>
                                <input type="text" name="endStation" id="endStation" style="display: none">
                            </div>
                            <div class="form-group">
                                <label class="control-label">卸货地址</label>
                                <input name="endAddress" type="text" class="form-control" placeholder="详细地址"
                                       style="width: 200px;">
                            </div>
                            <br>

                            <div class="form-group">
                                <label class="control-label">联系人名</label>
                                <input name="receiverName" type="text" style="width: 185px;" class="form-control"
                                       placeholder="请输入姓名">
                            </div>
                            <div class="form-group">
                                <label class="control-label">手机号码</label>
                                <input name="receiverPhone" type="text" style="width: 185px;" class="form-control"
                                       placeholder="请输入手机号码">
                            </div>
                            <div class="form-group">
                                <label>固定电话</label>
                                <input name="tel" type="text" style="width: 185px;" class="form-control" readonly
                                       placeholder="请输入固话号码">
                            </div>

                            <div class="form-group">
                                <label class="control-label">货物种类</label>
                                <select id="good_types" name="good_types" class="form-control" style="width: 185px;">
                                    <option>重货</option>
                                    <option>泡货</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">货物类型</label>
                                <select name="goodsType" class="form-control" style="width: 185px;">
                                    <option>设备</option>
                                    <option>矿产</option>
                                    <option>建材</option>
                                    <option>食品</option>
                                    <option>蔬菜</option>
                                    <option>生鲜</option>
                                    <option>药品</option>
                                    <option>化工</option>
                                    <option>木材</option>
                                    <option>家畜</option>
                                    <option>纺织品</option>
                                    <option>日用品</option>
                                    <option>电子电器</option>
                                    <option>农夫产品</option>
                                    <option>其他类型</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">货物名称</label>
                                <input name="goodsName" type="text" style="width: 185px;" class="form-control"
                                       placeholder="输入货物名称">
                            </div>
                            <div class="form-group">
                                <label>件　　数</label>
                                <input id="good_number" type="number" style="width: 185px;" class="form-control"
                                       placeholder="输入货物件数">
                            </div>
                            <div class="form-group">
                                <label class="control-label">体　　积</label>

                                <input id="good_volume" name="good_volume" type="text" style="width: 185px;"
                                       class="form-control"
                                       placeholder="输入体积(方)">
                            </div>
                            <div class="form-group">
                                <label class="control-label">重　　量</label>
                                <input id="good_weight" name="good_weight" type="text" class="form-control"
                                       placeholder="输入重量(吨)"
                                       style="width: 185px;">

                            </div>
                            <input type="text" name="goodsLoadSize" id="goodsLoadSize" style="display: none">

                            <div class="form-group">
                                <label class="control-label">车　　型</label>
                                <select name="carType" class="form-control" id="chexing" style="width: 185px;">
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
                                <label class="control-label">车　　长</label>
                                <select name="carLen" class="form-control" style="width: 185px;">
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
                            <div class="form-group">
                                <label class="control-label">载　　重</label>
                                <select name="carLoad" class="form-control" style="width: 187px;">
                                    <option>8T</option>
                                    <option>10T</option>
                                    <option>15T</option>
                                    <option>20T</option>
                                    <option>25T</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>备　　注</label>
                                <input name="describe" type="text" class="form-control" placeholder="填写运输要求"
                                       style="width: 300px;">
                            </div>
                            <br>

                            <div class="form-group" style="margin-bottom: 20px">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    发布货源
                                </button>
                                <button type="button" class="btn btn-success btn-sm">
                                    批量导入
                                </button>
                            </div>

                        </form>
                        <script>
                            $('#vehicle')
                                    .formValidation({
                                        message: 'This value is not valid',
                                        icon: {
                                            valid: 'glyphicon glyphicon-ok',
//                                            invalid: 'glyphicon glyphicon-remove',
                                            validating: 'glyphicon glyphicon-refresh'
                                        },
                                        fields: {
                                            deliveryDate: {
//                                                message: '只能填写数字。',
                                                validators: {
                                                    notEmpty: {
                                                        message: '发货日期必填！'
                                                    },
//                                                    digits: {},
                                                }
                                            },
                                            loc_town: {
//                                                message: '只能填写数字。',
                                                validators: {
                                                    notEmpty: {
                                                        message: '省市区必填！'
                                                    },
//                                                    digits: {},
                                                }
                                            },
                                            startAddress: {
//                                                message: '只能填写数字。',
                                                validators: {
                                                    notEmpty: {
                                                        message: '装车地址必填！'
                                                    },
//                                                    digits: {},
                                                }
                                            },
                                            endAddress: {
//                                                message: '只能填写数字。',
                                                validators: {
                                                    notEmpty: {
                                                        message: '卸货地址必填！'
                                                    },
//                                                    digits: {},
                                                }
                                            },
                                            receiverName: {
//                                                message: '只能填写数字。',
                                                validators: {
                                                    notEmpty: {
                                                        message: '联系人必填！'
                                                    },
//                                                    digits: {},
                                                }
                                            },
                                            receiverName: {
//                                                message: '只能填写数字。',
                                                validators: {
                                                    notEmpty: {
                                                        message: '联系人必填！'
                                                    },
//                                                    digits: {},
                                                }
                                            }, receiverPhone: {
//                                                message: '只能填写数字。',
                                                validators: {
                                                    notEmpty: {
                                                        message: '手机号码必填！'
                                                    },
                                                    phone: {
                                                        country: 'CN',
                                                        message: '请输入有效的手机号码'
                                                    }
                                                }
                                            },
                                            good_types: {
//                                                message: '只能填写数字。',
                                                validators: {
                                                    notEmpty: {
                                                        message: '货物种类必填！'
                                                    }
                                                }
                                            },
                                            goodsType: {
//                                                message: '只能填写数字。',
                                                validators: {
                                                    notEmpty: {
                                                        message: '货物类型必填！'
                                                    }
                                                }
                                            },
                                            goodsName: {
//                                                message: '只能填写数字。',
                                                validators: {
                                                    notEmpty: {
                                                        message: '货物名称必填！'
                                                    }
                                                }
                                            },
                                            good_volume: {
//                                                message: '只能填写数字。',
                                                validators: {
                                                    notEmpty: {
                                                        message: '体积必填！'
                                                    }
                                                }
                                            },
                                            good_weight: {
//                                                message: '只能填写数字。',
                                                validators: {
                                                    notEmpty: {
                                                        message: '重量必填！'
                                                    }
                                                }
                                            },
                                            carType: {
//                                                message: '只能填写数字。',
                                                validators: {
                                                    notEmpty: {
                                                        message: '所需车型必填！'
                                                    }
                                                }
                                            },
                                            carLen: {
//                                                message: '只能填写数字。',
                                                validators: {
                                                    notEmpty: {
                                                        message: '所需车长必填！'
                                                    }
                                                }
                                            },
                                            carLoad: {
//                                                message: '只能填写数字。',
                                                validators: {
                                                    notEmpty: {
                                                        message: '所需载重必填！'
                                                    }
                                                }
                                            },
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
                                        save(1);
                                    });
                        </script>
                    </div>
                </div>
                <!--tab页 2 零担发货-->
                <div class="tab-pane" id="lingdanfahuo">
                    <div class="tab-pane active">
                        <div class="container jiange" style="width: 800px;">
                            <form id="lingdan" class="form-inline" action="" method="post">
                                <div class="form-group">
                                    <label>发货日期</label>
                                    <input name="deliveryDate" type="date" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="type" value="transfer" style="display: none">

                                    <label class="control-label">发货城市 </label>
                                    <select id="loc_province3" class="form-control"></select>
                                    <select id="loc_city3" class="form-control"></select>
                                    <select id="loc_town3" class="form-control"></select>
                                    <input type="text" name="startStation" id="ld_startStation"
                                           style="display:none;">

                                </div>
                                <div class="form-group">
                                    <label>装车地址</label>
                                    <input id="ld" name="startAddress" type="text" class="form-control"
                                           onclick="openMap(2)" placeholder="详细地址"
                                           style="width: 310px; font-size: 11px">
                                    <input type="text" name="positionY" id="positionx1" style="display: none"/>
                                    <input type="text" name="positionX" id="positiony1" style="display: none"/>
                                </div>
                                <br>

                                <div class="form-group">
                                    <label class="control-label">到货城市 </label>
                                    <select id="loc_province4" class="form-control"></select>
                                    <select id="loc_city4" class="form-control"></select>
                                    <select id="loc_town4" class="form-control"></select>
                                    <input type="text" name="endStation" id="ld_endStation" style="display: none">
                                </div>
                                <div class="form-group">
                                    <label>卸车地址</label>
                                    <input name="endAddress" type="text" class="form-control" placeholder="详细地址"
                                           style="width: 310px;">
                                </div>
                                <br>

                                <div class="form-group">
                                    <label>联系人名</label>
                                    <input name="receiverName" type="text" style="width: 185px;" class="form-control"
                                           placeholder="请输入姓名">
                                </div>
                                <div class="form-group">
                                    <label>手机号码</label>
                                    <input name="receiverPhone" type="text" style="width: 185px;" class="form-control"
                                           placeholder="请输入手机号码">
                                </div>
                                <div class="form-group">
                                    <label>固定电话</label>
                                    <input name="tel" type="text" style="width: 185px;" class="form-control" readonly
                                           placeholder="请输入固话号码">
                                </div>

                                <div class="form-group">
                                    <label>货物种类</label>
                                    <select id="ld_good_types" class="form-control" style="width: 185px;">
                                        <option>重货</option>
                                        <option>泡货</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>货物类型</label>
                                    <select name="goodsType" class="form-control" style="width: 185px;">
                                        <option>设备</option>
                                        <option>矿产</option>
                                        <option>建材</option>
                                        <option>食品</option>
                                        <option>蔬菜</option>
                                        <option>生鲜</option>
                                        <option>药品</option>
                                        <option>化工</option>
                                        <option>木材</option>
                                        <option>家畜</option>
                                        <option>纺织品</option>
                                        <option>日用品</option>
                                        <option>电子电器</option>
                                        <option>农夫产品</option>
                                        <option>其他类型</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>货物名称</label>
                                    <input name="goodsName" type="text" style="width: 185px;" class="form-control"
                                           placeholder="输入货物名称">
                                </div>
                                <br>

                                <div class="form-group">
                                    <label>件　　数</label>
                                    <input id="ld_good_number" type="number" style="width: 185px;" class="form-control"
                                           placeholder="输入货物件数">
                                </div>

                                <label>体　　积</label>

                                <div class="input-group input-group-sm">

                                    <input id="ld_good_volume" type="number" class="form-control" placeholder="输入体积"
                                           style="width: 153px;">
                                    <span class="input-group-addon">方</span>

                                </div>
                                <label>重　　量</label>

                                <div class="input-group input-group-sm">

                                    <input id="ld_good_weight" type="number" class="form-control" placeholder="输入体积"
                                           style="width: 153px;">
                                    <span class="input-group-addon">吨</span>

                                </div>

                                <input type="text" name="goodsLoadSize" id="ld_goodsLoadSize" style="display: none">


                                <div class="form-group">
                                    <label>车　　型</label>
                                    <select name="carType" class="form-control" style="width: 185px;">
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
                                    <label>车　　长</label>
                                    <select name="carLen" class="form-control" style="width: 185px;">
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
                                <div class="form-group">
                                    <label>载　　重</label>
                                    <select name="carLoad" class="form-control" style="width: 185px;">
                                        <option>8T</option>
                                        <option>10T</option>
                                        <option>15T</option>
                                        <option>20T</option>
                                        <option>25T</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>备　　注</label>
                                    <input name="describe" type="text" class="form-control" placeholder="填写运输要求"
                                           style="width: 300px;">
                                </div>
                                <br>

                                <div>

                                    <button type="button" class="btn btn-primary btn-sm"
                                            style="margin-bottom: 50px" onclick="save(2)">
                                        发布货源
                                    </button>
                                    <button type="button" class="btn btn-success btn-sm"
                                            style="margin-bottom: 50px">
                                        批量导入
                                    </button>
                                    <br>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--</div>-->
            </div>

        </div>

    </div>
</div>

<style>

    .form-group {
        margin-top: 10px;
    }

    /*button{*/
    /*margin-top: 10px;*/
    /*}*/

</style>
<script>

    showLocation();
    showLocation1();
    showLocation3();
    showLocation4();
    $("#mytab a").click(function (e) {
        e.preventDefault();
        $(this).tab("show");
    })
    function save(num) {
        if (num == 1) {
            $('#startStation').val($('#loc_province  option:selected').text() + $('#loc_city  option:selected').text() + $('#loc_town  option:selected').text());
            $('#endStation').val($('#loc_province1  option:selected').text() + $('#loc_city1  option:selected').text() + $('#loc_town1  option:selected').text());
            $('#goodsLoadSize').val($('#good_types').val() + " " + $('#good_volume').val() + "立方/" + $('#good_weight').val() + "吨");
            $.ajax({
                        type: 'post',
                        url: '<?php echo U("Good/save");?>',
                        data: $("#vehicle").serialize(),
                        success: function (data) {
                            if (data.result == 'success') {
                                Lobibox.confirm({
                                    title: '提示',
                                    msg: '货源发布成功，你可以继续发布货源，或者查看货源列表',
                                    callback: function (lobibox, type) {
                                        if (type === 'conti') {
                                            $.get('<?php echo U("goodcenter");?>', function (data) {
                                                $('#goodChildView').html(data);
                                            })
                                        } else if (type === 'look') {
                                            $.get('<?php echo U("myGood");?>', function (data) {
                                                $('#goodChildView').html(data);
                                            })
                                        }

                                    }
                                });
                                $.get("<?php echo U('goodcenter');?>", function (data) {
                                    $('#goodChildView').html(data);
                                })
                            } else {
//                            alert('111111');
                                Lobibox.notify('info', {
                                    width: 300,
                                    msg: data.describe + "请注意，装车地址必须地图选择"
                                });
//                                alert(data.describe)
                            }
                        },
                        error: function (data) {
//                    alert(data)
//                            console.log(data)
                            Lobibox.notify('error', {
                                size: 'mini',
                                width: 300,
                                msg: '请填写完整信息'
                            });
                        },
                        dataType: 'json'
                    }
            )
        } else {
            $('#ld_startStation').val($('#ld_from_province').val() + $('#ld_from_city').val() + $('#ld_from_counties').val());
            $('#ld_endStation').val($('#ld_to_province').val() + $('#ld_to_city').val() + $('#ld_to_counties').val());
            $('#goodsLoadSize').val($('#ld_good_types').val() + " " + $('#ld_good_number').val() + "件/" + $('#ld_good_volume').val() + "立方/" + $('#good_weight').val() + "吨/");
            $.post(
                    '<?php echo U("Good/save");?>',
                    $("#lingdan").serialize(),
                    function (data) {
                        if (data.result == 'success') {
//                            $("#myModal").modal('show');
                            alert('发布成功');
                            $.get("<?php echo U('goodcenter');?>", function (data) {
                                $('#goodChildView').html(data);
                            })
                        } else {
                            alert('发货失败')
                        }
                    },
                    'json'
            )
        }
    }

    function closeBg() {
        $("#fullbg,#dialog").hide();
        $('#z').css('display', 'none');
        $('#l').css('display', 'none');
    }
    function openMap(type) {
        $("#fullbg").css({
            display: "block"
        });
        var map = new AMap.Map('container', {
            resizeEnable: true,
            zoom: 13
        });
        var city;
        if (type == 1 && $('#loc_town').val() != "") {
            city = $('#loc_town  option:selected').text();
        } else {
            city = $('#ld_from_counties').val();
        }


        if (city) {
            map.setCity(city)
        }
        AMap.plugin('AMap.Geocoder', function () {
            var geocoder = new AMap.Geocoder({
                city: "全国"//城市，默认：“全国”
            });
            var marker = new AMap.Marker({
                map: map,
                bubble: true
            })
            var input = document.getElementById('input1');
            var message = document.getElementById('message');
            map.on('click', function (e) {
                $('#lngX').val(e.lnglat.getLng());
                $('#latY').val(e.lnglat.getLat());
                marker.setPosition(e.lnglat);
                geocoder.getAddress(e.lnglat, function (status, result) {
                    if (status == 'complete') {
                        input.value = result.regeocode.formattedAddress
                        message.innerHTML = ''
                    } else {
                        message.innerHTML = '无法获取地址'
                    }
                })
            })

            input.onchange = function (e) {
                var address = input.value;
                geocoder.getLocation(address, function (status, result) {
                    if (status == 'complete' && result.geocodes.length) {
                        marker.setPosition(result.geocodes[0].location);
                        map.setCenter(marker.getPosition())
                        message.innerHTML = ''
                    } else {
                        message.innerHTML = '无法获取位置'
                    }
                })
            }

        });
        if (type == 1) {
            $('#z').css('display', 'block');
        } else {
            $('#l').css('display', 'block');
        }
        $("#dialog").show();


    }
    function checkXY(x) {

        if (x == 1) {
            $('#zc').val($('#input1').val());
            $('#positionx').val($('#lngX').val());
            $('#positiony').val($('#latY').val());
            $("#fullbg,#dialog").hide();
            $('#z').css('display', 'none');
        } else {
            $('#ld').val($('#input1').val());
            $('#positionx1').val($('#lngX').val());
            $('#positiony1').val($('#latY').val());
            $("#fullbg,#dialog").hide();
            $('#l').css('display', 'none');
        }

    }
</script>
<style>
    #container {
        height: 90%;
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

    #btn {
        /*background-color: #ddf;*/
        /*color: #333;*/
        /*border: 1px solid silver;*/
        /*box-shadow: 3px 4px 3px 0px silver;*/
        position: absolute;
        bottom: 10px;
        right: 10px;
        /*border-radius: 5px;*/
        overflow: hidden;
        line-height: 20px;
        /*margin-bottom: 36px;*/
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
<div id="main">
    <div id="fullbg" style="display: none"></div>
    <div id="dialog">
        <p id="close"><a class="close" href="javascript:void(0);" onclick="closeBg();">&times;</a></p>

        <div id="container" tabindex="0"></div>
        <div class='panel1'>
            <input id='input1' value='点击地图显示地址/输入地址显示位置' onfocus='this.value=""'/>

            <div id='message'></div>
        </div>
        <div id="btn" style="background-color: yellow">
            <button id="z" style="float: right;display: none" class="btn btn-primary" onclick="checkXY(1)"
                    type="button">确定
            </button>
            <button id="l" style="float: right;display: none" class="btn btn-warning" onclick="checkXY(2)"
                    type="button">确定
            </button>
        </div>
        <div id="pos" style="display: none">
            <b>鼠标左键在地图上单击获取坐标</b>
            <br>

            <div>X：<input type="text" id="lngX" name="lngX" value=""/>&nbsp;Y：<input type="text" id="latY" name="latY"
                                                                                     value=""/></div>
        </div>

    </div>
</div>