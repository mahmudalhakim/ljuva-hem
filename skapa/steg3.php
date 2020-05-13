<?php
  require_once 'header.php';
?>

<section class="section__create">
  <h1>Skapa annons</h1>
  <nav class="create__nav">
    <ul>
      <li class="create__nav--step create__nav--done"><h3>1 - Information</h3></li>
      <li class="create__nav--step create__nav--done"><h3>2 - Beskrivning</h3></li>
      <li class="create__nav--step create__nav--done"><h3>3 - Bilder</h3></li>
      <li class="create__nav--step"><h3>4 - Klart</h3></li>
    </ul>
  </nav>
  <form action="image-upload.php" class="form__sell">
    <h3>3 - Bilder</h3>
    <label for="img">Välj en bild:</label><br>
    <input type="file" id="img" name="img" accept="image/*">
    <br>
    <button>Lägg till bild</button>
    <br><br>
    <button type="submit" class="form__submit_btn--create">Till steg - 4</button>
  </form>
    
</section>
<script src="../js/form_products.js"></script>

<?php
  require_once 'footer.php';
?>