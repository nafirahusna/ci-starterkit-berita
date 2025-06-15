<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= esc($title ?? 'CI StarterKit') ?></title>

  <!-- Font Awesome via CDN -->
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-p1CmUX4y3S4cH6AB6VX4NehLC6HJj/0+YCzh7B8uM6G+O6vDcYjv7+9b2E8+miPTNfP3yy9+bbfp3iZrhYDo0w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Bootstrap 4 via CDN -->
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.2/css/bootstrap.min.css"
    integrity="sha512-xOolHFLEh07PJGoPkLvU+0s3FKs4QwN2KG/13fVAKbGQh/CR0P0p5V3h6WIP1I+dBf2kmGz/1hq6KcR0Y7Y+QA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- AdminLTE CSS via CDN -->
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css"
    integrity="sha512-LiVgvLunPq3PaZ5QVaDcC72nNiUOiE+th0dvAKQfZVZN3UxSwJ55xLp+SLzssSMfNF4LNvNkvjEL6zw6zufAyg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <?= $this->include('layouts/partials/navbar') ?>
  <?= $this->include('layouts/partials/sidebar') ?>

  <div class="content-wrapper p-3">
    <?= $this->renderSection('content') ?>
  </div>

  <?= $this->include('layouts/partials/footer') ?>

</div>

<!-- jQuery via CDN -->
<script
  src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
  integrity="sha512-6fsxvD3BuVOcuZI3M5yIdpSSTvk0r0mxOx6M2gtuFdYaZaopu3YRxP8s1eYi1u6LcwIFG1NKVOfLW/EYqP6Bjw=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Bootstrap Bundle via CDN -->
<script
  src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.2/js/bootstrap.bundle.min.js"
  integrity="sha512-P5MgQfe5sr/VwxgyQqzcyxQqWWIH/Xp89A5G0zYLp+uNvvJJi4i4cse8dxOq+4P/lLFRDRYhDA+G6l5O/ixSSA=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- AdminLTE App via CDN -->
<script
  src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js"
  integrity="sha512-KRz3BM33mi6D6t3gcaBheveG2p691HJrtwijeLE4sxkjE0SbwlIP3+W4upc+756rmzh+zkRSkr5U1iSaH+nEEg=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
