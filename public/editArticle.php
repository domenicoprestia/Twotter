<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <title>💨 Twotter</title>
   <?php include "controller/dbactions.php"; $pdo = configDB(); $articles = fetchGivenArticle($pdo, $_GET['id']); $tags = fetchAllTags($pdo);?>
</head>
<body>
<div class="nav">
   <div class="logo">
      <h1 ><i class="fa fa-wind"></i> Twotter</h1>
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

   <?php foreach($articles as $article):?>
   <form class="text-center" onsubmit=<?php if(isset($_GET['title']) && isset($_GET['body'])){editArticle($pdo, $_GET['id'], $_GET['title'], $_GET['body'], $_GET['tags']);} ?>>
   <div class="card" style="background-color:rgb(126, 39, 39); width: 40rem;">
   <div id="article_title"class="card-header" style="text-align:left;">
   <input type="hidden" name="id" value="<?=$article->id?>">
    <input style="background-color:rgb(126, 39, 39); border-style:none; color:white; border-radius:5px" type="text" name="title" value="<?=$article->title?>"></input>
   </div>
   <div class="card-body">
      <p id = "body" class="card-text" style="text-align:left;"><textarea style="background-color: rgb(90, 63, 63); border-style:none; color:white;  border-radius:5px" name="body" value="<?=$article->body?>" rows="4" cols="64"><?=$article->body?></textarea></p>
      <div style="text-align:right;">
      <select id="select" style="transform: translateX(-250px); border-style:none; border-radius:5px; background-color:rgb(90, 63, 63);"name="tags[]" class="form-select" size="3" aria-label="size 3 select" multiple>
         <?php foreach($tags as $tag):?>
            <option value="<?= $tag->id ?>"><?= $tag->name ?></option>
         <?php endforeach?>
      </select>
      <p id = "body" class="card-text" style="text-align:right;"><?= date('D, d M Y H:i:s')?></p>
      <input type="submit" class="btn" value="Update Article" style="background-color:rgb(126, 39, 39); color:white"></input>
</form>
  <?php endforeach?>
</div>
<script src="https://kit.fontawesome.com/4d1b511d1a.js"></script>
</body>
