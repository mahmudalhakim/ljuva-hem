<?php
  session_start();
  require_once '../db.php';
  require_once 'header.php';

  if (isset($_SESSION['loggedintoljuvahem']) && $_SESSION['loggedintoljuvahem'] == true) {
    $member_id = htmlspecialchars($_SESSION['member_id']);

    echo '<input type="hidden" id="loginStatus" name="loginStatus" value="true">

    <nav class="nav__login">
      <ul>
        <li><a href="../logout-logic.php" id="login" class="nav__link--sell">Logga ut</a></li>
      </ul>
    </nav>
    </header>

    <main>

      <section class="section__create">
        <h1>Hantera annonser</h1>
        <a href="steg1.php"><button class="ad__button ad__button--active">Skapa ny annons</button></a>
        <h2>Mina annonser</h2>';
    
    $sql  = "SELECT * FROM `ad` WHERE `member_id` = $member_id ORDER BY `ad`.`ad_id` DESC";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $result = false;
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $result = true;

      $ad_id = htmlspecialchars($row['ad_id']);
      $type = htmlspecialchars($row['type']);
      $rooms = htmlspecialchars($row['rooms']);
      $area = htmlspecialchars($row['area']);
      $price = htmlspecialchars($row['price']);
      $address = htmlspecialchars($row['address']);
      $city = htmlspecialchars($row['city']);
      $municipality = htmlspecialchars($row['municipality']);
      $image = htmlspecialchars($row['images']);
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
        $publishedText = 'Väntar på godkännande';
      } else {
        $publishedText = 'Publicerad';
      }

      echo "<div id='$ad_id' class='ad'>

      <div>
        <img src='../images/$image' alt='image'>
      </div>";
      echo "<div class='product-info'>
          <a href='ad-delete.php?ad_id=$ad_id'><button class='ad__button ad__button--active'>Ta bort</button></a>
          <p>$publishedText</p>
          <h3>$address, $city</h3>
          <p class=''>$municipality kommun</p>
          <table>
            <td><p>$price kr</p></td>
            <td><p>$area m²</p></td>
            <td><p>$rooms rum</p></td>
            <td><p>$typeText</p></td>
          </table>
        </div>
      </div>";
      // echo "
      // <table id='$ad_id'>
      //   <tr>
      //     <td><p>$address</p></td>
      //     <td><p>$city</p></td>
      //     <td><p>$municipality</p></td>
      //     <td><p>$area m²</p></td>
      //     <td><p>$rooms rum</p></td>
      //     <td><p>$price kr</p></td>
      //     <td><p>$price kr</p></td>
      //   </tr>
      // </table>";
      }
      if(!$result){
        echo "<p>Det finns inga annonser att visa</p>";
      }

    echo  '</section>';
  } else {
    echo '<input type="hidden" id="loginStatus" name="loginStatus" value="false">
    <nav class="nav__login">
      <ul>
        <li><a href="../login.php" id="login">Logga in</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section class="section__create">
      <h3>Logga in för att se dina annonser</h3>
      <a href="../login.php"><button class="btn__small">Logga in</button></a>
    </section>';
  }
?>

<?php
  require_once 'footer.php';
?>