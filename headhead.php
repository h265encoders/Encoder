<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="renderer" content="webkit">
<title>LinkPi</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<!-- Bootstrap -->
<link href="/css/bootstrap.css" rel="stylesheet">
<link href="/css/font-awesome.min.css" rel="stylesheet">
<link href="/vendor/switch/bootstrap-switch.css" rel="stylesheet">
<link href="/js/confirm/jquery-confirm.min.css" rel="stylesheet"/>
<link href="/vendor/slider/css/bootstrap-slider.min.css" rel="stylesheet" />
<link href="/vendor/colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="/webuploader/webuploader.css">
<link href="/css/my.css" rel="stylesheet">
<link href="/css/theme/clear.css" rel="stylesheet">
<link rel="stylesheet" id="langcss">

<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
<script src="/js/jquery-1.11.3.min.js"></script>
<script src="/js/jquery.jsonrpcclient.js"></script>
<script src="/js/jquery.cookie.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="/js/global.js" id="globaljs" defLang="<?php echo isset($defLang)?$defLang:"cn"; ?>"></script>
<script>
    var linkHref = function(path) {
        var link = document.createElement('link');
        link.href = path;
        link.rel = 'stylesheet';
        link.type = 'text/css';
        $('head')[0].appendChild(link);
    }
    var used_theme = localStorage.getItem("themeName");
    if(used_theme === null || used_theme === "" || used_theme === undefined) {
        $.getJSON("/config/theme.json",function (data) {
            var used = data["used"];
            if(used !== "" && used !== undefined && used !== null ) {
                localStorage.setItem("themeName",used);
                linkHref("/css/theme/"+used+".css");
                linkHref("/css/theme/theme.css");
            } else {
                location.reload();
            }
        })
    } else {
        linkHref("/css/theme/"+used_theme+".css");
        linkHref("/css/theme/theme.css");
        setTimeout(function () {
            $.getJSON("/config/theme.json",function (data) {
                var used = data["used"];
                if(used !== "" || used !== undefined ) {
                    localStorage.setItem("themeName",used);
                }
            })
        },1000);
    }

    $.getJSON("/config/lang.json",function (data) {
        var lang = data["lang"];
        $("#langcss").attr("href","/css/"+lang+".css");
        $.cookie('lang',lang);
        $("option["+lang+"]").each(function(){
            $(this).text($(this).attr(lang));
        });
    })


</script>
</head>
<body>