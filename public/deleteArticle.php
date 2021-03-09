<!--<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <title>💨 Twotter</title>
   
</head>
<body>
<div class="nav">
   <div class="logo">
      <h1><i class="fa fa-wind"></i> Twotter</h1>
   </div>
   <ul class="navlinks">
      <li>
         <a href="index.php">Articles</a>
      </li>
      <li>
      <a href="uploadArticle.php"><i class="fa fa-plus"></i> Article</a>
      </li>
   </ul>
   <div class="burger">
      <div class="line1"></div>
      <div class="line2"></div>
      <div class="line3"></div>
   </div>
</div>

<script src="https://kit.fontawesome.com/4d1b511d1a.js"></script>
</body>-->
<?php include "controller/dbactions.php";  $pdo = configDB(); deleteArticle($pdo, $_GET['id']);?>


