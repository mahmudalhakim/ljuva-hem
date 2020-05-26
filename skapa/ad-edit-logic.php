<?php
  require_once '../db.php';
  if(isset($_GET['ad_id']) && isset($_POST)){
    $ad_id = htmlspecialchars($_GET['ad_id']);
    $rooms = htmlspecialchars($_POST['rooms']);
    $area = htmlspecialchars($_POST['area']);
    $price = htmlspecialchars($_POST['price']);
    $rent = htmlspecialchars($_POST['rent']);
    $address = htmlspecialchars($_POST['address']);
    $city = htmlspecialchars($_POST['city']);
    $municipality = htmlspecialchars($_POST['municipality']);
    $type = htmlspecialchars($_POST['type']);
    $tagline = htmlspecialchars($_POST['tagline']);
    $description = htmlspecialchars($_POST['description']);
            
    $sql = "UPDATE `ad` SET 
    `type`= '$type',
    `rooms`= '$rooms',
    `area`= '$area',
    `price`= '$price',
    `rent`= '$rent',
    `address`= '$address',
    `city`= '$city',
    `municipality`= '$municipality',
    `tagline`= '$tagline',
    `description`= '$description'
    WHERE `ad_id` = '$ad_id'";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    header("Location:index.php");
  } else {
    echo "Hoppsan, nu blev det nått fel!<br><a href='index.php'>Tillbaka hem</a>";
  } 
?>