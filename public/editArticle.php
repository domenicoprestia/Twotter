<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <title>💨 Twotter</title>
   <?php include "controller/dbactions.php"; $pdo = configDB(); $articles = fetchGivenArticle($pdo, $_GET['id']); $tags = fetchAllTags($pdo); $hashtags = fetchRelationship($pdo, $_GET['id'])?>
</head>
<body style="background-image: url('imgs/bg.jpg');">
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
</div>
   <p>&nbsp</p>
   <?php foreach($articles as $article):?>
   <form class="text-center" onsubmit=<?php if(isset($_GET['title']) && isset($_GET['body']) && $_GET['title'] != ""){editArticle($pdo, $_GET['id'], $_GET['title'], $_GET['body'], $_GET['tags']);} elseif(isset($_GET['title'])  && $_GET['title'] == ""){echo"<p class='text-center' style='color:red;'>Set all the parameters correctly</p>";} ?> -> 
   <div class="card" style="background-color:rgb(126, 39, 39); width: 40rem;">
   <div id="article_title" class="card-header" style="text-align:left;">
   <input type="hidden" name="id" value="<?=$article->id?>">
    <input style="background-color:rgb(126, 39, 39); border-style:none; color:white; border-radius:5px" type="text" name="title" value="<?=$article->title?>"></input>
   </div>
   <div class="card-body">
      <p id = "body" class="card-text" style="text-align:left;"><textarea style="background-color: rgb(90, 63, 63); border-style:none; color:white;  border-radius:5px" name="body" value="<?=$article->body?>" rows="4" cols="64"><?=$article->body?></textarea></p>
      <div style="text-align:left;">
      <select id="select" style="border-style:none; border-radius:5px; background-color:rgb(90, 63, 63);"name="tags[]" class="form-select" size="3" aria-label="size 3 select" multiple>
         <?php foreach($tags as $tag):?>
            <?php $check = false; foreach($hashtags as $hashtag){
               if($tag->id == $hashtag[0]->id){
                  $check = true;
               };
            }?>
            <?php if($check == true): ?>
            <option value="<?= $tag->id ?>" selected><?= $tag->name ?></option>
            <?php else: ?>
            <option value="<?= $tag->id ?>"><?= $tag->name ?></option>
            <?php endif ?>
         <?php endforeach?>
      </select>
      <p id = "body" class="card-text" style="text-align:right;"><?= date('D, d M Y H:i:s')?></p>
      <input type="submit" class="btn" value="Update Article" style="background-color:rgb(126, 39, 39); color:white"></input>
</form>
  <?php endforeach?>
</div>
<script src="https://kit.fontawesome.com/4d1b511d1a.js"></script>
</body>
