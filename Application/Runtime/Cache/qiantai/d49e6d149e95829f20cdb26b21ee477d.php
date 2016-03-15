<?php if (!defined('THINK_PATH')) exit();?>    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- jQuery -->
<!--<script type="text/javascript" src="/Public/js/jquery.js"></script>-->
<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js  "></script>
<!--<script src="/Public/js/jquery.min.js"></script>-->
<script src="http://apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>


<!-- Bootstrap JavaScript -->
<!--<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>-->
<script type="text/javascript" src="/Public/js/bootstrap.js"></script>
<script type="text/javascript" src="/Public/js/bootstrap-table.js"></script>
<script type="text/javascript" src="/Public/js/bootstrap-table-zh-CN.js"></script>
<!--<script type="text/javascript" src="/Public/js/area/area.js"></script>-->
<script type="text/javascript" src="/Public/js/area/location.js"></script>
<!--<script type="text/javascript" src="/Public/js/angular.js"></script>-->
<!--<script type="text/javascript" src="/Public/js/angular-route.js"></script>-->
<!--<script src="http://apps.bdimg.com/libs/angular.js/1.4.0-beta.4/angular.min.js"></script>-->
<!--<script src="http://apps.bdimg.com/libs/angular-route/1.3.13/angular-route.js"></script>-->
<!-- import -->
<!-- <script type="text/javascript" src="/Public/Js/bootstrap.js"></script> -->

<!-- load -->
<!---->

<!-- css -->
<link rel="stylesheet" type="text/css" href="/Public/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="/Public/css/bootstrap-table.css" />
<link rel="stylesheet" type="text/css" href="/Public/css/APPqt.css" />
<link rel="stylesheet" type="text/css" href="/Public/css/normalize.css" />
<link rel="stylesheet" type="text/css" href="/Public/css/jquery-ui-1.10.0.custom.css" />
<!--<link rel="stylesheet" type="text/css" href="/Public/css/lanrenzhijia.css" />-->


<!-- js -->
    <title></title>
</head>
<body>

<select id="loc_province" class="form-control"></select>
<select id="loc_city" class="form-control"></select>
<select id="loc_town" class="form-control"></select>
<script>
    $(document).ready(function() {
        showLocation();
    });
    function showLocation(province , city , town) {

        var loc	= new Location();
        var title	= ['省份' , '地级市' , '市、县、区'];
        $.each(title , function(k , v) {
            title[k]	= '<option value="">'+v+'</option>';
        })

        $('#loc_province').append(title[0]);
        $('#loc_city').append(title[1]);
        $('#loc_town').append(title[2]);


        $('#loc_province').change(function() {
            $('#loc_city').empty();
            $('#loc_city').append(title[1]);
            loc.fillOption('loc_city' , '0,'+$('#loc_province').val());
            $('#loc_town').empty();
            $('#loc_town').append(title[2]);
            //$('input[@name=location_id]').val($(this).val());
        })

        $('#loc_city').change(function() {
            $('#loc_town').empty();
            $('#loc_town').append(title[2]);
            loc.fillOption('loc_town' , '0,' + $('#loc_province').val() + ',' + $('#loc_city').val());
            //$('input[@name=location_id]').val($(this).val());
        })

        $('#loc_town').change(function() {
            $('input[name=location_id]').val($(this).val());
        })
//
        if (province) {
            loc.fillOption('loc_province' , '0' , province);

            if (city) {
                loc.fillOption('loc_city' , '0,'+province , city);

                if (town) {
                    loc.fillOption('loc_town' , '0,'+province+','+city , town);
                }
            }

        } else {
            loc.fillOption('loc_province' , '0');
        }

    }
</script>
</body>
</html>