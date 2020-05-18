<?php
  require_once 'db.php';
  require_once 'header.php';

?>
  

  <section class="section__create">
    <h1>Registrering</h1>
    <form action="register-confirm.php" name="search" method="post">
      <label for="firstname">Förnamn</label><br>
      <input type="text" name="firstname" class="form__input" placeholder="Förnamn..." required>
      <br><br>
      <label for="surname">Efternamn</label><br>
      <input type="text" name="surname" class="form__input" placeholder="Efternamn..." required>
      <br><br>
      <label for="email">E-mail</label><br>
      <input type="text" name="email" class="form__input" placeholder="E-mail..." required>
      <br><br>
      <label for="password">Lösenord</label><br>
      <input type="password" name="password" class="form__input" placeholder="Lösenord..." required>
      <br><br>
      <label for="password2">Upprepa lösenord</label><br>
      <input type="password" name="password2" class="form__input" placeholder="Upprepa lösenord..." required>
      <br><br>
      <button type="submit" class="form__submit_btn">Bli medlem</button>
    </form>  
</section>


<?php
  require_once 'footer.php';
?>