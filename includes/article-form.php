<?php 
?>

<ul>
<?php if(!empty($errors)): ?>
  <?php foreach ($errors as $error):?>
   <li> <?php echo $error; ?></li>
  <?php endforeach; ?>
<?php endif; ?>
  </ul>
<form method="post">
  <div>
  <label for="title">Title</label>
  <input name="title" id="title" type="text" placeholder="Article title" value=<?php echo htmlspecialchars($title); ?>>
</div>
<div>
  <label for="content">Content</label>
<textarea name="content" id="content" rows="4" cols="40" placeholder="Article content"><?php echo htmlspecialchars($content); ?></textarea>
</div>
<div>
<label for="published_at">Published at</label>
<input type="text" name="published_at" id="published_at" value=<?php echo htmlspecialchars($published_at); ?>>
</div>
<button>Save</button>
</form>