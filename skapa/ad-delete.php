<?php 
/**************************************** *
 * delete ad
**************************************** */
require_once '../db.php';

if(isset($_GET['ad_id'])){
  $ad_id = htmlspecialchars($_GET['ad_id']); 

  $sqlImg  = "DELETE FROM `ljuvahem-images` WHERE ad_id = $ad_id";
  $stmtImg = $db->prepare($sqlImg);
  $stmtImg->execute();
  
  $sql  = "DELETE FROM ad WHERE ad_id = $ad_id";
  $stmt = $db->prepare($sql);
  $stmt->execute();

}

header('Location:index.php');

?>