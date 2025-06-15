<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="<?= site_url() ?>" class="brand-link">
    <img src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/img/AdminLTELogo.png"
         alt="Logo" class="brand-image img-circle elevation-3">
    <span class="brand-text font-weight-light">CI StarterKit</span>
  </a>
  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column">
        <li class="nav-item">
          <a href="<?= site_url() ?>" class="nav-link"><i class="nav-icon fas fa-tachometer-alt"></i><p>Dashboard</p></a>
        </li>
        <?php if (in_groups('admin')): ?>
        <li class="nav-item">
          <a href="<?= site_url('users') ?>" class="nav-link"><i class="nav-icon fas fa-users"></i><p>Users</p></a>
        </li>
        <?php endif; ?>
        <li class="nav-item">
          <a href="<?= site_url('categories') ?>" class="nav-link"><i class="nav-icon fas fa-tags"></i><p>Categories</p></a>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link"><i class="nav-icon fas fa-newspaper"></i><p>News<i class="right fas fa-angle-left"></i></p></a>
          <ul class="nav nav-treeview">
            <li class="nav-item"><a href="<?= site_url('news/create') ?>" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Create</p></a></li>
            <li class="nav-item"><a href="<?= site_url('news') ?>" class="nav-link"><i class="far fa-circle nav-icon"></i><p>All</p></a></li>
            <li class="nav-item"><a href="<?= site_url('news?status=draft') ?>" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Draft</p></a></li>
            <li class="nav-item"><a href="<?= site_url('news?status=pending') ?>" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Pending</p></a></li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</aside>
