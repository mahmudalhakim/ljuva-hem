<?php
  session_start();
  require_once 'header.php';

  if (isset($_SESSION['loggedintoljuvahem']) && $_SESSION['loggedintoljuvahem'] == true) {

  echo '
    <section class="section__create">
      <h1>Hantera annonser</h1>
      <h3>Skapa annons</h3>
      <a href="steg1.php"><button class="btn__small">Skapa annons</button></a>
      <h3>Publicerade annonser</h3>
    </section>';
  } else {
    echo '
    <section class="section__create">
      <h3>Logga in för att se dina annonser</h3>
      <a href="login.php"><button class="btn__small">Logga in</button></a>
    </section>';
  }
?>

<script src="../js/form_products.js"></script>

<?php
  require_once 'footer.php';
?>