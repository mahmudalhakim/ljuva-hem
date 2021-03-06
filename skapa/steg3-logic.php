<?php
/**************************************** *
 * add images to db table 'images' and upload to /images
**************************************** */

require_once '../db.php';

if (isset($_GET['ad_id'])){
  $ad_id = htmlspecialchars($_GET['ad_id']);

  // applicerat från https://www.studentstutorial.com/php/php-multiple-file-upload
  $directory = "../images";/* Path for file upload */
  // making sure theres 10 or less images
  $fileCount = count($_FILES["image"]['name']);
  if($fileCount > 10){
    $fileCount = 10;
  }
  // if no image, upload placeholder else upload selected images
  if(!$_FILES["image"]['name'][0]){
    $sql = "UPDATE `ljuvahem-images` SET `image_hero` = 'placeholder.png' WHERE `ljuvahem-images`.`ad_id` = $ad_id"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
  } else {
    // upload images to images folder and save in db table "images"
    for($i=0; $i < $fileCount; $i++) {    
      $ImageName      = str_replace(' ','-',strtolower($_FILES['image']['name'][$i]));
      $ImageType      = $_FILES['image']['type'][$i];
            
      $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
      $ImageExt       = str_replace('.','',$ImageExt);
      $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
      $NewImageName = $ad_id.'-'.time().'-'.$i.'.'.$ImageExt;
                
      $ret[$NewImageName]= $directory.$NewImageName;
      // upload image       
      move_uploaded_file($_FILES["image"]["tmp_name"][$i],$directory."/".$NewImageName );

      // save images names in db
      $imageNumber = "image_".(1+$i);
      $sql = "UPDATE `ljuvahem-images` SET `$imageNumber` = '$NewImageName' WHERE `ljuvahem-images`.`ad_id` = $ad_id"; 
      $stmt = $db->prepare($sql);
      $stmt->execute();
      // set first image to be hero image
      if($i == 0){
        $sql = "UPDATE `ljuvahem-images` SET `image_hero` = '$NewImageName' WHERE `ljuvahem-images`.`ad_id` = $ad_id"; 
        $stmt = $db->prepare($sql);
        $stmt->execute();
      }
    }
  }
  header("Location:steg4.php?ad_id=$ad_id");
} else {
  header("Location:ad-edit-images-fail.php");
}

?>