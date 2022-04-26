<?php
header('Access-Control-Allow-Origin: *');

session_start();

$Email=$err="";
if (isset($_GET["Email"]) && isset($_GET["PWD"])) {
    include('../Database/DBMySql.php');$db=new DBMySql;

    $Email =  $_GET["Email"];
    $PWD =  $_GET["PWD"];


    $sql="select count(*) from `users` where `Email` ='".$Email."' and `PWD` ='".$PWD."';";

    if( $db->ScalerQuery($sql)=="1")
    {
        $sql="select * from `users` where `Email` ='".$Email."' and `PWD` ='".$PWD."';";
        $User=$db->GetSingleRow($sql);
        $_SESSION["UID"]=$UID=$User["UID"];
        $Interests = $db->GetSingleColumnArray("SELECT `AID` FROM `interests` WHERE UID=".$UID);

        $UID = $User["UID"];

        $User["Interests"]=$Interests;


        $_SESSION["UserName"]= $db->ScalerQuery("select UserName from `users` where UID=".$UID);
        $_SESSION["UserType"]= $db->ScalerQuery("select UserType from `users` where UID=".$UID);
        $_SESSION["Email"]=$Email;

        $Response["Status"]='Success';
        $Response["Message"]='Login Successful';
        $Response["Data"]=$User;

    }
    else{
        $Response["Status"]='Error';
        $Response["Message"]='Invalid Credentials';

    }
}else{
    $Response["Status"]='Error';
    $Response["Message"]='Invalid Parameters';

}
echo json_encode($Response);
?>