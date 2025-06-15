<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h1>Categories <a href="<?= site_url('categories/create') ?>" class="btn btn-primary btn-sm">+ New</a></h1>
<table class="table table-bordered">
  <thead><tr><th>#</th><th>Name</th><th>Actions</th></tr></thead>
  <tbody>
    <?php foreach($categories as $cat): ?>
    <tr>
      <td><?= $cat['id'] ?></td>
      <td><?= esc($cat['name']) ?></td>
      <td>
        <a href="<?= site_url("categories/edit/{$cat['id']}") ?>" class="btn btn-sm btn-warning">Edit</a>
        <a href="<?= site_url("categories/delete/{$cat['id']}") ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?= $this->endSection() ?>
