<?php 
/**************************************** *
 * update hero image
**************************************** */
require_once '../db.php';

if( isset($_GET['ad_id']) && isset($_GET['image']) ){
  $ad_id = htmlspecialchars($_GET['ad_id']); 
  $image = htmlspecialchars($_GET['image']); 

  $sqlImg = "SELECT * FROM `images` WHERE `ad_id` = $ad_id";
  $stmtImg = $db->prepare($sqlImg);
  $stmtImg->execute();    
  $rowImg = $stmtImg->fetch(PDO::FETCH_ASSOC);
  $imgName = htmlspecialchars($rowImg[$image]);

  $sql = "UPDATE `images` SET 
  `image_hero`= '$imgName'
  WHERE `ad_id` = '$ad_id'";
  $stmt = $db->prepare($sql);
  $stmt->execute();
}

header("Location:ad-edit-images.php?ad_id=$ad_id");

?>