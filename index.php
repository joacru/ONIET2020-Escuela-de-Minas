<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
  <title>ONIET 2020</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container">
    <?php

      session_start();

      include("actions/check_session.php");

      if(!$user_online && (!isset($_GET["tab"]) || (isset($_GET["tab"]) && $_GET["tab"] != "login"))){
        echo "$user_online";
        header("Location: index.php?tab=login");
      } else if(!isset($_GET["tab"])){
        include("views/dashboard.php");
      } else if($_GET["tab"] == "login"){
        include("views/login.php");
      } else if($_GET["tab"] == "edit"){
        include("views/edit.php");
      }

    ?>
  </div>
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.js"></script>
</body>
</html>