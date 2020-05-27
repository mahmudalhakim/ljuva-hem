<?php
  session_start();
  require_once '../db.php';
  require_once 'header.php';
  
  if (isset($_SESSION['loggedintoljuvahem']) && $_SESSION['loggedintoljuvahem'] == true) {
      echo '
      <nav class="nav__login">
        <ul>
          <li><a href="../logout-logic.php" id="login"  class="nav__link--sell">Logga ut</a></li>
        </ul>
      </nav>
      </header>
  
      <main>
      <section class="section__create">';

    if(isset($_GET["ad_id"])){
      $ad_id = htmlspecialchars($_GET["ad_id"]);
      $member_id = "placeholder";
      $sql = "SELECT `member_id` FROM `ljuvahem-ad` WHERE `ljuvahem-ad`.`ad_id` = $ad_id"; 
      $stmt = $db->prepare($sql);
      $stmt->execute();
      // check that it's the right member that is trying to access ad
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $member_id = htmlspecialchars($row['member_id']);
      }
      $member_id_session = htmlspecialchars($_SESSION['member_id']);
      // print ad if info is correct otherwise show erroe message
      if ($member_id == $member_id_session) {
        echo '<h1>Skapa annons</h1>
          <nav class="create__nav">
            <ul>
              <li class="create__nav--step create__nav--done"><h3>1 - Information</h3></li>
              <li class="create__nav--step create__nav--done"><h3>2 - Beskrivning</h3></li>
              <li class="create__nav--step create__nav--done"><h3>3 - Bilder</h3></li>
              <li class="create__nav--step"><h3>4 - Klart</h3></li>
            </ul>
          </nav>
          <form action="steg3-logic.php?id='.$ad_id.'" enctype="multipart/form-data" method="post" class="form__sell">
            <h3>3 - Bilder</h3>
            <label for="img">Välj bilder:</label><br>
            <input type="file" id="image" name="image[]" id="fileToUpload" multiple>
            <br><br>
            <button type="submit" class="form__submit_btn--create">Spara - Till steg - 4</button>
          </form>';
      } else {
        echo '<h3>Tyvärr, det blev något fel</h3>';
      }
    } else {
      echo '<h3>Tyvärr, det blev något fel</h3>';
    }
   } else {
    echo '
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