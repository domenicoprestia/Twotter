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
<?php include "controller/dbactions.php"; $pdo = configDB(); $tags = fetchAllTags($pdo);?>
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
<form onsubmit=<?php 
if(isset($_GET['title']))
{addArticle($pdo, $_GET['title'], $_GET['body'], $_GET['tags']);} ?>>
<div class="card" style="background-color:rgb(126, 39, 39); width: 40rem;">
   <div id="article_title"class="card-header" style="text-align:left;">
    <input style="background-color:rgb(126, 39, 39); border-style:none; color:white; border-radius:5px" type="text" name="title" placeholder="Write here the title"></input>
   </div>
   <div class="card-body">
      <p id = "body" class="card-text" style="text-align:left;"><textarea style="background-color:rgb(90, 63, 63); border-style:none; color:white; border-radius:5px" name="body" placeholder="Write here the article" rows="4" cols="64"></textarea></p>
      <select id="select" style="transform: translateX(-250px); border-style:none; border-radius:5px; background-color:rgb(90, 63, 63);"name="tags[]" class="form-select" size="3" aria-label="size 3 select" multiple>
         <?php foreach($tags as $tag):?>
            <option value="<?= $tag->id ?>"><?= $tag->name ?></option>
         <?php endforeach?>
      </select>
      <div style="text-align:right;">
      <p id = "body" class="card-text" style="text-align:right;"><?= date('D, d M Y H:i:s')?></p>
      <input type="submit" class="btn" value="Public" style="background-color:rgb(126, 39, 39); color:white"></input>
</form>
      </div>
   </div>
   </div>
</div>
<script src="https://kit.fontawesome.com/4d1b511d1a.js"></script>
</body>