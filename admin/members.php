<?php
  require_once 'header.php';

  if (isset($_SESSION['loggedintoljuvahemadmin']) && $_SESSION['loggedintoljuvahemadmin'] == true) {
    $member_id = htmlspecialchars($_SESSION['member_id']);

    echo "
    <section class='section__create'>
      <h1>Medlemmar</h1>
      <div class='ad ad--admin'>
      <table>
        <thead>
          <th>Medlemsnummer</th>
          <th>Namn</th>
          <th>E-mail</th>
          <th></th>
        </thead>";
    
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
        echo "<tr>
                <td><p>$member_id</p></td>
                <td><p>$email</p></td>
                <td><p>$name</p></td>
                <td><a href='show-all.php?member_id=$member_id'>Se annonser</a></td>
              </tr>";
      }
    }
      if(!$result){
        echo "<p>Det finns inga medlemmar att visa</p>";
      }
      echo "
          </table>
      </div>";
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