<!DOCTYPE html>
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
<?php  include 'controller/dbactions.php';
   $pdo = configDB();
   $articoli = fetchAllArticles($pdo);
?>
   <div class="nav">
   <div class="logo">
      <h1 href="index.php"><i class="fa fa-wind"></i> Twotter</h1>
   </div>
   <ul class="navlinks">
      <li>
         <a href="index.php">Articles</a>
      </li>
      <li>
      <a href="uploadArticle.php"><i class="fa fa-plus"></i> Article</a>
      </li>
      <li>
      <a href="uploadTag.php"><i class="fa fa-plus"></i> Tag</a>
      </li>
   </ul>
   <div class="burger">
      <div class="line1"></div>
      <div class="line2"></div>
      <div class="line3"></div>
   </div>
</div>
<?php if(count($articoli) == 0):?>
   <div class="card" style="background-color:rgb(126, 39, 39); width: 40rem;">
   <div id="article_title"class="card-header" style="text-align:left;">
    <h3>Twotter</h3>
   </div>
   <div class="card-body">
      <p id = "body" class="card-text" style="text-align:left;">Hey this is the staff of twotter! apparently our db's are not working or are empty!</p>
      <p id = "body" class="card-text" style="text-align:right;">-Admins</p>
      <div style="text-align:right;">
<?php endif ?>

<?php foreach($articoli as $articolo):?>
<div class="card" style="background-color:rgb(126, 39, 39); width: 40rem;">
   <div id="article_title"class="card-header" style="text-align:left;">
    <h3><?= $articolo->title; ?></h3>
   </div>
   <div class="card-body">
      <p id = "body" class="card-text" style="text-align:left;"><?= $articolo->body; ?></p>
      <?php $hashtags = fetchRelationship($pdo, $articolo->id)?>
      <?php foreach($hashtags as $hashtag): ?>
         <p id="hashtag" class="card-text" style="text-align:left;">#<b><?= $hashtag[0]->name; ?></b></p> 
      <?php endforeach ?>
      <p id = "body" class="card-text" style="text-align:right;"><?= $articolo->upload_time; ?></p>
      <div style="text-align:right;">
      <a href="editArticle.php?id=<?=$articolo->id?>" id="btn"><i class="fa fa-pencil"></i></a>
      <a>&nbsp</a>
      <a href="deleteArticle.php?id=<?=$articolo->id?>" id="btn"><i class="fa fa-trash"></i></a>
      </div>
   </div>
   </div>
</div>
<?php endforeach ?>
<script src="https://kit.fontawesome.com/4d1b511d1a.js"></script>
<script src="js/main.js"></script>
</body>
</html>