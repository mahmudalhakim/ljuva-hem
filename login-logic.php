<?php
require_once 'db.php';
if( isset($_POST['email']) && isset($_POST['password'])){
  $email = htmlspecialchars($_POST['email']);
  // check if member exists
  $sqlCheckForMember  = "SELECT `email`,`password`,`member_id` FROM `ljuvahem-member` WHERE `email` LIKE '$email'";
  $stmtCheckForMember = $db->prepare($sqlCheckForMember);
  $stmtCheckForMember->execute();
  // variable only changes if the member allready exist
  $doesMemberExist = false;
  while($rowCheckForMember = $stmtCheckForMember->fetch(PDO::FETCH_ASSOC)) {
    $doesMemberExist = true;
    $savedPass = htmlspecialchars($rowCheckForMember['password']);
    $member_id = htmlspecialchars($rowCheckForMember['member_id']);
  }
  // if new email create new member
  if($doesMemberExist){
    $passwordEntered = htmlspecialchars($_POST['password']);
    // if password entered is the same as the one saved in db, start session
    if (password_verify($passwordEntered, $savedPass)) {
      // start session with 
      session_start();
      $_SESSION['loggedintoljuvahem'] = true;
      $_SESSION['email'] = $email;
      $_SESSION['member_id'] = $member_id;
      // send user to create page with all their ads
      header('Location: skapa/index.php');
    } else {
      header('Location: login-fail.php');
    }
  } else {
    header('Location: login-fail.php');
  }
} 
?>