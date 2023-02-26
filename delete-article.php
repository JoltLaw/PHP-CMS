<?php 
require "includes/database.php";
require "includes/article.php";
require "includes/url.php";

/**
 * Get the database connection
 * 
 * 
 * @return object connection to MySQL server
 */
$conn = getDB();

if(isset($_GET["id"])){

$article = getArticle($conn, $_GET["id"]);

if($article) {
$id = $article["id"];

} else {
  die("article not found");
}

} 

else {
  die("id not supplied, article not found");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

$sql = "DELETE FROM article WHERE id = ?";


    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt === false) {
      echo mysqli_connect_error($conn);
    } 
    else {
    
    
      mysqli_stmt_bind_param($stmt, "i", $id);
    
      if (mysqli_stmt_execute($stmt)) {
    
      redirect("/index.php");
      } else {
        echo mysqli_stmt_error($stmt);
      }
    }
    
  }
   

?>


<?php require "includes/header.php"; ?>

<h2>Are you sure you want to delete this article?</h2>
<form method="POST">
        <button>Delete</button>
        <a href="article.php?id=<?php echo $id; ?>"> Cancel </a>
</form>


<?php require "includes/footer.php"; ?>