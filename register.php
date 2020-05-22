<?php
  require_once 'db.php';
  require_once 'header.php';

?>
  
  <section class="section__create">
    <h1>Registrering</h1>
    <form action="register-confirm.php" name="register" method="post" onsubmit="return validateForm()" >
      <label for="firstname">Förnamn</label><br>
      <input type="text" name="firstname" class="form__input" placeholder="Förnamn..." required>
      <p id="firstnameFeedback" class="form__feedback"></p>

      <label for="surname">Efternamn</label><br>
      <input type="text" name="surname" class="form__input" placeholder="Efternamn..." required>
      <p id="surnameFeedback" class="form__feedback"></p>

      <label for="email">E-mail</label><br>
      <input type="text" name="email" class="form__input" placeholder="E-mail..." required>
      <p id="emailFeedback" class="form__feedback"></p>

      <label for="password">Lösenord</label><br>
      <input type="password" name="password" class="form__input" placeholder="Lösenord..." required>
      <p id="passwordFeedback" class="form__feedback"></p>

      <label for="password2">Upprepa lösenord</label><br>
      <input type="password" name="password2" class="form__input" placeholder="Upprepa lösenord..." required>
      <p id="password2Feedback" class="form__feedback"></p>
      <br>
      <button type="submit" class="form__submit_btn">Bli medlem</button>
    </form>  
  </section>

<script src="js/validate-register.js"></script>

<?php
  require_once 'footer.php';
?>