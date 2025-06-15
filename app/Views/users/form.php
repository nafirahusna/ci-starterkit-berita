<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h1><?= isset($user) ? 'Edit' : 'Create' ?> User</h1>
<form action="<?= site_url(isset($user) ? "users/update/{$user['id']}" : 'users/store') ?>" method="post">
  <?= csrf_field() ?>
  <div class="form-group"><label>Name</label><input type="text" name="name" class="form-control" value="<?= esc($user['name'] ?? '') ?>" required></div>
  <div class="form-group"><label>Email</label><input type="email" name="email" class="form-control" value="<?= esc($user['email'] ?? '') ?>" required></div>
  <div class="form-group"><label>Password <?= isset($user) ? '(leave blank to keep)' : '' ?></label><input type="password" name="password" class="form-control" <?= isset($user) ? '' : 'required' ?>></div>
  <div class="form-group">
    <label>Role</label>
    <select name="role_id" class="form-control" required>
      <?php foreach($roles as $r): ?>
        <option value="<?= $r['id'] ?>" <?= isset($user) && $user['role_id']==$r['id']?'selected':'' ?>>
          <?= esc($r['name']) ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>
  <button class="btn btn-success"><?= isset($user) ? 'Update' : 'Save' ?></button>
  <a href="<?= site_url('users') ?>" class="btn btn-secondary">Cancel</a>
</form>
<?= $this->endSection() ?>
