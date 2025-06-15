<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h1>News <a href="<?= site_url('news/create') ?>" class="btn btn-primary btn-sm">+ New</a></h1>
<table class="table table-striped">
  <thead><tr><th>#</th><th>Title</th><th>Category</th><th>Status</th><th>Actions</th></tr></thead>
  <tbody>
    <?php foreach($newsList as $n): ?>
    <tr>
      <td><?= $n['id'] ?></td>
      <td><?= esc($n['title']) ?></td>
      <td><?= esc($n['category']) ?></td>
      <td>
        <?php if($n['is_published']): ?>
          <span class="badge badge-success">Published</span>
        <?php else: ?>
          <span class="badge badge-warning">Draft</span>
        <?php endif; ?>
      </td>
      <td>
        <a href="<?= site_url("news/edit/{$n['id']}") ?>" class="btn btn-sm btn-warning">Edit</a>
        <a href="<?= site_url("news/delete/{$n['id']}") ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</a>
        <?php if(!$n['is_published'] && in_groups('editor')): ?>
          <a href="<?= site_url("news/approve/{$n['id']}") ?>" class="btn btn-sm btn-success">Approve</a>
        <?php endif; ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?= $this->endSection() ?>
