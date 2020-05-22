<?php
/**************************************** *
 * update publish status in db
**************************************** */
include_once '../db.php';

$ad_id = htmlentities($_GET['ad_id']);
$publish = htmlentities($_GET['publish']);
print_r($_GET);
if($publish == "yes"){
  $sql = "UPDATE ad SET 
  published = '$publish', 
  publication_date = CURRENT_TIMESTAMP
  WHERE ad_id = $ad_id";
} else {
  $sql = "UPDATE ad SET 
  published = '$publish'
  WHERE ad_id = $ad_id";
}
echo "<br>".$sql;
$stmt = $db->prepare($sql);
$stmt->execute();

header('Location: index.php');