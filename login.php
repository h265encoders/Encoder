<?php
include( "config.php" );
session_start();
if ( isset( $_GET[ 'logout' ] ) )
	$_SESSION[ 'login' ] = "";

$errStr = "";

if ( isset( $_POST[ 'name' ] ) && isset( $_POST[ 'passwd' ] ) ) {
	$name = $_POST[ 'name' ];
	$passwd = $_POST[ 'passwd' ];
	$json_string = file_get_contents('/link/config/passwd.json');  
	$data = json_decode($json_string, true);
	for($i=0;$i<count($data);$i++)
	{
		if($data[$i]["name"]==$name && $data[$i]["passwd"]==md5($passwd))
			$_SESSION[ 'login' ] = $name;
		else
			$errStr = "账号或密码错误";
	}   
}


if ( isset( $_SESSION[ 'login' ] ) && ( $_SESSION[ 'login' ] == "admin" || $_SESSION[ 'login' ] == "superadmin" ) ) {
	header( "Location:dashboard.php" );
	exit();
}

include( "headhead.php" );
?>
  <div style="width: 400px; margin: 0 auto;">
    <div class="panel panel-default" style="margin-top:200px; box-shadow: 5px 5px 10px #CCC; background-color: #444; border-radius: 10px;">
      <div class="panel-body">
         <div class="text-center"  style="margin-bottom: 20px;">
         	<img src="img/logo.png" />
         </div>
          	<form class="form-signin" action="login.php" method="post">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-user" style="width: 30px;"></i></div>
                <input type="text" class="form-control input-lg" onkeydown="keyLogin();" name="name" placeholder="name">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-key" style="width: 30px;"></i></div>
                <input type="password" class="form-control input-lg" onkeydown="keyLogin();" name="passwd" placeholder="passwd">
              </div>
            </div>
            
          <div class="form-group text-center row" >
          	<div class="col-xs-12">
            <button class="btn btn-lg btn-warning col-xs-12" id="login" style="font-size: 28px; line-height: 28px; padding-top: 6px; padding-bottom: 8px;" ><i class="fa fa-sign-in" ></i></button>
            </div>
          </div>
          </form>
          <div id="alert">
          	<?php
						if ( $errStr != "" ) {
							echo '<div class="alert alert-danger fade in"> <button class="close close-sm" type="button" data-dismiss="alert"> 
                                    <i class="fa fa-times"></i> 
                                </button> 
                                <strong>' . $errStr . '</strong> 
                            </div>';
						}
			?>
          </div>
          
      </div>
    </div>
  </div>
<script>
	$( "#name" ).focus();
	function keyLogin(){
		
 if (event.keyCode==13)
   $( "#login" ).click();
}
		
		
	</script>
</body>
</html>