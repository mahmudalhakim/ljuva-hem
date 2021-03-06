<?php
  require_once '../db.php';
  session_start();
  require_once 'header.php';

  if (isset($_SESSION['loggedintoljuvahem']) && $_SESSION['loggedintoljuvahem'] == true) {
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
        <li class="create__nav--step"><h3>2 - Beskrivning</h3></li>
        <li class="create__nav--step"><h3>3 - Bilder</h3></li>
        <li class="create__nav--step"><h3>4 - Klart</h3></li>
      </ul>
    </nav>
      <form action="steg1-logic.php" name="formCreate" class="form__sell" method="post" onsubmit="return validateForm()">
        <h3>1 - Information om bostad</h3>

        <label for="type">Bostadstyp</label><br>
        <select class="form__input--create" name="type" id="type">
          <option value="other">Övrigt</option>
          <option value="flat">Lägenhet</option>
          <option value="house">Villa</option>
          <option value="townhouse">Radhus</option>
          <option value="countryhouse">Fritidshus</option>
        </select><br><br>

        <label for="rooms">Antal rum</label><br>
        <input type="number" class="form__input--create" name="rooms" id="rooms" placeholder="Antal rum..." required>
        <p id="roomsFeedback" class="form__feedback"></p>

        <label for="area">Boarea (m²)</label><br>
        <input type="number" class="form__input--create" name="area" id="area" placeholder="Boarea..." required>
        <p id="areaFeedback" class="form__feedback"></p>

        <label for="price">Pris (kr)</label><br>
        <input type="number" class="form__input--create" name="price" id="price" placeholder="Pris..." required>
        <p id="priceFeedback" class="form__feedback"></p>

        <label for="rent">Avgift (kr/mån)</label><br>
        <input type="number" class="form__input--create" name="rent" id="rent" placeholder="Avgift..." required>
        <p id="rentFeedback" class="form__feedback"></p>

        <label for="address">Gatuadress</label><br>
        <input type="text" class="form__input--create" name="address" placeholder="Gatuadress..." required>
        <p id="addressFeedback" class="form__feedback"></p>

        <label for="city">Stad</label><br>
        <input type="text" class="form__input--create" name="city" placeholder="Stad..." required>
        <p id="cityFeedback" class="form__feedback"></p>

        <label for="municipality">Kommun</label><br>
        <select class="form__input--create" name="municipality" id="municipality" required>
          <option value="unknown">Kommun</option>
        </select>
        <p id="municipalityFeedback" class="form__feedback"></p>

        <br>
        <button type="submit" class="form__submit_btn--create">Till steg - 2</button>
      </form>';
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

<script src="../js/set-up-form.js"></script>
<script src="../js/select-municipalities.js"></script>
<script src="../js/validate-info.js"></script>

<?php
  require_once 'footer.php';
?>