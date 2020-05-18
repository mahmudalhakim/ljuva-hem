<?php
  require_once 'db.php';
  require_once 'header.php';

?>

<section class="section__create">
  <h1>Logga in</h1>
  <form action="login-logic.php" name="login" method="post">
    <label for="email">E-mail</label><br>
    <input type="text" name="email" class="form__input" placeholder="E-mail..." required>
    <br><br>
    <label for="password">Lösenord</label><br>
    <input type="password" name="password" class="form__input" placeholder="Lösenord..." required>
    <br><br>
    <button type="submit" class="form__submit_btn">Logga in</button>
  </form>  
  <form action="register.php">
    <a href="register.php"><button class="form__reset_btn">Bli medlem</button></a>
  </form>
</section>

<?php
  require_once 'footer.php';
?>