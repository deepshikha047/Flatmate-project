<?php
session_start();
include('assets/Database/DBMySql.php'); $db=new DBMySql;
$AID=0;if(isset($_GET["AID"]))$AID = $_GET["AID"];
if (isset($_POST["UploadImage"])) {

    $AID=$_POST["AID"];
    $File = $_FILES["Image"];
    $file_name = $_FILES['Image']['name'];
    $file_size =$_FILES['Image']['size'];
    $file_tmp =$_FILES['Image']['tmp_name'];
    $file_type=$_FILES['Image']['type'];
    $file_ext="";;
    if($file_name){
        $target_file = "assets/img/ads/".$AID."/" .uniqid() .".jpg";
        move_uploaded_file($file_tmp,$target_file);
        header("location: adinfo.php?AID=".$AID);
    }
}
$UID = 0;
if(isset($_SESSION["UID"]))$UID=$_SESSION["UID"];
$IsOwner = isset($_SESSION["UID"]) && $db->ScalerQuery("SELECT COUNT(*) FROM `ads` WHERE UID = ".$UID." AND AID = ".$AID)=="1";
$IsOwner;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>FlatMateNew</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <link rel="stylesheet" href="assets/css/Lightbox-Gallery.css">
    <script src="assets/alertifyjs/alertify.min.js "></script>
    <link rel="stylesheet" href="assets/alertifyjs/css/alertify.min.css" />
    <link rel="stylesheet" href="assets/alertifyjs/css/themes/default.min.css" />
    
    <script src="assets/js/angular.min.js"></script>
    <script src="assets/js/angular-sanitize.min.js"></script>
    <script>
        var app = angular.module('myApp', []);
        app.controller('customersCtrl', function ($scope, $http, $location) {
            $scope.Title = $scope.Mobile = $scope.Address = $scope.City = ''; $scope.Cost = $scope.Capacity = 0;
            $scope.UserGender = 'M'; $scope.SelectedCity = 'Delhi';
            $scope.Cities = ['Delhi', 'Mumbai', 'Chennai', 'NCA', 'Kolkata', 'Lucknow', 'Kanpur'];
            $scope.Ad = $scope.Users = [];
            $scope.AID = 1; $scope.AmIInterested = false
            $scope.UID = 0;
            $scope.IsOwner = false; 
            $scope.IsUserLoggedIn = false; $scope.UID = null;
            $scope.DisplayInterestButtonText = 'Loading';
            $scope.QueryStringToJSON = function () {
                var pairs = location.search.slice(1).split('&');
                var result = {};
                pairs.forEach(function (pair) {
                    pair = pair.split('=');
                    result[pair[0]] = decodeURIComponent(pair[1] || '');
                });
                return JSON.parse(JSON.stringify(result));
            }
            $scope.QueryStringOb = $scope.QueryStringToJSON();
            if ($scope.QueryStringOb.AID != null) $scope.AID = $scope.QueryStringOb.AID;
            
           

            $scope.Load = function () {
                if (localStorage.getItem("User") != null) {
                    $scope.User = angular.fromJson(localStorage.getItem("User"));
                    $scope.UID = $scope.User.UID;
                    $scope.IsUserLoggedIn = true;

                }
                
               


                console.log($scope.User);
                if (!$scope.User.Interests.includes($scope.Ad.AID)) {

                    $scope.DisplayInterestButtonText = "Add To Interests";
                }
                else {
                    $scope.DisplayInterestButtonText = "Remove from Interests";
                }


                $http.get("assets/api/GetAds.php?AID=" + $scope.AID).then(function (response) {
                    $scope.Ad = response.data.Values;
                    $scope.IsOwner = $scope.UID == $scope.Ad.UID;
                    if ($scope.User.Interests.includes($scope.AID)) { $scope.DisplayInterestButtonText = "Remove from Interests"; }
                    else {  $scope.DisplayInterestButtonText = "Add To Interests";}
                    
                                    
                });
                $scope.LoadImages();

               



            }
           
            $scope.LoadImages = function () {
               
                $http.get("assets/api/FileApi.php?GetFiles=../img/ads/" + $scope.AID + "/").then(function (response) {
                    if (response.data.Status == 'Success') {
                        $scope.Images = response.data.Files;
                    }
                });
            }
            $scope.Load();
            


            
            $scope.DeleteImage = function (Path, Index) {
              
                if (!confirm("Are you seure ?")) return;
                
                $http.get("assets/api/FileApi.php?DeleteFile=" + Path).then(function (response) {
                    $scope.Images.splice(Index, 1);
                    console.log("assets/api/FileApi.php?DeleteFile=" + Path);
                //$("#IMG" + Index).attr('hidden', true);
                    if (response.data.Status == 'Success') {
                        $scope.Images = response.data.Files;
                    }
                });
            }
            

            $scope.ToggleInterest = function () {
                $http.get("assets/api/SetInterest.php?AID=" + $scope.Ad.AID).then(function (response) {
                    alertify.success(response.data.Message);
                    if (response.data.Status == 'Success') {
                        $scope.Load();

                        if (!$scope.User.Interests.includes($scope.Ad.AID)) {

                            $scope.User.Interests.push($scope.Ad.AID);
                            $scope.DisplayInterestButtonText = "Remove Interest";
                        }
                        else {

                            $scope.User.Interests.splice( $scope.User.Interests.indexOf($scope.Ad.AID),1);
                                     $scope.DisplayInterestButtonText = "Add to Interest";
                        }


                    }
                });
            }
            $scope.uploadFile = function (files) {
                //console.log(files);
                var fd = new FormData();
                //Take the first selected file

                //$scope.ImageURL = "/upload/" + files[0].name;
                //console.log($scope.ImageURL);

                fd.append("sendimage", files[0]);
                fd.append("AID", $scope.AID);
                console.log(fd.elements);

                uploadUrl =
                    $http.post("uploadfile.php", fd, {
                        withCredentials: true,
                        headers: { 'Content-Type': undefined },
                        enctype: 'multipart/form-data',
                        transformRequest: angular.identity
                    }).then(function () {
                        $scope.LoadImages();
                        alertify.success("Image uploaded");
                    });

               //$scope.LoadImages()

            }

            $scope.Save = function () {
                var Index = $scope.Ads.length;
                var AID = 0;
                $http.get("assets/api/SaveAd.php?Title=" + $scope.Title + "&City=" + $scope.City + "&Address=" + $scope.Address + "&Mobile=" + $scope.Mobile + "&Cost=" + $scope.Cost + "&Capacity=" + $scope.Capacity).then(function (response) {
                    AID = response.data.AID;
                    $scope.Ads[Index] = { AID: AID, Title: $scope.Title, City: $scope.City, Address: $scope.Address, Mobile: $scope.Mobile, Cost: $scope.Cost, Capacity: $scope.Capacity }
                    alertify.success("Ad Posted Successfully");
                    $('#myModal').modal('hide');
                });
            }
            
            $scope.SetGender = function (Gender) { $scope.UserGender = Gender; }
            
        });

        function Load() {
            $('#Body').attr('hidden', false);
            $('#Body').fadeIn('fast', 'swing', function () { });
        }
        function Transition(Page) {
            location.assign(Page);
        }

    </script>
</head>

<body ng-app="myApp" onload="Load()" ng-controller="customersCtrl" id="Body" style="font-size: 14px;">
    <div ng-include src="'menu.php'"></div>
             <div class="container" style="margin-top: 20px;font-size: 15px;">
        <div class="card shadow-sm">
            <div class="card-header d-flex">
                <h5 class="text-primary d-xl-flex flex-fill justify-content-xl-start align-items-xl-center mb-0">Property Info</h5>
                <button ng-show="IsUserLoggedIn && !IsOwner"  ng-click="ToggleInterest();" class="btn btn-primary" type="button">{{DisplayInterestButtonText}}</button>
                <span ng-show="!IsUserLoggedIn" >Login to Add Interest</span>
                <span ng-show="">Added to Interest List</span>
               
            </div>
            <div class="card-body">
                <div class="media">
                    <img class="mr-3" src="assets/img/home.png">
                    <div class="media-body">
                        <h5>Title</h5>
                        <p><i class="fa fa-home"></i>&nbsp;{{Ad.Title}}</p>
                        <p><i class="fa fa-envelope-o"></i><strong>&nbsp;</strong>{{Ad.Email}}</p>
                        <p><i class="fa fa-phone"></i>&nbsp;+{{Ad.Mobile}}</p>
                        <p><i class="fa fa-rupee"></i>&nbsp;{{Ad.Cost}} /-</p>
                        <p><i class="fa fa-group"></i>&nbsp;{{Ad.Capacity}} /-</p>

                        <hr>
                        <h5><strong>People Shown Interest</strong></h5>
                        <ul class="list-group text-secondary" style="font-size: 15px;">
                            <li class="list-group-item" ng-repeat="User in Ad.InterestedUsers">
                                <a href="profile.html?UID={{User.UID}}"><i class="fa fa-user"></i>&nbsp;{{User.UserName}} [ +91 - {{User.Mobile}} ] , Contribution {{User.Contribution}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="photo-gallery">
        <div class="container">
            <div ng-show="IsOwner" class="intro">
                <h2 class="text-center">Room Images</h2>
                <form  style="margin-bottom: 27px;" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                   
                    <input type="file" name="sendimage" onchange="angular.element(this).scope().uploadFile(this.files)" />
                <!-- <input hidden name="AID" value="{{AID}}" />
                    <div class="form-row">
                        <div class="col"><input  required name="Image" type="file"></div>
                        <div class="col"><button type="submit"  name="UploadImage" class="btn btn-primary" >Upload</button></div>
                    </div>-->
                </form>
            </div>
            <div class="row photos" ng-show="Images.length > 0">
                <div class="col-sm-6 col-md-4 col-lg-3 item" ng-repeat="Image in Images" id="IMG{{$index}}">
                    <a data-lightbox="photos" href="assets/img/ads/{{AID}}/{{Image}}">
                        <img class="img-fluid" src="assets/img/ads/{{AID}}/{{Image}}" />
                    </a>
                    <?php
                    if($IsOwner){
                    ?>
                    <button class="btn btn-primary btn-block" ng-click="DeleteImage('../img/ads/'+AID +'/'+Image,$index)" type="button">Delete</button>
                    <?php } ?>
                </div>

            </div>
        </div>
    </div>




    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    <!--<div id="lightboxOverlay" class="lightboxOverlay" style="display: none;"></div>
    <div id="lightbox" class="lightbox" style="display: none;"><div class="lb-outerContainer"><div class="lb-container"><img class="lb-image" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="><div class="lb-nav"><a class="lb-prev" href=""></a><a class="lb-next" href=""></a></div><div class="lb-loader"><a class="lb-cancel"></a></div></div></div><div class="lb-dataContainer"><div class="lb-data"><div class="lb-details"><span class="lb-caption"></span><span class="lb-number"></span></div><div class="lb-closeContainer"><a class="lb-close"></a></div></div></div></div>-->
</body>

</html>