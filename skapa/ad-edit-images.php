<?php
  session_start();
  require_once '../db.php';
  require_once 'header.php';

  if (isset($_SESSION['loggedintoljuvahem']) && $_SESSION['loggedintoljuvahem'] == true) {

    $ad_id = htmlspecialchars($_GET['ad_id']);
    $sql  = "SELECT * FROM `ljuvahem-images` WHERE `ad_id` = $ad_id";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    echo '
    <nav class="nav__login">
      <ul>
        <li><a href="../logout-logic.php" id="login" class="nav__link--sell">Logga ut</a></li>
      </ul>
    </nav>
    </header>
    <main>
    <section class="section__create">
    <h1>Redigera bilder</h1>';

    $heroAddress = htmlspecialchars($row['image_hero']);

    $numberOfImages = 0;
    for ($i=0; $i < count($row)-1; $i++){
      if($i == 0){
        $image = "image_hero";
        $numberOfImages++;
        echo '<img src="../images/'.htmlspecialchars($row[$image]).'" 
        alt="'.$ad_id.'-'.$i.'" 
        class="adImg adImg--hero">';
        echo "<p>Byt till annan primärbild för att ta bort</p><br><br>";
      } else {
        $image = 'image_'.$i;
         if( strlen($row[$image]) > 0 && htmlspecialchars($row[$image]) != $heroAddress ){
          $numberOfImages++;
          echo '<img src="../images/'.htmlspecialchars($row[$image]).'" 
          alt="'.$ad_id.'-'.$i.'" 
          class="adImg"><br>';
          echo "
          <a href='ad-image-delete.php?ad_id=$ad_id&image=$image'>
            <button class='ad__button ad__button--active'>Ta bort</button>
          </a>
          <a href='ad-image-hero.php?ad_id=$ad_id&image=$image'>
            <button class='ad__button ad__button--active'>Sätt som primär</button>
          </a>
          <br><br><br>";
        } 
      }
    }
    if($numberOfImages < 10){
      $left = 10 - $numberOfImages;
      echo '<form action="ad-edit-images-logic.php" enctype="multipart/form-data" method="post" class="form__sell">
        <h3>Lägg till bilder</h3>
        <p>Antal bilder: '.$numberOfImages.'/10</p>
        <input type="hidden" id="ad_id" name="ad_id" value="'.$ad_id.'"> 
        <input type="hidden" id="left" name="left" value="'.$left.'"> 
        <input type="file" id="image" name="image[]" id="fileToUpload" multiple>
        <br><br>
        <button type="submit" class="form__submit_btn--create">Lägg till</button>
      </form>';
    } else {
      echo "<p>Annonsen har max antal bilder</p>";
    }
    echo '</section>';

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