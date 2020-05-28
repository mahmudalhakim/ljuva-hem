<?php
require_once '../db.php';

  if( isset($_POST) ){
    $type = htmlspecialchars($_POST['type']);
    $rooms = htmlspecialchars($_POST['rooms']);
    $area = htmlspecialchars($_POST['area']);
    $price = htmlspecialchars($_POST['price']);
    $rent = htmlspecialchars($_POST['rent']);
    $address = htmlspecialchars($_POST['address']);
    $city = htmlspecialchars($_POST['city']);
    $municipality = htmlspecialchars($_POST['municipality']);
    session_start();
    $member_id = htmlspecialchars($_SESSION['member_id']);
            
    $sql  = " INSERT INTO `ljuvahem-ad` (`ad_id`, `member_id`, `type`, `rooms`, `area`, `price`, `rent`, `address`, `city`, `municipality`, `published`) 
              VALUES (NULL, '$member_id', '$type', '$rooms', '$area', '$price', '$rent', '$address', '$city', '$municipality', 'no')";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $sqlId ="SELECT `ad_id` FROM `ljuvahem-ad` ORDER BY ad_id DESC LIMIT 1";
    $stmtId = $db->prepare($sqlId);
    $stmtId->execute();
    $rowId = $stmt->fetch(PDO::FETCH_ASSOC);
    $ad_id = htmlspecialchars($rowId['ad_id']);

    $sqlCreate = "INSERT INTO `ljuvahem-images` (`ad_id`, `image_hero`, `image_1`, `image_2`, `image_3`, `image_4`, `image_5`, `image_6`, `image_7`, `image_8`, `image_9`, `image_10`) 
    VALUES ('$ad_id', 'placeholder.png', '', '', '', '', '', '', '', '', '', '')";
    $stmtCreate = $db->prepare($sqlCreate);
    $stmtCreate->execute();

    header("Location:steg2.php");
  } else {
    echo "Hoppsan, nu blev det nått fel!<br><a href='index.php'>Tillbaka hem</a>";
  }

?>