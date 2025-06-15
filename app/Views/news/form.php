<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h1><?= isset($news) ? 'Edit' : 'Create' ?> News</h1>
<form action="<?= site_url(isset($news) ? "news/update/{$news['id']}" : 'news/store') ?>"
      method="post" enctype="multipart/form-data">
  <?= csrf_field() ?>
  <div class="form-group">
    <label>Title</label>
    <input type="text" name="title" id="title" class="form-control" 
           value="<?= esc($news['title'] ?? '') ?>" required>
  </div>
  <div class="form-group">
    <label>Category</label>
    <select name="category_id" class="form-control" required>
      <?php foreach($categories as $cat): ?>
        <option value="<?= $cat['id'] ?>"
          <?= isset($news) && $news['category_id']==$cat['id'] ? 'selected':'' ?>>
          <?= esc($cat['name']) ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <label>Content</label>
    <textarea name="content" class="form-control" rows="5" required><?= esc($news['content'] ?? '') ?></textarea>
  </div>
  <div class="form-group">
    <label>Image <?= isset($news) ? '(leave blank to keep)' : '' ?></label>
    <input type="file" name="image" class="form-control-file">
    <?php if(isset($news) && $news['image']): ?>
      <img src="<?= base_url("uploads/{$news['image']}") ?>" width="120">
    <?php endif; ?>
  </div>
  <button class="btn btn-success"><?= isset($news) ? 'Update' : 'Save' ?></button>
  <a href="<?= site_url('news') ?>" class="btn btn-secondary">Cancel</a>
</form>

<script>
  // slug otomatis
  document.getElementById('title').addEventListener('keyup', function() {
    fetch('<?= site_url('news/slugify') ?>?title=' + encodeURIComponent(this.value))
      .then(res => res.json()).then(data => {
        // asumsikan ada input hidden dengan id="slug"
        document.getElementById('slug').value = data.slug;
      });
  });
</script>
<?= $this->endSection() ?>
