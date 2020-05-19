<?php
  session_start();
  require_once 'header.php';

  if (isset($_SESSION['loggedintoljuvahem']) && $_SESSION['loggedintoljuvahem'] == true) {

  echo '<input type="hidden" id="loginStatus" name="loginStatus" value="true">
  <nav class="nav__login">
    <ul>
      <li><a href="../logout-logic.php" id="login"  class="nav__link--sell">Logga ut</a></li>
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
    </form>';
  } else {
    echo '<input type="hidden" id="loginStatus" name="loginStatus" value="false">
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