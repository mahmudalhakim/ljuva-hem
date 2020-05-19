<?php
  require_once '../db.php';
  session_start();
  require_once 'header.php';

  if (isset($_SESSION['loggedintoljuvahem']) && $_SESSION['loggedintoljuvahem'] == true) {

  $sql ="SELECT * FROM ad ORDER BY ad_id DESC LIMIT 1";
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  $ad_id = htmlspecialchars($row['ad_id']);
  $type = htmlspecialchars($row['type']);
  $rooms = htmlspecialchars($row['rooms']);
  $area = htmlspecialchars($row['area']);
  $price = htmlspecialchars($row['price']);
  $address = htmlspecialchars($row['address']);
  $city = htmlspecialchars($row['city']);
  $municipality = htmlspecialchars($row['municipality']);

  echo '<input type="hidden" id="loginStatus" name="loginStatus" value="true">
  <nav class="nav__login">
    <ul>
      <li><a href="../logout-logic.php" id="login">Logga ut</a></li>
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
        <li class="create__nav--step"><h3>3 - Bilder</h3></li>
        <li class="create__nav--step"><h3>4 - Klart</h3></li>
      </ul>
    </nav>
    <form action="steg2-logic.php?ad_id='.$ad_id.'" class="form__sell" method="post">
      <h3>2 - Beskrivning</h3>
      <h4 class="create__nav--step">'.$address.', '.$city.'</h4>
      <label for="tagline">Kort beskrivning (max 300 tecken)</label><br>
      <textarea rows="4" class="form__input--create" name="tagline" id="tagline" placeholder="Kort beskrivning..."></textarea>
      <br><br>
      <label for="description">Beskrivning (upp till 1200 tecken)</label><br>
      <textarea rows="12" class="form__input--create" name="description" id="description" placeholder="Beskrivning..."></textarea>
      <br><br><br>
      <button type="submit" class="form__submit_btn--create">Till steg - 3</button>
    </form>
  </section>';
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
  
  require_once 'footer.php';
?>