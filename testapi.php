<?php
$to = "mohit.xxx@gmail.com";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: mohit.xxx@gmail.com";

mail($to,$subject,$txt,$headers);
?>




<?PHP
//f(session_status()==1)
{session_start();}

$Name=$Mobile=$Email=$PWD=$Address="";
include('assets/Database/DBMySql.php'); $db=new DBMySql;


$err=$UID= $Name=$Mobile=$Email=$PWD=$REPWD="";
if (isset($_POST["Image"])) {

    
    $File = $_FILES["Image"];
    $file_name = $_FILES['Image']['name']; 
    $file_size =$_FILES['Image']['size'];
    $file_tmp =$_FILES['Image']['tmp_name'];
    $file_type=$_FILES['Image']['type'];
    $file_ext="";
}



?>