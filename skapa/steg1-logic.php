<?php
require_once '../db.php';

  if( isset($_POST) ){
    $type = htmlspecialchars($_POST['type']);
    $rooms = htmlspecialchars($_POST['rooms']);
    $area = htmlspecialchars($_POST['area']);
    $price = htmlspecialchars($_POST['price']);
    $address = htmlspecialchars($_POST['address']);
    $city = htmlspecialchars($_POST['city']);
    $municipality = htmlspecialchars($_POST['municipality']);
    session_start();
    $member_id = htmlspecialchars($_SESSION['member_id']);
            
    $sql  = " INSERT INTO `ad` (`ad_id`, `member_id`, `type`, `rooms`, `area`, `price`, `address`, `city`, `municipality`, `publicated`) 
              VALUES (NULL, '$member_id', '$type', '$rooms', '$area', '$price', '$address', '$city', '$municipality', 'no')";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    header("Location:steg2.php");
  } else {
    echo "Hoppsan, nu blev det nått fel!<br><a href='index.php'>Tillbaka hem</a>";
  }

?>