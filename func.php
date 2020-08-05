<?php
include( "config.php" );
include( "session.php" );
date_default_timezone_set('PRC');
ini_set( 'default_socket_timeout', 2 );
$result = ( object )array( 'error' => '' );

if ( isset( $_GET[ 'func' ] ) )
	call_user_func( $_GET[ 'func' ] );
else
	exit;

echo json_encode( $result );

function setPasswd() {
	global $result;

	$old = $_POST[ 'old' ];
	$new1 = $_POST[ 'new1' ];
	$new2 = $_POST[ 'new2' ];
	$json_string = file_get_contents( '/link/config/passwd.json' );
	$data = json_decode( $json_string, true );
	if ( $data[ 0 ][ "passwd" ] != md5( $old ) ) {
		$result->error = "<cn>原密码错误</cn><en>Original password wrong</en>";
		return;
	}

	if ( $new1 != $new2 ) {
		$result->error = "<cn>密码不一致</cn><en>Password inconformity</en>";
		return;
	}

	$data[ 0 ][ "passwd" ] = md5( $new1 );

	$json = json_encode( $data );
	file_put_contents( '/link/config/passwd.json', $json );
	$result->result = "<cn>修改密码成功</cn><en>Save password success</en>";
}

function getTime() {
	global $result;
	$result->result = date( "Y-m-d H:i:s", intval( time() ) );
}

function delRes() {
	exec( 'rm /link/res/'. $_POST[ 'file' ] );
}

function setTime() {
	exec( "/link/bin/rtc -s time " . $_POST[ 'time' ]. " '".$_POST[ 'time2' ]."'" );
	exec( "/link/bin/rtc -g time" );
	global $result;
	$result->result = "/link/bin/rtc -s time " . $_POST[ 'time' ];
}

function reboot() {
	exec( '/link/shell/reboot.sh' );
}

function resetCfg() {
	exec( '/link/shell/reset.sh' );
}

function setNDI() {
global $result;
$json_string = file_get_contents( '/link/config/ndi.json' );
$data = json_decode( $json_string, true );
$data[ "ndi" ] = $_POST[ 'ndi' ];
$json = json_encode( $data , JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
file_put_contents( '/link/config/ndi.json', $json );
}

function setNetwork() {
	global $result;
	$json_string = file_get_contents( '/link/config/net.json' );
	$data = json_decode( $json_string, true );
	$data[ "ip" ] = $_POST[ 'ip' ];
	$data[ 'mask' ] = $_POST[ 'mask' ];
	$data[ 'gateway' ] = $_POST[ 'gateway' ];
	$data[ 'dns' ] = $_POST[ 'dns' ];
	if(isset($_POST[ 'dhcp' ]))
	{
		$data[ 'dhcp' ] = ($_POST[ 'dhcp' ]=="true");
	}
	$result->mask = $data[ 'mask' ];
	$result->data = $data;
	$json = json_encode( $data );
	file_put_contents( '/link/config/net.json', $json );
	exec( '/link/shell/setNetwork.sh' );
}

function setNetwork2() {
	global $result;
	$json_string = file_get_contents( '/link/config/net2.json' );
	$data = json_decode( $json_string, true );
	$data[ "ip" ] = $_POST[ 'ip' ];
	$data[ 'mask' ] = $_POST[ 'mask' ];
	$data[ 'gateway' ] = $_POST[ 'gateway' ];
	$data[ 'dns' ] = $_POST[ 'dns' ];
	if(isset($_POST[ 'dhcp' ]))
	{
		$data[ 'dhcp' ] = ($_POST[ 'dhcp' ]=="true");
	}
	$result->mask = $data[ 'mask' ];
	$result->data = $data;
	$json = json_encode( $data );
	file_put_contents( '/link/config/net2.json', $json );
	exec( '/link/shell/setNetwork.sh eth1' );
}

function setCron() {
	global $result;
	if ( isset( $_POST[ 'day' ] ) && isset( $_POST[ 'time' ] ) ) {
		if ( $_POST[ 'day' ] == "x" )
		{
			exec( 'echo "" | crontab -u root -' );
		}
		else {
			exec( 'echo "0 ' . $_POST[ 'time' ] . ' * * ' . $_POST[ 'day' ] . ' /link/shell/reboot.sh" | crontab -u root -' );
		}

		$result->result = "OK";
	} else {
		$result->result = shell_exec( 'crontab -u root -l' );
	}
}

function startHelp() {
	global $result;
	$result->result = "OK";
	$authCode=$_POST[ 'authCode' ];
	$sshPort=2000+intval($authCode);
	$rtspPort=5000+intval($authCode);
	exec("pkill ngrokc" );
	exec("/usr/bin/ngrokc -SER[Shost:".$help.",Sport:4443] -AddTun[Type:http,Lhost:127.0.0.1,Lport:80,Sdname:".$authCode."] -AddTun[Type:tcp,Lhost:127.0.0.1,Lport:22,Rport:".$sshPort."] -AddTun[Type:tcp,Lhost:127.0.0.1,Lport:554,Rport:".$rtspPort."] > /tmp/ngrok &" );
}

function stopHelp() {
	global $result;
	$result->result = "OK";
	exec("pkill ngrokc" );
}


function setNtp() {
		$json_string = file_get_contents( '/link/config/ntp.json' );
		$data = json_decode( $json_string, true );
		$data[ 'server' ] = $_POST[ 'server' ];
		$data[ 'enable' ] = ($_POST[ 'enable' ]=="true");
		$json = json_encode( $data );
		file_put_contents( '/link/config/ntp.json', $json );
}

function setMac() {
		file_put_contents( '/link/config/mac', $_POST[ 'mac' ] );
}


function setEDID() {
	exec( 'cp /link/config/edid/'.$_POST[ 'edid' ].'.bin /link/config/edid/edid.bin' );
	exec( 'echo '.$_POST[ 'edid' ].' > /link/config/curEDID' );
}



function changeType() {
	exec( 'echo '.$_POST[ 'type' ].' > /link/config/fac' );
	exec( 'cp /link/fac/'.$_POST[ 'type' ].'/* /link/ -rd' );
	exec( 'chmod 777 /link -R' );
	exec( 'pkill Encoder' );
}

function delFile() {
	global $rootPath;
	exec( 'rm '.$rootPath.'/'. $_POST[ 'name' ].' -r');
}

function testNet(){
	global $result;
	exec('timeout -t 2 ping www.qq.com -c1',$result->result);
}

function setVideoBuffer() {
	global $result;
	$json_string = file_get_contents( '/link/config/board.json' );
	$json_string2 = file_get_contents( '/link/config/videoBuffer.json' );
	$board = json_decode( $json_string, true );
	$videoBuffer = json_decode( $json_string2, true );
	$board[ "videoBuffer" ] = $videoBuffer[$_POST[ 'scene' ]];
	$json_string = json_encode( $board,JSON_PRETTY_PRINT );
	file_put_contents( '/link/config/board.json', $json_string );
	exec( 'pkill Encoder' );
	$result->result = "OK";
}

function showFunc() {
global $result;
$str = file_get_contents( '/link/web/config.php' );
$lines = explode("\n",$str);

$result->result = "";

foreach($_POST as $key => $val)
{
for($i=0;$i<count($lines);$i++){
if(strpos($lines[$i], $key) > 0)
{
if(is_string($val) && $val!="true" && $val!="false")
$lines[$i]="$".$key."=\"".$val."\";";
else
$lines[$i]="$".$key."=".$val.";";
break;
}
}
}



file_put_contents( '/link/web/config.php', join("\n",$lines));
}
?>
