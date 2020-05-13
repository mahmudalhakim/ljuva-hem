<?php
  require_once '../db.php';
  require_once 'header.php';
  
  $sql ="SELECT * FROM ad ORDER BY ad_id DESC LIMIT 1";
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  $id = htmlspecialchars($row['ad_id']);
  $type = htmlspecialchars($row['type']);
  $rooms = htmlspecialchars($row['rooms']);
  $area = htmlspecialchars($row['area']);
  $price = htmlspecialchars($row['price']);
  $address = htmlspecialchars($row['address']);
  $city = htmlspecialchars($row['city']);
  $municipality = htmlspecialchars($row['municipality']);

?>

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
  <form action="steg2-logic.php?id=<?php echo $id; ?>" class="form__sell" method="post">
    <h3>2 - Beskrivning</h3>
    <h4 class="create__nav--step"><?php echo "$address, $city"; ?></h4>
    <label for="tagline">Kort beskrivning (max 300 tecken)</label><br>
    <textarea rows="4" class="form__input--create" name="tagline" id="tagline" placeholder="Kort beskrivning..."></textarea>
    <br><br>
    <label for="description">Beskrivning (upp till 1200 tecken)</label><br>
    <textarea rows="12" class="form__input--create" name="description" id="description" placeholder="Beskrivning..."></textarea>
    <br><br><br>
    <button type="submit" class="form__submit_btn--create">Till steg - 3</button>
  </form>
    
</section>
<script src="../js/form_products.js"></script>

<?php
  require_once 'footer.php';
?>