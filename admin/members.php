<?php
  require_once 'header.php';

  if (isset($_SESSION['loggedintoljuvahemadmin']) && $_SESSION['loggedintoljuvahemadmin'] == true) {
    $member_id = htmlspecialchars($_SESSION['member_id']);

    echo "
    <section class='section__create'>
      <h1>Medlemmar</h1>";
    
    $sql  = "SELECT * FROM `ljuvahem-member` ORDER BY `ljuvahem-member`.`member_id`";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $result = false;
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $result = true;
      $member_id = htmlspecialchars($row['member_id']);
      if( $member_id != 1 ){
        $name = htmlspecialchars($row['firstname'])." ".htmlspecialchars($row['surname']);
        $email = htmlspecialchars($row['email']);
        echo "
        <div class='ad ad--admin'>
          <table class='table__ad-admin'>
            <tr>
              <th>Medlemsnummer</th>
              <td>$member_id</td>
            </tr>
            <tr>
              <th>Namn</th>
              <td>$email</td>
            </tr>
            <tr>
              <th>E-mail</th>
              <td>$name</td>
            </tr>
            <tr>
              <th><a href='show-all.php?member_id=$member_id'>Se annonser</a></th>
              <td></td>
            </tr>
          </table>
        </div>";
      }
    }
      if(!$result){
        echo "<p>Det finns inga medlemmar att visa</p>";
      }
  } else {
    echo '
    <section class="section__create">
      <h3>Logga in för administrera</h3>
      <a href="login.php"><button class="btn__small nav__link--admin">Logga in</button></a>';
  }
?>
</section>
<?php
  require_once 'footer.php';
?>