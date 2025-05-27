<!DOCTYPE html>

<?php
/** @var \CodeIgniter\View\View $this */
?>

<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= $title ?? 'My App' ?></title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <?= $this->renderSection('css') ?>
</head>
<body>
  <div class="container my-4">
    <?= $this->renderSection('content') ?>
  </div>

  <!-- Bootstrap 5 Bundle JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <?= $this->renderSection('js') ?>
</body>
</html>
