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
<body style="background-image: url('imgs/bg.jpg');">
<?php  include 'controller/dbactions.php'; $pdo = configDB(); $tags = fetchAllTags($pdo);?>
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
<form onsubmit="<?php if(isset($_GET['name']) && isset($_GET['description']))
{if($_GET['name'] != ""){uploadTag($pdo, $_GET['name'], $_GET['description']);}}?>">
<div class="card" style="background-color:rgb(126, 39, 39); width: 40rem;">
   <div id="article_title"class="card-header" style="text-align:left;">
    <input style="background-color:rgb(126, 39, 39); border-style:none; color:white; border-radius:5px" type="text" name="name" placeholder="Write here the tag name"></input>
   </div>
   <div class="card-body">
      <p id = "body" class="card-text" style="text-align:left;"><textarea style="background-color:rgb(90, 63, 63); border-style:none; color:white; border-radius:5px" name="description" placeholder="Write here the tag description" rows="4" cols="64"></textarea></p>
      <input type="submit" class="btn" value="Public" style="background-color:rgb(126, 39, 39); color:white"></input>
</div>
</div>
</form>

<?php foreach($tags as $tag):?>
   <div class="card" style="background-color:rgb(126, 39, 39); width: 40rem;">
   <div id="article_title"class="card-header" style="text-align:left;">
      <h3> <?= $tag->name ?></h1>
   </div>
      <div class="card-body">
         <p><?= $tag->description ?></p>
      <div style="text-align:right;">
      <a href="editTag.php?id=<?=$tag->id?>" id="btn"><i class="fa fa-pencil"></i></a>
      <a>&nbsp</a>
      <a href="deleteTag.php?id=<?=$tag->id?>" id="btn"><i class="fa fa-trash"></i></a>
      </div>
      </div>   
</div>
<?php endforeach ?>
<script src="https://kit.fontawesome.com/4d1b511d1a.js"></script>
<script src="js/main.js"></script>
</body>
</html>