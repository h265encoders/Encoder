<?php
session_start();

if ( isset( $_POST[ 'name' ] ) && isset( $_POST[ 'passwd' ] ) ) {
	$name = $_POST[ 'name' ];
	$passwd = $_POST[ 'passwd' ];
	$json_string = file_get_contents('/link/config/passwd.json');  
	$data = json_decode($json_string, true);
	for($i=0;$i<count($data);$i++)
	{
		if($data[$i]["name"]==$name && $data[$i]["passwd"]==md5($passwd))
		{
			$_SESSION[ 'login' ] = $name;
			echo '{"res":"OK"}';
			exit;
		}
	}   
}
echo '{"res":"账号或密码错误"}';
?>