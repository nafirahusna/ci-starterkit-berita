<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h1>Dashboard</h1>
<div class="row">
  <div class="col-lg-3 col-6">
    <div class="small-box bg-info">
      <div class="inner"><h3><?= $stats['users'] ?></h3><p>Users</p></div>
      <div class="icon"><i class="fas fa-users"></i></div>
      <a href="<?= site_url('users') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- box untuk berita, kategori, draft/pending sama caranya -->
</div>
<?= $this->endSection() ?>
