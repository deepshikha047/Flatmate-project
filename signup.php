<?PHP
//f(session_status()==1)
{session_start();}

$Name=$Mobile=$Email=$PWD=$Address="";
include("assets/phpscript/FormatedOutput.php");
include('assets/Database/DBMySql.php'); $db=new DBMySql;
$MaritialStatus="Single";
$err=$UID= $Name=$Mobile=$Email=$PWD=$REPWD="";
$DOB=date("Y-m-d");
if (isset($_POST["Name"])) {

    $Name=$_POST["Name"];
    $Mobile=$_POST["Mobile"];
    $Email=$_POST["Email"];
    $PWD=$_POST["PWD"];
    $REPWD=$_POST["REPWD"];
    $DOB=$_POST["DOB"];
    $MaritialStatus=$_POST["MaritialStatus"];

    if($PWD!=$REPWD){$err="Password MisMatch";}
    else if($db->ScalerQuery("select count(*) from users where Mobile='".$Mobile."'")=="1")  {$err="Mobile Already Registered.";}
    else if($db->ScalerQuery("select count(*) from users where Email='".$Email."'")=="1")  {$err="Email Already Registered.";}
    else{
        $sql="INSERT INTO users(`UserName`,`Mobile`,PWD,CreatedOn,Email,DOB,MaritialStatus) VALUES('".$Name."','".$Mobile."','".$PWD."',NOW(),'".$Email."','".$DOB."','".$MaritialStatus."');";
        if($db->NonQuery($sql))
        {
            //$_SESSION["UID"]=$db->ScalerQuery("SELECT max(uid) FROM USERS");
            header("location: login.html");return;
        }

    }
}

$MaritialStatusList = SelectOptionsFormArray(array("Single","Maritial"),$MaritialStatus);

?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>FlatMateNew</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <?php include("menu.php"); ?>
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-xl-4 offset-md-3 offset-lg-3 offset-xl-4">
                <div class="border rounded shadow" style="padding: 17px;background: #f7f7f7;">
                    <form class="form-signin" method="post">
                        <div class="form-group text-center"><img class="rounded-circle profile-img-card" src="assets/img/add_female_user.png" width="100">
                            <?php if($err!='')PrintAlert($err,'danger');?>
                        </div>
                        <div class="form-group"><label>Name</label><input class="form-control" type="text" name="Name" placeholder="Enter Name" required value="<?php echo $Name; ?>"></div>
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input class="form-control" value="<?php echo $DOB; ?>" type="date" required name="DOB" />
                        </div>
                        <div class="form-group">
                            <label>Maritial Status</label>
                            <select class="form-control" required name="MaritialStatus" >
                                <?php echo $MaritialStatusList; ?>
                            </select>
                        </div>
                        <div class="form-group"><label>Mobile</label><input class="form-control" value="<?php echo $Mobile; ?>" type="text" required maxlength="10" pattern="[6789]{1}[0-9]{9}" name="Mobile" placeholder="10 Digit Mobile Number"></div>
                        <div class="form-group"><label>Email</label><input class="form-control" type="email" id="Email" required value="<?php echo $Email; ?>" placeholder="Email address" autofocus="" name="Email"></div>
                        <div class="form-group"><label>Password</label><input class="form-control" type="password" id="PWD" required placeholder="Password" name="PWD"></div>
                        <div class="form-group"><label>Retype Password</label><input class="form-control" type="password" id="REPWD" required placeholder="Re Type Password" name="REPWD"></div><span class="reauth-email"> </span><button class="btn btn-success btn-block btn-signin"
                            type="submit"><i class="fa fa-check btn-signin"></i>&nbsp;Proceed</button></form>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>