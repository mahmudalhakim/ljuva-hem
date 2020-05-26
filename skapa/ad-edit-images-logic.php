<?php
/**************************************** *
 * add images to db table 'images' and upload to /images
**************************************** */

require_once '../db.php';
// echo "<pre>";
// print_r($_FILES);
// print_r($_POST);
// echo "</pre>";
if ( isset($_FILES['image']) && isset($_POST['left']) && isset($_POST['ad_id']) ){
  $ad_id = htmlspecialchars($_POST['ad_id']);
  $left = htmlspecialchars($_POST['left']);
  // applicerat från https://www.studentstutorial.com/php/php-multiple-file-upload
  $directory = "../images";/* Path for file upload */

  // making sure theres 10 or less images
  $fileCount = count($_FILES["image"]['name']);
  if($fileCount > $left){
    $fileCount = $left;
  }
  // upload images to images folder and save in db table "images"
  for($i=0; $i < $fileCount; $i++) {    
    $ImageName = str_replace(' ','-',strtolower($_FILES['image']['name'][$i]));
    $ImageType = $_FILES['image']['type'][$i]; /*"image/png", image/jpeg etc.*/
            
    $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
    $ImageExt = str_replace('.','',$ImageExt);
    $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
    $NewImageName = $ad_id.'-'.time().'-'.$i.'.'.$ImageExt;       
    $ret[$NewImageName]= $directory.$NewImageName;
    move_uploaded_file($_FILES["image"]["tmp_name"][$i],$directory."/".$NewImageName );

    // save images names in db on first empty column
    $sqlImages = "SELECT * FROM `images` WHERE `images`.`ad_id` = $ad_id"; 
    $stmtImages = $db->prepare($sqlImages);
    $stmtImages->execute();
    $rowImages = $stmtImages->fetch(PDO::FETCH_ASSOC);
    for( $count = 1; $count <= 10; $count++){
      $image = 'image_'.$count;
      if(htmlspecialchars($rowImages["$image"]) == ''){
        break;
      } 
    }

    $sql = "UPDATE `images` SET `$image` = '$NewImageName' WHERE `images`.`ad_id` = $ad_id"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
  }
  
  header("Location:ad-edit-images.php?ad_id=$ad_id");
} else {
  header("Location:ad-edit-images-fail.php");
}

?>