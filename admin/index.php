<?php
  require_once 'header.php';

  if (isset($_SESSION['loggedintoljuvahemadmin']) && $_SESSION['loggedintoljuvahemadmin'] == true) {
    $member_id = htmlspecialchars($_SESSION['member_id']);

    echo '
    <section class="section__create">
        <h1>Alla annonser</h1>';
    
    $sql  = "SELECT * FROM `ljuvahem-ad` ORDER BY `ljuvahem-ad`.`ad_id` DESC";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $result = false;
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $result = true;
      $ad_id = htmlspecialchars($row['ad_id']);
      $member_id = htmlspecialchars($row['member_id']);
      // get user info
      $sqlName  = "SELECT * FROM `ljuvahem-member` WHERE `member_id` = $member_id";
      $stmtName = $db->prepare($sqlName);
      $stmtName->execute();
      $rowName = $stmtName->fetch(PDO::FETCH_ASSOC);
      $name = htmlspecialchars($rowName['firstname'])." ".htmlspecialchars($rowName['surname']);
      // ads info
      $type = htmlspecialchars($row['type']);
      $rooms = htmlspecialchars($row['rooms']);
      $area = htmlspecialchars($row['area']);
      $price = htmlspecialchars($row['price']);
      $address = htmlspecialchars($row['address']);
      $city = htmlspecialchars($row['city']);
      $municipality = htmlspecialchars($row['municipality']);
      $type = htmlspecialchars($row['type']);
      switch ($type) {
        case 'flat':
          $typeText = 'Lägenhet';
          break;
        case 'house':
          $typeText = 'Villa';
          break;
        case 'townhouse':
          $typeText = 'Radhus';
          break;
        case 'countryhouse':
          $typeText = 'Fritidshus';
          break;
        case 'other':
          $typeText = 'Övrigt';
          break;
      }
      $published = htmlspecialchars($row['published']);
      if($published ==  'no'){
        $publishedText = "<a href='publish.php?ad_id=$ad_id&publish=yes'><button class='form__button--active'>Publicera</button></a>";
      } else {
        $publishedText = "<a href='publish.php?ad_id=$ad_id&publish=no'><button class='form__reset_btn'>Avpublicera</button></a>";
      }

      $sqlImg  = "SELECT `image_hero` FROM `ljuvahem-images` WHERE `ljuvahem-images`.`ad_id` LIKE $ad_id";
      $stmtImg = $db->prepare($sqlImg);
      $stmtImg->execute();
      $rowImg = $stmtImg->fetch(PDO::FETCH_ASSOC);
      $image = htmlspecialchars($rowImg['image_hero']);

      echo "<div id='$ad_id' class='ad ad--admin'>
      <div>
        <img src='../images/$image' alt='image'>
      </div>
      <div class='product-info'>
          $publishedText
          <a href='ad-delete.php?ad_id=$ad_id'><button class='ad__button ad__button--delete'>Ta bort</button></a>
          <p><a href='show-all.php?member_id=$member_id'>$member_id - $name</a></p>
          <h3>$address</h3>
          <p class=''>$city, $municipality kommun</p>
          <table>
            <td><p>$price kr</p></td>
            <td><p>$area m²</p></td>
            <td><p>$rooms rum</p></td>
            <td><p>$typeText</p></td>
          </table>
        </div>
      </div>";
      }
      if(!$result){
        echo "<p>Det finns inga annonser att visa</p>";
      }
  } else {
    echo '
    <section class="section__create">
      <h3>Logga in för administrera</h3>
      <a href="login.php"><button class="btn__small nav__link--admin">Logga in</button></a>';
  }
?>
</section>
<?php
  require_once 'footer.php';
?>