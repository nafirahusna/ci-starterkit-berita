<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h1><?= isset($category) ? 'Edit' : 'Create' ?> Category</h1>
<form action="<?= site_url(isset($category) ? "categories/update/{$category['id']}" : 'categories/store') ?>" method="post">
  <?= csrf_field() ?>
  <div class="form-group">
    <label>Name</label>
    <input type="text" name="name" class="form-control" value="<?= esc($category['name'] ?? '') ?>" required>
  </div>
  <button class="btn btn-success"><?= isset($category) ? 'Update' : 'Save' ?></button>
  <a href="<?= site_url('categories') ?>" class="btn btn-secondary">Cancel</a>
</form>
<?= $this->endSection() ?>
