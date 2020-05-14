<?php

require_once 'db.php';
if( isset($_POST['email']) && isset($_POST['password'])){
  $email = htmlspecialchars($_POST['email']);
  // check if member exists
  $sqlCheckForMember  = "SELECT `email`,`password` FROM `member` WHERE `email` LIKE '$email'";
  $stmtCheckForMember = $db->prepare($sqlCheckForMember);
  $stmtCheckForMember->execute();
  // variable only changes if the member allready exist
  $doesMemberExist = false;
  while($rowCheckForMember = $stmtCheckForMember->fetch(PDO::FETCH_ASSOC)) {
    $doesMemberExist = true;
    $savedPass = htmlspecialchars($rowCheckForMember['password']);
  }
  // if new email create new member
  if($doesMemberExist){
    $passwordEntered = htmlspecialchars($_POST['password']);
    if (password_verify($passwordEntered, $savedPass)) {
      header('Location: skapa/index.php');
    } else {
      header('Location: login-fail.php');
    }
  } else {
    header('Location: login-fail.php');
  }
} 
?>