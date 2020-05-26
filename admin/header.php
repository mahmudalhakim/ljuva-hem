<?php 
  require_once '../db.php';
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" href="../images/logo-admin.png" type="image/png">
  <link rel="stylesheet" href="../styles/style.css">
  <link href="https://fonts.googleapis.com/css?family=Lato|Source+Sans+Pro&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Ljuva hem - Admin</title>
</head>
<body>

<header>
  <nav>
    <ul>
      <li><a href="../index.php" class="nav__link nav__link--admin">Ljuva hem</a></li>
      <li><a href="index.php" class="nav__link nav__link--admin">Annonser</a></li>
      <li><a href="members.php" class="nav__link nav__link--admin">Medlemmar</a></li>
    </ul>
  </nav>

  <?php
  if (isset($_SESSION['loggedintoljuvahemadmin']) && $_SESSION['loggedintoljuvahemadmin'] == true) {
    echo '
    <nav class="nav__login">
      <ul>
        <li><a href="logout-logic.php" id="login" class="login--admin">Logga ut</a></li>
      </ul>
    </nav>
    </header>
    <main>';
    } else {
      echo '
      <nav class="nav__login">
        <ul>
        <li><a href="login.php" id="login" class="login--admin">Logga in</a></li>
        </ul>
      </nav>
      </header>
      <main>';
    }
?>