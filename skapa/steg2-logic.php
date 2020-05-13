<?php
  require_once '../db.php';
  require_once 'header.php';
  if(isset($_GET['id']) && isset($_POST)){
    $id = htmlspecialchars($_GET['id']);
    $tagline = htmlspecialchars($_POST['tagline']);
    $description = htmlspecialchars($_POST['description']);
            
    $sql = "UPDATE `ad` SET `tagline` = $tagline, `description` = $description WHERE `ad`.`ad_id` = $id";
    echo $sql;
    $stmt = $db->prepare($sql);
    $stmt->execute();

    header("Location:steg3.php?id=$id");
  } else {
    echo "Hoppsan, nu blev det nått fel!<br><a href='index.php'>Tillbaka hem</a>";
  } 
?>