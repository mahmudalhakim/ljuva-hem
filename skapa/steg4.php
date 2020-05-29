<?php
  session_start();
  require_once '../db.php';
  require_once 'header.php';

  if (isset($_SESSION['loggedintoljuvahem']) && $_SESSION['loggedintoljuvahem'] == true && isset($_GET['ad_id'])) {
    $ad_id = htmlspecialchars($_GET['ad_id']);

    echo '<input type="hidden" id="loginStatus" name="loginStatus" value="true">
    <nav class="nav__login">
      <ul>
        <li><a href="../logout-logic.php" id="login" class="nav__link--sell">Logga ut</a></li>
      </ul>
    </nav>
    </header>

    <main>
    <section class="section__create">
      <h1>Skapa annons</h1>
      <nav class="create__nav">
        <ul>
          <li class="create__nav--step create__nav--done"><h3>1 - Information</h3></li>
          <li class="create__nav--step create__nav--done"><h3>2 - Beskrivning</h3></li>
          <li class="create__nav--step create__nav--done"><h3>3 - Bilder</h3></li>
          <li class="create__nav--step create__nav--done"><h3>4 - Klart</h3></li>
        </ul>
      </nav>
      <div class="form__sell">
        <h3>4 - Klart</h3>
        <p>Annonsen sparades!</p><br>';

      $sql  = "SELECT * FROM `ljuvahem-ad` WHERE `ad_id` = $ad_id";
      $stmt = $db->prepare($sql);
      $stmt->execute();
  
      $result = false;
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result = true;
        $type = htmlspecialchars($row['type']);
        $rooms = htmlspecialchars($row['rooms']);
        $area = htmlspecialchars($row['area']);
        $price = htmlspecialchars($row['price']);
        $rent = htmlspecialchars($row['rent']);
        $tagline = htmlspecialchars_decode($row['tagline']);
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
          $publishedText = 'Ej publicerad';
        } else {
          $publishedText = 'Publicerad';
        }
  
        $sqlImg  = "SELECT `image_hero` FROM `ljuvahem-images` WHERE `ad_id` = $ad_id";
        $stmtImg = $db->prepare($sqlImg);
        $stmtImg->execute();
        $rowImg = $stmtImg->fetch(PDO::FETCH_ASSOC);
        $image = htmlspecialchars($rowImg['image_hero']);
  
        echo "<div id='$ad_id' class='ad'>
                <div>
                  <img src='../images/$image' alt='image'>
                </div>";
        echo "<div class='product-info'>
            <p>$publishedText</p>
            <p>Typ: $typeText</p>
            <h3>$address, $city</h3>
            <p class=''>$municipality kommun</p>
            <table>
              <td><p>$price kr</p></td>
              <td><p>$rent kr/mån</p></td>
              <td><p>$area m²</p></td>
              <td><p>$rooms rum</p></td>
            </table>
            <p>$tagline</p>
          </div>
        </div>";
      }

      echo '<br><a href="index.php"><button class="form__submit_btn--create">Se mina annonser</button></a>
      </div>';
  } else {
    echo '
    <nav class="nav__login">
      <ul>
        <li><a href="../login.php" id="login" class="nav__link--sell">Logga in</a></li>
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
    
</section>

<?php
  require_once 'footer.php';
?>