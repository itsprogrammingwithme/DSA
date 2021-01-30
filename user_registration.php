<?php
 
// Importing DBConfig.php file.
//Define your host here.
$HostName = "bgfz0b2wihu6iechxgds-mysql.services.clever-cloud.com";
 
//Define your database name here.
$DatabaseName = "bgfz0b2wihu6iechxgds";
 
//Define your database username here.
$HostUser = "ughaijth8ft2wpjh";
 
//Define your database password here.
$HostPass = "OBfrsxYhWiuoAhYJeHpm";
  $message="";
// Creating connection.
$Enoded_data= file_get_contents('php://input'); //use to fetch api in json foramt 
$Decoded_data=json_decode($Enoded_data,true);  // decode data from json formet
$uname=$Decoded_data['uname']; 
$password=$Decoded_data['password'];
$con =  mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
 if($con){
    echo("Connection Successful \n");
    $query= "select * from Surveyur where uname like $uname and password like $password  ;" ;
    $result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
          
 if($row['uname']=='Shivam' && $row['password']=='123'){
    //  echo  ("matched");
     $message="matched  \n\n\n\n";
 }
} else {
    $message="not matched";
}

 mysqli_close($con);
 }
 else{
//   echo ("connection not established")   ;
      $message="connection not established";
 }

 $response[]= array("mess"=>$message);
 echo json_encode($response);

?>
