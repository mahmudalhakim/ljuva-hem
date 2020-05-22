<?php
  require_once 'header.php';
?>

<section class="section__create">

  <h1>Logga in</h1>

  <form action="login-logic.php" name="login" method="post" onsubmit="return validateForm()" class="form--admin">

    <label for="email">E-mail</label><br>
    <input type="text" name="email" class="form__input form__input--admin" placeholder="E-mail..." required>
    <p id="emailFeedback" class="form__feedback"></p>

    <label for="password">Lösenord</label><br>
    <input type="password" name="password" class="form__input form__input--admin" placeholder="Lösenord..." required>
    <p id="passwordFeedback" class="form__feedback"></p>

    <button type="submit" class="form__submit_btn form__submit_btn--admin">Logga in</button>

  </form>

</section>

<script src="../js/validate-login.js"></script>

<?php
  require_once 'footer.php';
?>