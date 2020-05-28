<?php
  require_once '../db.php';
  if(isset($_POST['ad_id']) && isset($_POST)){
    $ad_id = htmlspecialchars($_POST['ad_id']);
    $tagline = htmlspecialchars($_POST['tagline']);
    $description = htmlspecialchars($_POST['description']);
            
    $sql = "UPDATE `ljuvahem-ad` SET `tagline` = '$tagline', `description` = '$description' WHERE `ljuvahem-ad`.`ad_id` = $ad_id"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();

    header("Location:steg3.php?ad_id=$ad_id");
  } else {
    header("Location:index.php");
  } 
?>