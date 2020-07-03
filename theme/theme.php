<?php if(file_exists('theme/common.css')){?>
<link href="theme/common.css" rel="stylesheet">
<?php }?>
<?php 
$theme ='black';
if(file_exists('theme/theme-'.$theme.'.css')){?>
<link href="theme/theme-<?php echo $theme;?>.css" rel="stylesheet">
<?php }?>
<?php if(file_exists('theme/theme.js')){?>
<script src="theme/theme.js" type="text/javascript"></script>
<?php }?>
<?php
//echo '<pre>';
$page = substr($_SERVER['PHP_SELF'],strpos('/')+1);
$page = rtrim($page,'.php');
//echo $page;
switch ($page) {
    case 'dashboard':
    ?>
    <?php
        break;
    
    case 'encode':
        // code...?>
        <style>
            .tip{
                position: relative;
                z-index: 10;
            }
            .tip .fa{
                font-size: 18px;
                margin-left: 5px;
            }
            .tip span:before{
                border-width: 9px;
                border-color:  transparent #D1082A transparent transparent;
                border-style: solid;
                content: '';
                box-sizing:border-box;
                position: absolute;
                left: -19px;
                top: 28px;
            }
            .tip span{
                background: #fff;
                transition: all .3s linear;
                opacity: 0;
                visibility: hidden;
                position: absolute;
                border:1px solid #D1082A;
                border-radius: 5px;
                color:#000;
                padding: 9px;
                top: -30px;
                left: 35px;
                transform: translateX(20px);
                width: 500px;
            }
            .tip.ac span{
                opacity: 1;
                visibility: visible;
                transform: translateX(0);
            }
        </style>
        <script>
	$(document).ready(function(){ 
　　$('#tabNet a').append('<span class="tip"><span>Becasue the total CPU resource is limited, so if Encoder works in a full-load state(HDMI channels is encoding), please be cafreful to import the network stream and focus on CPU status.</span></span>');
            $('#tabNet').on('mouseleave mouseenter',function(){
                $('.tip',$(this)).toggleClass('ac')
            });
            /*$('#tabNet').mouseleave(function(){
                $('.tip',$(this)).removeClass('ac');
            })*/
}); 
            
        </script>
        <?php
        break;
    
    case 'stream':
        // code...
        break;
    case 'overlay':
        // code...
        break;
        
    case 'mix':
        // code...
        break;
        
    case 'monitor':
        // code...
        break;
        
    
    case 'carousel':
        // code...
        break;
    
    case 'sys':
        // code...
        break;
        
    case 'group':
        // code...
        break;
    case 'client':
        // code...
        break;
        
    case 'login':
        // code...
        /*
        ?>
        <style>
            
        </style>
        <script>
        
            $('body>div').attr('style','width: 400px; margin: 0 auto;');
            var p = $('.panel');
            p.addClass('loginform').attr('style','');
            $('.panel-body > .text-center').addClass('logo').append('<p>TBS 4K Encoder</p>');
            $('img').attr('src','theme/logo.png')
            
        </script>
        <?php
        */?>
        <style>
            /*body{
                background: #232323!important;
            }*/
            .footer{
                display: none;
            }
        </style>
        <?php
        break;
        
    default:
        // code...
        break;
}
