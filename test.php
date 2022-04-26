
<?php
session_start();

print_r($_POST);

//if (isset($_POST["fileToUpload"])) 
{

    $AID=$_POST["AID"];
    $File = $_FILES["fileToUpload"];
    $file_name = $_FILES['fileToUpload']['name'];
    $file_size =$_FILES['fileToUpload']['size'];
    $file_tmp =$_FILES['fileToUpload']['tmp_name'];
    $file_type=$_FILES['fileToUpload']['type'];
    $file_ext="";;
    if($file_name){
        $target_file = "assets/img/ads/".$AID."/" .uniqid() .".jpg";
        move_uploaded_file($file_tmp,$target_file);
        header("location: adinfo.php?AID=".$AID);
    }
}


?>







<form method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload" >
  <input type="submit" value="Upload Image" name="submit">
</form>