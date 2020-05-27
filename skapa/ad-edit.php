<?php
  session_start();
  require_once '../db.php';
  require_once 'header.php';

  if (isset($_SESSION['loggedintoljuvahem']) && $_SESSION['loggedintoljuvahem'] == true) {
    $member_id = htmlspecialchars($_SESSION['member_id']);
    $sqlName  = "SELECT `firstname` FROM `ljuvahem-member` WHERE `member_id` = $member_id";
    $stmtName = $db->prepare($sqlName);
    $stmtName->execute();
    $rowName = $stmtName->fetch(PDO::FETCH_ASSOC);

    echo '
    <nav class="nav__login">
      <ul>
        <li><a href="../logout-logic.php" id="login" class="nav__link--sell">Logga ut</a></li>
      </ul>
    </nav>
    </header>
    <main>
    <section class="section__create">
    <h1>Redigera annons</h1>';
  $ad_id = htmlspecialchars($_GET['ad_id']);
  $sql  = "SELECT * FROM `ljuvahem-ad` WHERE `ad_id` = $ad_id";
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  $rooms = htmlspecialchars($row['rooms']);
  $area = htmlspecialchars($row['area']);
  $price = htmlspecialchars($row['price']);
  $rent = htmlspecialchars($row['rent']);
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
  $tagline = htmlspecialchars($row['tagline']);
  $description = htmlspecialchars($row['description']);

      echo '<div>
      <form action="ad-edit-logic.php?ad_id='.$ad_id.'" class="form__sell" method="post">
        <h3>Redigera beskrivning</h3>
        <label for="type">Bostadstyp</label><br>
        <select class="form__input--create" name="type" id="type">
          <option value="'.$type.'">'.$typeText.'</option>
          <option value="other">Övrigt</option>
          <option value="flat">Lägenhet</option>
          <option value="house">Villa</option>
          <option value="townhouse">Radhus</option>
          <option value="countryhouse">Fritidshus</option>
        </select>
        <br><br>
        <label for="rooms">Antal rum</label><br>
        <input type="text" class="form__input--create" name="rooms" id="rooms" placeholder="Antal rum..." value="'.$rooms.'">
        <br><br>
        <label for="area">Boarea (m²)</label><br>
        <input type="text" class="form__input--create" name="area" id="area" placeholder="Boarea..." value="'.$area.'">
        <br><br>
        <label for="price">Pris (kr)</label><br>
        <input type="number" class="form__input--create" name="price" id="price" placeholder="Pris..." value="'.$price.'">
        <br><br>
        <label for="rent">Avgift (kr/mån)</label><br>
        <input type="number" class="form__input--create" name="rent" id="rent" placeholder="Avgift..." value="'.$rent.'">
        <br><br>
        <label for="address">Gatuadress</label><br>
        <input type="text" class="form__input--create" name="address" placeholder="Gatuadress..." value="'.$address.'" required>
        <br><br>
        <label for="city">Stad</label><br>
        <input type="text" class="form__input--create" name="city" placeholder="Stad..." value="'.$city.'" required>
        <br><br>
        <label for="municipality">Kommun</label><br>
        <select class="form__input--create" name="municipality" id="municipality" required>
          <option value="'.$municipality.'">'.$municipality.'</option>
          <option value="unknown">-- Okänd kommun --</option>
        </select>
        <br><br>
      <label for="tagline">Kort beskrivning (max 300 tecken)</label><br>
      <textarea rows="4" class="form__input--create" name="tagline" id="tagline" placeholder="Kort beskrivning...">'.$tagline.'</textarea>
      <br><br>
      <label for="description">Beskrivning (upp till 1200 tecken)</label><br>
      <textarea rows="12" class="form__input--create" name="description" id="description" placeholder="Beskrivning...">'.$description.'</textarea>
      <br><br><br>
      <button type="submit" class="form__submit_btn--create">Uppdatera</button>
      </form>
    </section>';
  } else {
    echo '
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

<script src="../js/select-municipalities.js"></script>

<?php
  require_once 'footer.php';
?>