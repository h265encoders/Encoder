<?php

$response = array();
if(move_uploaded_file($_FILES['file']['tmp_name'], "/link/config/config.json")){
  $response['isSuccess'] = true;
}else{
  $response['isSuccess'] = false;
}
echo json_encode($response);
?>