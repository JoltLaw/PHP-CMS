<?php 
require "../includes/init.php";

Auth::requireLogin();

$conn = require "../includes/db.php";


$paginator = new Paginator( $_GET["page"] ?? 1, 6, Article::getTotal($conn));


$articles = Article::getPage($conn, $paginator->limit, $paginator->offset);

?>

<?php require "../includes/header.php"; ?>



<?php if(empty($articles)): ?>
  <p>No articles found.</p>
  
  <?php else: ?>
    <h2>Administration</h2>

    <p><a href="new-article.php">New article</a></p>
    
          <table class="table">
            <thead>
              <th>Title</th>
              <th>Published</th>
            </thead>
            <tbody>
              <?php foreach ( $articles as $article): ?>
                  <tr> 
                      <td>
                          <a href="article.php?id=<?php echo $article["id"]; ?>"><?php echo htmlspecialchars($article['title']); ?></a>
                      </td>
                      <td>
                        <?php if($article["published_at"]): ?>
                        <time><?php $datetime = new DateTime($article["published_at"]);
                                echo $datetime->format("j F, Y"); ?></time>
                        <?php else: ?>
                          <p>Unpublished</p>
                          <button class="publish" data-id="<?php echo $article['id']; ?>">Publish</button>
                        <?php endif; ?>
                      </td>
                  </tr>
              <?php endforeach ?>
              </tbody>
           </table>
    <?php endif; ?>
    <?php require "../includes/pagination.php"?>;
    <?php require "../includes/footer.php"; ?>