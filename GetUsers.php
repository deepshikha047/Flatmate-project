<?php
header('Access-Control-Allow-Origin: *');

session_start();
include_once('../Database/DBMySql.php');$db=new DBMySql;

$Keyword=$VideoSeries='';$City='';
if(isset($_GET["UID"]))$SQL="SELECT *,DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(DOB, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(DOB, '00-%m-%d')) AS Age from users where `Status`<>'Disable' && UID=".$_GET["UID"];
else if(isset($_GET["City"]))$SQL="SELECT *,DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(DOB, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(DOB, '00-%m-%d')) AS Age from users where `Status`<>'Disable' && City like '%".$_GET["City"]."%'";
else if(isset($_SESSION["UID"]))$SQL="SELECT *,DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(DOB, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(DOB, '00-%m-%d')) AS Age from users where `Status`<>'Disable' && UID=".$_SESSION["UID"];
else {
    $Response["Status"]='Error';
    $Response["Message"]='Invalid Parameters';
    echo json_encode($Response); return;
}


$result=$db->GetResult($SQL);
$myArray = array();
while($row = $result->fetch_assoc())
{
    $myArray[] = $row;
}
//shuffle($myArray);
echo json_encode($myArray);


?>