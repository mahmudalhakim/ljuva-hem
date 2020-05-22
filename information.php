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
    $images = htmlspecialchars($row['images']);
    $publication_date = htmlspecialchars($row['publication_date']);
    $published = htmlspecialchars($row['published']);

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
                    "images" => $images,
                    "publication_date" => $publication_date,
                    "published" => $published
                  );
    $ads[] = $ad;
  }

  // Konvertera PHP-arrayen till JSON
  $json = json_encode($ads, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);

  echo $json;  // Skicka JSON till klienten

?>
