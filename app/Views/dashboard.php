

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Daftar Reservasi</title>

  <!-- Load Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>

<div class="container my-4">
  <h2>Daftar Reservasi</h2>
  <a href="<?= base_url('reservasi/create') ?>" class="btn btn-success mb-3">+ Tambah Reservasi</a>

  <form method="get" class="d-flex mb-3 align-items-center">
    <label for="tanggal" class="me-2 mb-0">Filter Tanggal:</label>
    <input type="date" name="tanggal" id="tanggal" value="<?= esc($tanggal) ?>" class="form-control me-2" />
    <button type="submit" class="btn btn-primary">Filter</button>
  </form>

  <table class="table table-bordered table-striped table-hover">
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Jam</th>
        <th scope="col">Layanan</th>
        <th scope="col">Jenis</th>
        <th scope="col">Info</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; ?>
      <?php foreach ($reservasi as $r): ?>
      <tr>
        <th scope="row"><?= $i++ ?></th>
        <td><?= esc($r['tanggal_reservasi']) ?></td>
        <td><?= esc($r['jam_reservasi']) ?></td>
        <td><?= esc($r['id_layanan']) ?></td>
        <td><?= esc($r['jenis_layanan']) ?></td>
        <td><?= esc($r['tau_mamina_dari']) ?></td>
        <td><?= esc($r['status']) ?></td>
      </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>

<!-- Load Bootstrap JS Bundle (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
