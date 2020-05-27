<?php 
require_once 'db.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" href="images/logo.png" type="image/png">
  <link rel="stylesheet" href="styles/style.css">
  <link href="https://fonts.googleapis.com/css?family=Lato|Source+Sans+Pro&display=swap" rel="stylesheet">
  <title>Ljuva hem - Köpa</title>
</head>
<body>

<header>
  <nav>
    <ul>
      <li><a href="index.php">Köpa</a></li>
      <li><a href="skapa/index.php">Sälja</a></li>
    </ul>
  </nav>
<?php
  if (isset($_SESSION['loggedintoljuvahem']) && $_SESSION['loggedintoljuvahem'] == true) {
    echo '<input type="hidden" id="loginStatus" name="loginStatus" value="true">
    <nav class="nav__login">
      <ul>
        <li><a href="logout-logic.php" id="login">Logga ut</a></li>
      </ul>
    </nav>
    </header>
    <main>';
    } else {
      echo '
      <nav class="nav__login">
        <ul>
          <li><a href="login.php" id="login">Logga in</a></li>
        </ul>
      </nav>
      </header>
      <main>';
    }
?>