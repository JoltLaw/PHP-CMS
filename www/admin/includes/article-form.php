<?php 
?>

<ul>
<?php if(!empty($article->errors)): ?>
  <?php foreach ($article->errors as $error):?>
   <li> <?php echo $error; ?></li>
  <?php endforeach; ?>
<?php endif; ?>
  </ul>
<form method="post" id="formArticle">
  <div class="form-group">
  <label for="title">Title</label>
  <input class="form-control" name="title" id="title" type="text" placeholder="Article title" value=<?php echo htmlspecialchars($article->title); ?>>
</div>
<div class="form-group">
  <label for="content">Content</label>
<textarea class="form-control" name="content" id="content" rows="4" cols="40" placeholder="Article content"><?php echo htmlspecialchars($article->content); ?></textarea>
</div>
<div class="form-group">
<label for="published_at">Published at</label>
<input class="form-control" type="text" name="published_at" id="published_at" value=<?php echo htmlspecialchars($article->published_at); ?>>
</div>

<fieldset>
  <legend>Categories</legend>
  <?php foreach ($categories as $category) : ?>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="category[]" value="<?php echo $category["id"]; ?>"
              id="category<?php echo $category["id"]?>"
              <?php if (in_array($category["id"], $category_ids)): ?>
                checked
              <?php endif; ?>>

        <label class="form-check-label" for="category<?php echo $category["id"]?>">
        <?php echo htmlspecialchars($category["name"]); ?>
        </label>
    </div>
  <?php endforeach; ?>
</fieldset>

<button>Save</button>
</form>