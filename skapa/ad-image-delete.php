<?php 
/**************************************** *
 * delete image
**************************************** */
require_once '../db.php';

if( isset($_GET['ad_id']) && isset($_GET['image']) ){
  $ad_id = htmlspecialchars($_GET['ad_id']); 
  $image = htmlspecialchars($_GET['image']); 

  $sqlImg  = "UPDATE `ljuvahem-images` SET `$image` = '' WHERE `ljuvahem-images`.`ad_id` = $ad_id"; 
  $stmtImg = $db->prepare($sqlImg);
  $stmtImg->execute();
}

header("Location:ad-edit-images.php?ad_id=$ad_id");

?>