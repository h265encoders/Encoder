<?php
include( "config.php" );
include( "session.php" );
include( "headhead.php" );

?>
<nav class="navbar navbar-default">
  <div class="container" > 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      <a class="navbar-brand" href="/dashboard.php"> <img src="/img/logo.png" style="width: 97px; height: 40px;" class="visible-xs-block visible-sm-block" /> <img src="/img/logo.png" class="visible-md-block visible-lg-block" /> </a> </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="defaultNavbar1">
      <ul class="nav navbar-nav navc">
        <li><a href="/dashboard.php"><i class="fa fa-tachometer menuIcon"></i><cn>运行状态</cn><en>Dashboard</en></a></li>
        <li><a href="/encode.php"><i class="fa fa-image menuIcon"></i><cn>编码设置</cn><en>Encode</en></a></li>
        <li><a href="/stream.php"><i class="fa fa-upload menuIcon"></i><cn>输出设置</cn><en>Stream</en></a></li>
<?php
if(!isset($overlay) || $overlay)
{
?>
        <li><a href="/overlay.php"><i class="fa fa-magic menuIcon"></i><cn>叠加特效</cn><en>Overlay</en></a></li>
<?php
}
?>
        <li role="presentation" class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-puzzle-piece menuIcon"></i><cn>扩展功能</cn><en>Extend</en><span class="caret"></span> </a>
          <ul class="dropdown-menu">
<?php
if(!isset($MIX) || $MIX)
{
?>
            <li><a href="/mix.php"><i class="fa fa-th"></i><cn>视频混合</cn><en>Video mix</en></a></li>
<?php
}
?>
			  <li><a href="/roi.php"><i class="fa fa-user-circle-o"></i>ROI</a></li>
              <?php
              if((!isset($NDI) || $NDI) && (!isset($HDMI_Out) || $HDMI_Out))
              {
              ?>
              <li><a href="/ndi.php"><i class="fa fa-television"></i>NDI <cn>解码</cn><en>decode</en></a></li>
			  <?php
			  }
			  if($carousel)
			  {
				?>
				<li><a href="/carousel.php"><i class="fa fa-youtube-play"></i><cn>视频轮播</cn><en>Video carousel</en></a></li>            
			  <?php
			  }
			  if($record)
			  {
			  ?>
				<li><a href="/record.php"><i class="fa fa-folder-open"></i><cn>文件录制</cn><en>Record</en></a></li>
			  <?php
			  }
				?>
			  <li><a href="/push.php"><i class="fa fa-arrow-circle-up"></i><cn>多平台直播</cn><en>Multiple Push</en></a></li>
			  <li><a href="/player.php"><i class="fa fa-play-circle-o"></i><cn>H5 播放器</cn><en>H5 Player</en></a></li>
<?php
if(!isset($button) || $button)
{
?>
		<li><a href="/uart.php"><i class="fa fa-link"></i><cn>串口、按键</cn><en>Serial, Button</en></a></li>
<?php
}
?>
<?php
if(isset($remote) && $remote)
{
  ?>
  <li><a href="/remote.php"><i class="fa fa-fire"></i><cn>红外遥控</cn><en>Remote</en></a></li>
  <?php
}
?>
          </ul>
        </li>
        <li role="presentation" class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true"> <i class="fa fa-gears menuIcon"></i><cn>高级设置</cn><en>Options</en><span class="caret"></span> </a>
          <ul class="dropdown-menu">
              <li><a href="/sys.php"><i class="fa fa-gear"></i><cn>系统设置</cn><en>System</en></a></li>
              <li><a href="/group.php"><i class="fa fa-server"></i><cn>群组设置</cn><en>Group</en></a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navr">
        <li role="presentation" class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true"> <i class="fa fa-globe"></i><en>语言</en><cn>Language</cn><span class="caret"></span> </a>
          <ul class="dropdown-menu">
            <li><a href="#" onClick="changeLang('en');">English</a></li>
            <li><a href="#" onClick="changeLang('cn');">中文</a></li>
          </ul>
        </li>
        <li> <a id="logout" class="btn btn-default" href="login.php?logout=true"> <i class="fa fa-sign-out"></i><en>Sign out</en><cn>退出</cn></a> </li>
      </ul>
    </div>
    
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>
<div class="container main">
