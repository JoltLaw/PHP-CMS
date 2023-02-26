<?php 
require "classes/Database.php";
require "classes/Article.php";

/**
 * Get the database connection
 * 
 * @return object connection to MySQL server
 */
$db = new Database();
$conn = $db->getConn();

if(isset($_GET["id"])){

$article = Article::getByID($conn, $_GET["id"]);

} 

else {
  $article = null;
}

?>

<?php require "includes/header.php"; ?>

    <?php if($article): ?>
      
      <article>
        <h2><?php echo $article->title; ?></h2>
        <p><?php echo $article->content; ?></p>
      </article>
      <a href="edit-article.php?id=<?php echo $article->id; ?>">Edit</a>
      <a href="delete-article.php?id=<?php echo $article->id;?>">Delete</a>
      <?php else: ?> 
        <p>No articles found.</p>
    <?php endif; ?>
<?php require "includes/footer.php"; ?>