<?php
  require_once 'header.php';
?>

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
    <form action="steg1-logic.php" class="form__sell" method="post">
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
      <select class="form__input--create" name="rooms" id="rooms">
        <option value="0">0</option>
      </select>
      <br><br>
      <label for="area">Boarea (m²)</label><br>
      <input type="text" class="form__input--create" name="area" id="area" placeholder="Boarea...">
      <br><br>
      <label for="price">Pris (kr)</label><br>
      <input type="number" class="form__input--create" name="price" id="price" placeholder="Pris...">
      <br><br>
      <label for="address">Gatuadress</label><br>
      <input type="text" class="form__input--create" name="address" placeholder="Gatuadress...">
      <br><br>
      <label for="city">Stad</label><br>
      <input type="text" class="form__input--create" name="city" placeholder="Stad...">
      <br><br>
      <label for="municipality">Kommun</label><br>
      <select class="form__input--create" name="municipality" id="municipality">
        <option value="unknown">Kommun</option>
      </select>
      <br><br><br>
      <button type="submit" class="form__submit_btn--create">Till steg - 2</button>
    </form>
</section>

<script src="../js/form_products.js"></script>
<script src="../js/select-municipalities.js"></script>

<?php
  require_once 'footer.php';
?>