<?php
require_once 'db.php';
  header("Content-Type: application/json; charset=UTF-8");  // ange att innehållet är json
/**************************************** *
 * read info from db & display ads
 * different sql-ads depending on which link pushed
**************************************** */

  $sql = "SELECT * FROM ad";
  $stmt = $db->prepare($sql);
  $stmt->execute();

  // loopar över arrayen som har resultatet från db
  while (  $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {

    $ad_id = htmlspecialchars($row['ad_id']);
    $member_id = htmlspecialchars($row['member_id']);
    $type = htmlspecialchars($row['type']);
    $rooms = htmlspecialchars($row['rooms']);
    $area = htmlspecialchars($row['area']);
    $price = htmlspecialchars($row['price']);
    $rent = htmlspecialchars($row['rent']);
    $address = htmlspecialchars($row['address']);
    $city = htmlspecialchars($row['city']);
    $municipality = htmlspecialchars($row['municipality']);
    $tagline = htmlspecialchars($row['tagline']);
    $description = htmlspecialchars($row['description']);
    $publication_date = htmlspecialchars($row['publication_date']);
    $published = htmlspecialchars($row['published']);

    $sqlImg = "SELECT * FROM images WHERE `ad_id` = $ad_id";
    $stmtImg = $db->prepare($sqlImg);
    $stmtImg->execute();
    $rowImg = $stmtImg->fetch(PDO::FETCH_ASSOC);
    $image_hero = htmlspecialchars($rowImg['image_hero']);

    $ad = array(
                    "ad_id" => $ad_id,
                    "member_id" => $member_id,
                    "type" => $type,
                    "rooms" => $rooms,
                    "area" => $area,
                    "price" => $price,
                    "rent" => $rent,
                    "address" => $address,
                    "city" => $city,
                    "municipality" => $municipality,
                    "tagline" => $tagline,
                    "description" => $description,
                    "image_hero" => $image_hero,
                    "publication_date" => $publication_date,
                    "published" => $published
                  );
    $ads[] = $ad;
  }

  // Konvertera PHP-arrayen till JSON
  $json = json_encode($ads, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);

  echo $json;  // Skicka JSON till klienten

?>
