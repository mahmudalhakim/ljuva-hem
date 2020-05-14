<?php
  require_once 'db.php';
  require_once 'header.php';
  

  if( isset($_POST) ){
    $firstname = htmlspecialchars($_POST['firstname']);
    $surname = htmlspecialchars($_POST['surname']);
    $email = htmlspecialchars($_POST['email']);
    $passwordEntered = htmlspecialchars($_POST['password']);
    $password = password_hash($passwordEntered, PASSWORD_DEFAULT);


    // check if member is allready registered
    $sqlCheckForMember  = "SELECT `email` FROM `member` WHERE `email` LIKE '$email'";
    $stmtCheckForMember = $db->prepare($sqlCheckForMember);
    $stmtCheckForMember->execute();
    // variable only changes if the member allready exist
    $doesMemberExist = false;
    while($rowCheckForMember = $stmtCheckForMember->fetch(PDO::FETCH_ASSOC)) {
      $doesMemberExist = true;
    }
    // if new email create new member
    if(!$doesMemberExist){
      $sql  = " INSERT INTO `member` (`member_id`, `firstname`, `surname`, `email`, `password`) 
                VALUES (NULL, '$firstname', '$surname', '$email', '$password')";
      $stmt = $db->prepare($sql);
      $stmt->execute();
      echo "<p>Nytt konto skapades</p><br>
      <a href='login.php'><button class='form__submit_btn'>Logga in</button></a>";

    } else {
      echo "<p>Tyvärr, konto kunde inte skapas. E-mailen har redan registrerats.</p><br>
      <a href='login.php'><button class='form__submit_btn'>Logga in</button></a>";
    }
  } else {
    echo "Hoppsan, nu blev det nått fel!<br><a href='login.php'>Tillbaka</a>";
  }

  require_once 'footer.php'
?>