<?php 
require "../includes/init.php";

Auth::requireLogin();


$conn = require "../includes/db.php";


if(isset($_GET["id"])){

$article = Article::getByID($conn, $_GET["id"]);


if(!$article) {
  die("article not found");
}

} 

else {
  die("id not supplied, article not found");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

      if($article->delete($conn)) {
      Url::redirect("/admin/index.php");
      }
    
}
  
   

?>


<?php require "../includes/header.php"; ?>

<h2>Are you sure you want to delete this article?</h2>
<form method="POST">
        <button>Delete</button>
        <a href="article.php?id=<?php echo $article->id; ?>"> Cancel </a>
</form>


<?php require "../includes/footer.php"; ?>