<?php

include 'models\article.php';
include 'models\tag.php';


function configDB()
{
   $dsn = 'mysql:host=localhost;dbname=twotter';
   $username = 'root';
   $password = '';
   $options = [];
   try{
      $pdo = new PDO($dsn, $username, $password, $options);
      return $pdo;
   }
   catch(PDOException $e){
      die($e->getMessage());
   }
}

function fetchAllArticles($pdo){
   $sql = 'SELECT * FROM articles';
   $stmt = $pdo->prepare($sql);
   $stmt->execute();
   $articoli = $stmt -> fetchAll(PDO::FETCH_CLASS, 'Article');
   return $articoli;
}

function fetchGivenArticle($pdo, $id){
   $sql = 'SELECT * FROM articles WHERE id=:id';
   $stmt = $pdo->prepare($sql);
   $stmt->bindParam(':id', $id);
   $stmt->execute();
   $article = $stmt->fetchAll(PDO::FETCH_CLASS, 'Article');
   return $article;
}

function addArticle($pdo, $title, $body, $tags){
      $sql = 'INSERT INTO articles (title , body) VALUES (:title, :body)';
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(':title', $title);
      $stmt->bindParam(':body', $body);
      $stmt->execute();

      $articles = fetchAllArticles($pdo);
      $article = $articles[count($articles) - 1];

      foreach($tags as $tag){
      $sql ="INSERT INTO articles_tags(article_id, tag_id) VALUES (:article_id, :tag_id);";
      $stmt = $pdo->prepare($sql);
      $stmt -> bindParam(':article_id', $article->id);
      $stmt ->bindParam(':tag_id', $tag);
      $stmt ->execute();
      }

      header('Location: index.php');
}

function updateArticle($pdo, $id, $title, $body){
   $sql = 'UPDATE articles SET title=:title, body=:body WHERE id=:id';
   $stmt = $pdo->prepare($sql);
   $stmt->bindParam(':title', $title);
   $stmt->bindParam(':body', $body);
   $stmt->bindParam(':id', $id);
   $stmt->execute();
   header('Location: index.php');
}

function deleteArticle($pdo, $id){
   $sql = 'DELETE FROM articles WHERE id=:id';
   $stmt = $pdo->prepare($sql);
   $stmt->bindParam(':id', $id);
   $stmt->execute();
   
   header('Location: index.php');
}

function fetchAllTags($pdo){
   $sql = 'SELECT * FROM tags';
   $stmt = $pdo->prepare($sql);
   $stmt -> execute();
   $tags = $stmt -> fetchAll(PDO::FETCH_CLASS, 'Tag');
   return $tags;
}

function fetchGivenTag($pdo, $id){
   $sql = 'SELECT * FROM tags WHERE id=:id';
   $stmt = $pdo->prepare($sql);
   $stmt->bindParam(':id', $id);
   $stmt->execute();
   $tag = $stmt->fetchAll(PDO::FETCH_CLASS, 'Tag');
   return $tag;
}

function uploadTag($pdo, $name, $description){
   $sql = "INSERT INTO tags (name, description) VALUES (:name, :description)";
   $stmt = $pdo->prepare($sql);
   $stmt -> bindParam(':name', $name);
   $stmt -> bindParam(':description', $description);
   $stmt->execute();
   header('Location: uploadTag.php');
}

function deleteTag($pdo, $id){
   $sql = 'DELETE from tags WHERE id=:id';
   $stmt = $pdo->prepare($sql);
   $stmt->bindParam(':id',$id);
   $stmt->execute();
   header('Location: uploadTag.php');
}

function editTag($pdo, $id, $name, $description){
   $sql = 'UPDATE tags SET name=:name, description=:description WHERE id=:id';
   $stmt = $pdo->prepare($sql);
   $stmt->bindParam(':name', $name);
   $stmt->bindParam(':description', $description);
   $stmt->bindParam(':id', $id);
   $stmt->execute();
   header('Location: uploadTag.php');
}

/* manyToMany realtionship query
SELECT * 
FROM articles 
INNER JOIN article_tags
ON articles.id = article_tags.article_id
INNER JOIN tags
ON article_tags.tag_id = tags.id
*/
?>
