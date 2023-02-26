<?php 
require "classes/Database.php";
require "classes/Article.php";
require "includes/auth.php";




/**
 * Get the database connection
 * 
 * @return object connection to MySQL server
 */
$db = new Database();
$conn = $db->getConn();


$articles = Article::getAll($conn);

?>

<?php require "includes/header.php"; ?>


<?php if (isLoggedIn()): ?>
  <p>You are logged in. <a href="logout.php">Log out</a></p>
<?php else: ?>
  <p>You are not logged in. <a href="login.php">Log in</a></p>
<?php endif; ?>
<a href="new-article.php">New article</a>

    <?php if(empty($articles)): ?>
      <p>No articles found.</p>
      
    <?php else: ?>
          <ul>
              <?php foreach ( $articles as $article): ?>
                  <li> 
                      <article>
                          <h2><a href="article.php?id=<?php echo $article["id"]; ?>"><?php echo htmlspecialchars($article['title']); ?></a></h2>
                          <p><?php echo htmlspecialchars($article['content']); ?></p>
                      </article>
                  </li>
              <?php endforeach ?>
           </ul>
    <?php endif; ?>
    <?php require "includes/footer.php"; ?>