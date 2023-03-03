<?php 
require "../includes/init.php";

Auth::requireLogin();

$conn = require "../includes/db.php";

if(isset($_GET["id"])){

  $article = Article::getWithCategories($conn, $_GET["id"]);

} 

else {
  $article = null;
}

?>

<?php require "../includes/header.php"; ?>

    <?php if($article): ?>
      
      <article>
        <h2><?php echo $article[0]["title"]; ?></h2>

        <?php if($article[0]["published_at"]): ?>
          </time>
          <?php $datetime = new DateTime($article[0]["published_at"]);
          echo $datetime->format("j F, Y"); ?>
          </time>
          <?php else: ?>
          Unpublished
          <?php endif; ?>

        <?php if($article[0]["category_name"]): ?>

          <p>Categories:
            <?php foreach ($article as $a): ?>
            <?php echo htmlspecialchars($a["category_name"]); ?>
            <?php endforeach; ?>
          </p>

        <?php endif; ?>

        <?php if($article[0]["image_file"]): ?>
          <img src="/uploads/<?php echo $article[0]["image_file"]; ?>" alt="">
        <?php endif; ?>

        <p><?php echo $article[0]["content"]; ?></p>
      </article>
      <a href="edit-article.php?id=<?php echo $article[0]["id"]; ?>">Edit</a>
      <a class="delete" href="delete-article.php?id=<?php echo $article[0]["id"];?>">Delete</a>
      <a href="edit-article-image.php?id=<?php echo $article[0]["id"]?>">Edit image</a>
      <?php else: ?> 
        <p>No articles found.</p>
    <?php endif; ?>
<?php require "../includes/footer.php"; ?>