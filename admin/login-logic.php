<?php
require_once '../db.php';
if( isset($_POST['email']) && isset($_POST['password'])){
  $email = htmlspecialchars($_POST['email']);
  // check if member exists
  $sqlCheckForMember  = "SELECT `email`,`password` FROM `member` WHERE `member_id` LIKE 1";
  $stmtCheckForMember = $db->prepare($sqlCheckForMember);
  $stmtCheckForMember->execute();
  // variable only changes if the member allready exist
  $correctAdminInfo = false;
  while($rowAdmin = $stmtCheckForMember->fetch(PDO::FETCH_ASSOC)) {
    $correctAdminInfo = true;
    $savedPass = htmlspecialchars($rowAdmin['password']);
  }
  if($correctAdminInfo){
    $passwordEntered = htmlspecialchars($_POST['password']);
    // if password entered is the same as the one saved in db, start session
    if (password_verify($passwordEntered, $savedPass)) {
      // start session with 
      session_start();
      $_SESSION['loggedintoljuvahemadmin'] = true;
      $_SESSION['email'] = $email;
      $_SESSION['member_id'] = 1;
      // send user to create page with all their ads
      header('Location: index.php');
    } else {
      header('Location: login-fail.php');
    }
  } else {
    header('Location: login-fail.php');
  }
} 
?>