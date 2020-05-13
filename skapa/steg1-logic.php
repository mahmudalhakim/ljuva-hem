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
            
    $sql  = " INSERT INTO `ad` (`ad_id`, `type`, `rooms`, `area`, `price`, `address`, `city`, `municipality`) 
              VALUES (NULL, '$type', '$rooms', '$area', '$price', '$address', '$city', '$municipality')";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    // loopar över arrayen som har resultatet från db
    // while($rowLast = $stmt->fetch(PDO::FETCH_ASSOC)) {
    // }

    header("Location:steg2.php");
  } else {
    echo "Hoppsan, nu blev det nått fel!<br><a href='index.php'>Tillbaka hem</a>";
  }

?>