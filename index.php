<?php
  require_once 'db.php';
  require_once 'header.php';
?>

<section class="hero">
  <form name="search" class="adForm">
    <input type="text" class="form__input" placeholder="Skriv område eller adress" id="inputAddress"><br><br>
      <button class="form__button form__button--active" id="all-btn">Alla typer</button>
      <button class="form__button form__button--choice" id="flat">Lägenheter</button>
      <button class="form__button form__button--choice" id="house">Villor</button>
      <button class="form__button form__button--choice" id="townhouse">Radhus</button>
      <button class="form__button form__button--choice" id="countryhouse">Fritidshus</button>
      <button class="form__button form__button--choice" id="other">Övrigt</button><br><br>
      <div id="more-options">
        <table>
          <thead>
            <th>Minst antal rum</th>
            <th>Boarea</th>
          </thead>
          <tr>
            <td>
              <select name="" id="rooms">
                <option value="0">Alla</option>
              </select>
            </td>
            <td>
              <select name="" id="area">
                <option value="0">Alla</option>
              </select>
            </td>
          </tr>
          <thead>
            <th><br>Högst pris</th>
            <th><br>Högst avgift</th>
          </thead>
          <tr>
            <td>
              <select name="" id="price">
                <option value="10000000">Alla</option>
              </select>
            </td>
            <td>
              <select name="" id="rent">
                <option value="10000000">Alla</option>
              </select>
            </td>
          </tr>
        </table>
      </div>
    <br>
    <!-- <button type="submit" class="form__submit_btn">Hitta bostäder till salu</button> -->
    <button class="form__submit_btn">Hitta bostäder till salu</button>
    <button class="form__reset_btn">Nollställ</button>  
  </form>  
</section>

<section id="picSection"></section> 

<section id="adSection"></section> 

<!-- <script src="js/display_products.js"></script> -->
<script src="js/display-ads.js"></script>
<script src="js/set-up-form.js"></script>

<?php
  require_once 'footer.php';
?>