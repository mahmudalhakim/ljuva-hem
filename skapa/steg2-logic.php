<?php
  require_once '../db.php';
  if(isset($_GET['ad_id']) && isset($_POST)){
    $ad_id = htmlspecialchars($_GET['ad_id']);
    $tagline = htmlspecialchars($_POST['tagline']);
    $description = htmlspecialchars($_POST['description']);
            
    $sql = "UPDATE `ad` SET `tagline` = '$tagline', `description` = '$description' WHERE `ad`.`ad_id` = $ad_id"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();

    header("Location:steg3.php?id=$ad_id");
  } else {
    echo "Hoppsan, nu blev det nått fel!<br><a href='index.php'>Tillbaka hem</a>";
  } 
?>