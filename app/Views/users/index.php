<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h1>Users <a href="<?= site_url('users/create') ?>" class="btn btn-primary btn-sm">+ New</a></h1>
<table class="table table-bordered">
  <thead><tr><th>#</th><th>Name</th><th>Email</th><th>Role</th><th>Actions</th></tr></thead>
  <tbody>
    <?php foreach($users as $u): ?>
    <tr>
      <td><?= $u['id'] ?></td>
      <td><?= esc($u['name']) ?></td>
      <td><?= esc($u['email']) ?></td>
      <td><?= esc($u['role_name']) ?></td>
      <td>
        <a href="<?= site_url("users/edit/{$u['id']}") ?>" class="btn btn-sm btn-warning">Edit</a>
        <a href="<?= site_url("users/delete/{$u['id']}") ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?= $this->endSection() ?>
