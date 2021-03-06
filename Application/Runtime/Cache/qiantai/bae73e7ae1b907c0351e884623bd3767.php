<?php if (!defined('THINK_PATH')) exit();?><link href="/Public/css/validation/formValidation.css">
<script src="/Public/js/validation/formValidation.js"></script>
<script src='/Public/js/validation/bootstrap.js'></script>
<script type="text/javascript" src="/Public/js/validation/zh_CN.js"></script>

<style type="text/css">
    @import url("http://fonts.useso.com/css?family=Open+Sans");
    @import url("http://fonts.useso.com/css?family=Roboto:400,700");
    .div_fl_3 {
        width: 100%;
        height: 150px;
        float: left;
        margin-top: 10px;
        color: #f00;
        border: 1px solid #ccc;
        overflow: hidden;
    }
    *, *:before, *:after {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html, body {
        height: 100%;
    }
    ul {
        list-style: none;
    }

    .cf:before, .cf:after {
        content: '';
        display: table;
    }

    .cf:after {
        clear: both;
    }

    .title {
        padding: 50px 0;
        font: 24px 'Open Sans', sans-serif;
        text-align: center;
    }

    .inners {
        max-width: 820px;
        margin: 0 auto;

    }

    .breadcrumbs {
        font: 12px/1 'Roboto', sans-serif;
        border-top: 1px solid #ddd;
        border-bottom: 1px solid #ddd;
        background-color: #f5f5f5;
    }

    .breadcrumbs ul {
        border-left: 1px solid #ddd;
        border-right: 1px solid #ddd;
        margin-bottom: 0;
    }

    .breadcrumbs li {
        float: left;
        width: 33.3%;
    }

    .breadcrumbs a {
        position: relative;
        display: block;
        padding: 20px;
        padding-right: 0 !important;
        /* important overrides media queries */
        font-size: 13px;
        font-weight: bold;
        text-align: center;
        color: #aaa;
        cursor: pointer;
    }

    .breadcrumbs a:hover {
        background: #eee;
    }

    .breadcrumbs a.active {
        color: #777;
        background-color: #fafafa;
    }

    .breadcrumbs a span:first-child {
        display: inline-block;
        width: 22px;
        height: 22px;
        padding: 2px;
        margin-right: 5px;
        border: 2px solid #aaa;
        border-radius: 50%;
        background-color: #fff;
    }

    .breadcrumbs a.active span:first-child {
        color: #fff;
        border-color: #777;
        background-color: #777;
    }

    .breadcrumbs a:before,
    .breadcrumbs a:after {
        content: '';
        position: absolute;
        top: 0;
        left: 100%;
        z-index: 1;
        display: block;
        width: 0;
        height: 0;
        border-top: 32px solid transparent;
        border-bottom: 32px solid transparent;
        border-left: 16px solid transparent;
    }

    .breadcrumbs a:before {
        margin-left: 1px;
        border-left-color: #d5d5d5;
    }

    .breadcrumbs a:after {
        border-left-color: #f5f5f5;
    }

    .breadcrumbs a:hover:after {
        border-left-color: #eee;
    }

    .breadcrumbs a.active:after {
        border-left-color: #fafafa;
    }

    .breadcrumbs li:last-child a:before,
    .breadcrumbs li:last-child a:after {
        display: none;
    }

    @media (max-width: 720px) {
        .breadcrumbs a {
            padding: 15px;
        }

        .breadcrumbs a:before,
        .breadcrumbs a:after {
            border-top-width: 26px;
            border-bottom-width: 26px;
            border-left-width: 13px;
        }
    }

    @media (max-width: 620px) {
        .breadcrumbs a {
            padding: 10px;
            font-size: 12px;
        }

        .breadcrumbs a:before,
        .breadcrumbs a:after {
            border-top-width: 22px;
            border-bottom-width: 22px;
            border-left-width: 11px;
        }
    }

    @media (max-width: 520px) {
        .breadcrumbs a {
            padding: 5px;
        }

        .breadcrumbs a:before,
        .breadcrumbs a:after {
            border-top-width: 16px;
            border-bottom-width: 16px;
            border-left-width: 8px;
        }

        .breadcrumbs li a span:first-child {
            display: block;
            margin: 0 auto;
        }

        .breadcrumbs li a span:last-child {
            display: none;
        }
    }
</style>
<div class="page-header">
    <ol class="breadcrumb">
        <li><a href="#">个人中心</a></li>
        <li class="active">会员认证</li>
    </ol>
</div>
<div class='breadcrumbs' style="margin-top: 30px">
    <div class='inners'>
        <ul class='cf'>
            <li><a id="s1" class='active'><span>1</span><span>认证</span></a></li>
            <li><a id="s2"><span>2</span><span>审核中</span></a></li>
            <li><a id="s3"><span>3</span><span>审核完成</span></a></li>
        </ul>
    </div>
</div>
<div id="step1" style="width: 100%;margin-top: 20px;display: block">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <form id="defaultForm" method="post" class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-4 control-label">公司名</label>

                <div class="col-md-7">
                    <input type="text" class="form-control" name="name" placeholder="请填写公司名称"/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label">地址</label>


                <div class="col-md-7">
                    <select style="width: 30%;float: left;margin-right: 10px;" id="loc_province"
                            class="form-control"></select>
                    <select style="width: 30%;float: left;margin-right: 10px;" id="loc_city"
                            class="form-control"></select>
                    <select name="loc_town" style="width: 30%;" id="loc_town" class="form-control"></select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label">详细地址</label>

                <div class="col-sm-7">
                    <input type="text" class="form-control" name="detailAddress" id="detailAddress"
                           placeholder="请填写公司的详细地址"/>
                </div>
            </div>
            <input type="text" name="address" id="address"
                   style="display:none;">

            <div class="form-group">
                <label class="col-sm-4 control-label">联系人</label>

                <div class="col-sm-7">
                    <input type="text" class="form-control" name="person" placeholder="请输入联系人"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">手机号码</label>

                <div class="col-sm-7">
                    <input type="text" class="form-control" name="phone" placeholder="请输入手机号码"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">营业执照注册号</label>

                <div class="col-sm-7">
                    <input type="text" class="form-control" name="licenseID" placeholder="营业执照注册号码"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">营业执照图片</label>

                <div class="col-sm-7">
                    <input id="img1" type="file" class="form-control" name="businessImg"/>
                    <input type="text" name="licenseImage" id="img11" style="display: none">

                    <div class="div_fl_3" id="businessImgDiv">
                        <img id="flattensBusinessImages" style="width: 100%;height: 100%" src="/Uploads/img/logo.jpg"
                             alt="营业执照示例图">


                    </div>
                    <span style="color: red">上传图片格式为JPG、JPEG、PNG，单张大小不超过1M。</span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">税务登记证</label>

                <div class="col-sm-7">
                    <input id="img2" type="file" class="form-control" name="registrationImg"/>
                    <input type="text" name="taxImage" id="img21" style="display:none;">

                    <div class="div_fl_3" id="registrationImgDiv">
                        <img id="registrationImages" style="width: 100%;height: 100%" src="/Uploads/img/logo.jpg">
                    </div>
                    <span style="color: red">上传图片格式为JPG、JPEG、PNG，单张大小不超过1M。</span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">组织机构代码证</label>

                <div class="col-sm-7">
                    <input id="img3" type="file" class="form-control" name="organizationImg"
                           placeholder="营业执照注册号码"/>
                    <input type="text" name="codeImage" id="img31" style="display:none;">

                    <div class="div_fl_3" id="organizationImgDiv">
                        <img id="organizationImages" style="width: 100%;height: 100%" src="/Uploads/img/logo.jpg">
                    </div>
                    <span style="color: red">上传图片格式为JPG、JPEG、PNG，单张大小不超过1M。</span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-8 col-sm-offset-4">
                    <button type="submit" class="btn btn-primary">提交审核</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>
<div id="step2" style="width: 100%;margin-top: 20px;display: none;">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="alert alert-success" role="alert" style="height: 200px">
            <strong>Success!</strong>
            <hr>
            <p>你提交的企业信息已转交至后台，我们工作人员会在3-5内审核完成。您可以继续浏览货源货源或者车源</p>
        </div>
    </div>
    <div class="col-md-2"></div>

</div>
<div id="step3" style="width: 100%;margin-top: 20px;display: none;">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <?php if($list["state"] == 'authed'): ?><div class="alert alert-success" role="alert" style="height: 350px">
                <strong>你已通过认证</strong>
                <hr>
                <table class="table table-striped">
                    <tr>
                        <td>公司名</td>
                        <td><?php echo ($list["name"]); ?></td>
                    </tr>
                    <tr>
                        <td>联系人</td>
                        <td><?php echo ($list["person"]); ?></td>
                    </tr><tr>
                        <td>联系电话</td>
                        <td><?php echo ($list["phone"]); ?></td>
                    </tr><tr>
                        <td>公司名</td>
                        <td><?php echo ($list["name"]); ?></td>
                    </tr>
                    <tr>
                        <td>地址</td>
                        <td><?php echo ($list["address"]); ?></td>
                    </tr>
                </table>
            </div>
            <?php elseif($list["state"] == 'invalid'): ?>
            <div class="alert alert-warning" role="alert" style="height: 200px">
                <strong>认证失败</strong>
                <hr>
                <?php echo ($list["reason"]); ?> 请<a href="javascript:void(0)" style="color: red" onclick="reset()">重新认证</a>
            </div><?php endif; ?>
    </div>
    <div class="col-md-2"></div>

</div>
<script>
    function reset(){
        $.post("<?php echo U('resetAuth');?>",
                function (data) {
                    if (data.result == 'success') {
                        $.get("<?php echo U('authentication');?>", function (data) {
                            $('#goodChildView').html(data)
                        })
                    }
                }, 'json'
        )
    }
</script>
<script>
    showLocation()
    var state = "<?php echo ($list["state"]); ?>"
    if (state == "wait") {
        $('#s1').removeClass();
        $('#s2').addClass('active');
        $('#step1').hide();
        $('#step2').show();
        console.log('等待审核')
    } else if (state == 'authed') {
        $('#s1').removeClass();
        $('#s3').addClass('active');
        $('#step1').hide();
        $('#step2').hide();
        $('#step3').show();
    } else if (state == 'invalid') {
        $('#s1').removeClass();
        $('#s3').addClass('active');
        $('#step1').hide();
        $('#step2').hide();
        $('#step3').show();
    }
    $('#defaultForm')
            .formValidation({
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    name: {
                        validators: {
                            notEmpty: {
                                message: '公司名必填'
                            },
                        }
                    },
                    loc_town: {
                        validators: {
                            notEmpty: {
                                message: '地址必填'
                            }
                        }
                    },
                    detailAddress: {
                        validators: {
                            notEmpty: {
                                message: '详细地址必填'
                            }
                        }
                    },
                    phone: {
                        validators: {
                            notEmpty: {
                                message: '手机号码必填'
                            },
                        }
                    },
                    person: {
                        validators: {
                            notEmpty: {
                                message: '联系人名必填'
                            }
                        }
                    },
                    licenseID: {
                        validators: {
                            notEmpty: {
                                message: '营业执照注册号必填'
                            }
                        }
                    },
                    businessImg: {
                        validators: {
                            file: {
                                extension: 'JPG,JPEG,png',
//                                                type: 'application/pdf',
                                maxSize: 1024 * 1024,
                                message: '请选择正确格式和大小的图片'
                            },
                            notEmpty: {
                                message: '必须上传图片'
                            },
                        }
                    },
                    registrationImg: {
                        validators: {
                            file: {
                                extension: 'JPG,JPEG,png',
                                maxSize: 1024 * 1024,
                                message: '请选择正确格式和大小的图片'
                            },
                            notEmpty: {
                                message: '必须上传图片'
                            }
                        }
                    },
                    organizationImg: {
                        validators: {
                            file: {
                                extension: 'JPG,JPEG,png',
                                maxSize: 1024 * 1024,
                                message: '请选择正确格式和大小的图片'
                            },
                            notEmpty: {
                                message: '必须上传图片'
                            },
                        }
                    }
                }
            })
            .on('success.form.fv', function (e) {
                e.preventDefault();
                var $form = $(e.target);

                // Get the FormValidation instance
                var bv = $form.data('formValidation');
                $('#address').val($('#loc_province  option:selected').text() + $('#loc_city  option:selected').text() + $('#loc_town  option:selected').text() + $('#detailAddress').val())

                $.post("<?php echo U('authCompany');?>",
                        $('#defaultForm').serialize(),
                        function (data) {
                            console.log(data);
                            if (data.result == 'success') {
                                $('#s1').removeClass();
                                $('#s2').addClass('active');
                                $('#step1').hide();
                                $('#step2').show();
                                Lobibox.notify('success', {
                                    size: 'mini',
                                    width: 300,
                                    msg: '提交审核成功，等待客服人员审核'
                                });
                            }
                            else {
                                Lobibox.notify('error', {
                                    size: 'mini',
                                    width: 300,
                                    msg: data.describe
                                });
                            }
                        }, 'json'
                )


            });

    function readFile(obj, id) {
        var file = obj.files[0];
        //判断类型是不是图片
        if (!/image\/\w+/.test(file.type)) {
            alert("请确保文件为图像类型");
            return false;
        }
        var reader = new FileReader();
        var base;
        reader.readAsDataURL(file);
        reader.onload = function (e) {
//            alert(this.result); //就是base64
//            console.log(this.result.replace(/^data:image\/(png|jpg|jpeg);base64,/, ""));
            $("#" + id + "1").val(this.result.replace(/^data:image\/(png|jpg|jpeg);base64,/, ""))
        }

    }
    $('#img1').change(function (data) {
        readFile(this, $(this).attr('id'))
        var objUrl = getObjectURL(this.files[0]);
        if (objUrl) {
            $('#flattensBusinessImages').attr('src', objUrl)
        }
    })
    $('#img2').change(function (data) {
        readFile(this, $(this).attr('id'))
        var objUrl = getObjectURL(this.files[0]);
        if (objUrl) {
            $('#registrationImages').attr('src', objUrl)
        }
    })
    $('#img3').change(function (data) {
        readFile(this, $(this).attr('id'))
        var objUrl = getObjectURL(this.files[0]);
        if (objUrl) {
            $('#organizationImages').attr('src', objUrl)
        }
    })

    function getObjectURL(file) {
        var url = null;
        if (window.createObjectURL != undefined) { // basic
            url = window.createObjectURL(file);
        } else if (window.URL != undefined) { // mozilla(firefox)
            url = window.URL.createObjectURL(file);
        } else if (window.webkitURL != undefined) { // webkit or chrome
            url = window.webkitURL.createObjectURL(file);
        }
        return url;
    }

</script>