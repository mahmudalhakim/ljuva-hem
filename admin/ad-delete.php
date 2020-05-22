<?php 
/**************************************** *
 * delete ad
**************************************** */
require_once '../db.php';

if(isset($_GET['ad_id'])){
  $ad_id = htmlspecialchars($_GET['ad_id']); 

  $sql  = "DELETE FROM ad WHERE ad_id = $ad_id";
  $stmt = $db->prepare($sql);
  $stmt->execute();
}

header('Location:index.php');

?>