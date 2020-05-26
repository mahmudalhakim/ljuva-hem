<?php
  session_start();
  require_once '../db.php';
  require_once 'header.php';

  if (isset($_SESSION['loggedintoljuvahem']) && $_SESSION['loggedintoljuvahem'] == true )  {
    echo '
    <nav class="nav__login">
      <ul>
        <li><a href="../logout-logic.php" id="login" class="nav__link--sell">Logga ut</a></li>
      </ul>
    </nav>
    </header>
    <main>
    <section class="section__create">
    <h1>Tyvärr, något blev fel vid uppladdningen...</h1>
    <a href="index.php" id="login" class="form__submit_btn--create">Tillbaka till annonser</a>
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

<?php
  require_once 'footer.php';
?>