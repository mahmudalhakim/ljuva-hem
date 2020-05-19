<?php
  session_start();
  require_once '../db.php';
  require_once 'header.php';

  if (isset($_SESSION['loggedintoljuvahem']) && $_SESSION['loggedintoljuvahem'] == true) {
    $member_id = htmlspecialchars($_SESSION['member_id']);

    echo '<input type="hidden" id="loginStatus" name="loginStatus" value="true">

    <nav class="nav__login">
      <ul>
        <li><a href="../logout-logic.php" id="login">Logga ut</a></li>
      </ul>
    </nav>
    </header>

    <main>

      <section class="section__create">
        <h1>Hantera annonser</h1>
        <h3>Skapa annons</h3>
        <a href="steg1.php"><button class="btn__small">Skapa annons</button></a>
        <h3>Annonser</h3>';
    
    $sql  = "SELECT * FROM `ad` WHERE `member_id` = $member_id";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $ad_id = htmlspecialchars($row['ad_id']);
      $type = htmlspecialchars($row['type']);
      $rooms = htmlspecialchars($row['rooms']);
      $area = htmlspecialchars($row['area']);
      $price = htmlspecialchars($row['price']);
      $address = htmlspecialchars($row['address']);
      $city = htmlspecialchars($row['city']);
      $municipality = htmlspecialchars($row['municipality']);

      echo "<div id='$ad_id' class='product'>";

      // <div>
      //   <img src='images/' alt='image'>
      // </div>
      echo "<div class='product-info'>
          <h3>$address, $city</h3>
          <p class=''>$municipality kommun</p>
          <table>
            <td><p>$price kr</p></td>
            <td><p>$area m²</p></td>
            <td><p>$rooms rum</p></td>
          </table>
        </div>
      </div>";
      // echo "
      // <table id='$ad_id'>
      //   <tr>
      //     <td><p>$address</p></td>
      //     <td><p>$city</p></td>
      //     <td><p>$municipality</p></td>
      //     <td><p>$area m²</p></td>
      //     <td><p>$rooms rum</p></td>
      //     <td><p>$price kr</p></td>
      //     <td><p>$price kr</p></td>
      //   </tr>
      // </table>";
      }

    echo  '</section>';
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
      <a href="login.php"><button class="btn__small">Logga in</button></a>
    </section>';
  }

  echo "<pre>";
  print_r($_SESSION);
  echo "</pre>";
?>

<?php
  require_once 'footer.php';
?>