<?php
  session_start();
  require_once 'header.php';

  if (isset($_SESSION['loggedintoljuvahem']) && $_SESSION['loggedintoljuvahem'] == true) {

  echo '
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
      <p>Annonsen sparades!</p><br>
      <a href="index.php"><button class="form__submit_btn--create">Se mina annonser</button></a>
    </div>';
  } else {
    echo "
    <section class='section__create'><h3>Logga in för att se dina annonser</h3>
    <a href='../login.php'><button class='btn__small'>Logga in</button></a>";
  }
?>
    
</section>

<script src="../js/form_products.js"></script>

<?php
  require_once 'footer.php';
?>