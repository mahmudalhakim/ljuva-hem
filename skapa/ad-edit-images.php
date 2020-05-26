<?php
  session_start();
  require_once '../db.php';
  require_once 'header.php';

  if (isset($_SESSION['loggedintoljuvahem']) && $_SESSION['loggedintoljuvahem'] == true) {

    $ad_id = htmlspecialchars($_GET['ad_id']);
    $sql  = "SELECT * FROM `images` WHERE `ad_id` = $ad_id";
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

    $image_0 = htmlspecialchars($row['image_hero']);
    $image_1 = htmlspecialchars($row['image_1']);
    $image_2 = htmlspecialchars($row['image_2']);
    $image_3 = htmlspecialchars($row['image_3']);
    $image_4 = htmlspecialchars($row['image_4']);
    $image_5 = htmlspecialchars($row['image_5']);
    $image_6 = htmlspecialchars($row['image_6']);
    $image_7 = htmlspecialchars($row['image_7']);
    $image_8 = htmlspecialchars($row['image_8']);
    $image_9 = htmlspecialchars($row['image_9']);
    $image_10 = htmlspecialchars($row['image_10']);
    $heroAddress = $image_0;

    $numberOfImages = 0;
    for ($i=0; $i < count($row)-1; $i++){
      if($i == 0){
        $image = "image_hero";
        $numberOfImages++;
        echo "<p>Primärbild</p>";
        echo '<img src="../images/'.htmlspecialchars($row[$image]).'" 
        alt="'.$ad_id.'-'.$i.'" 
        class="adImg adImg--hero"><br><br><br>';
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
    echo $numberOfImages."<br>";
    echo '</section>';

  } else {
    echo '<input type="hidden" id="loginStatus" name="loginStatus" value="false">
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