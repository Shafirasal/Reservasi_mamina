<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Daftar Reservasi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>

<div class="container my-4">
    <h2>Daftar Reservasi</h2>
    <a href="<?= base_url('/create') ?>" class="btn btn-success mb-3">+ Tambah Reservasi</a>
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Pelanggan</th>
                <th>Tanggal</th>
                <th>Jenis Layanan</th>
                <th>Nama Layanan</th> <!-- Kolom baru -->
                <th>Jam</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; foreach ($reservasi as $r): ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= esc($r['nama_pelanggan']) ?></td>
                <td><?= esc($r['tanggal_reservasi']) ?></td>
                <td><?= esc($r['jenis_layanan']) ?></td>
                <td><?= esc($r['nama_layanan']) ?></td> <!-- Tambahkan ini -->
                <td><?= esc($r['jam_reservasi']) ?></td>
                <td>
                    <?php if ($r['status'] == 'Menunggu'): ?>
                        <span class="badge bg-warning text-dark">Menunggu</span>
                    <?php elseif ($r['status'] == 'Selesai'): ?>
                        <span class="badge bg-success">Selesai</span>
                    <?php elseif ($r['status'] == 'Batal'): ?>
                        <span class="badge bg-danger">Batal</span>
                    <?php else: ?>
                        <span class="badge bg-secondary"><?= esc($r['status']) ?></span>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="<?= base_url('reservasi/edit/' . $r['id_reservasi']) ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="<?= base_url('broadcast/' . $r['id_pelanggan']) ?>" class="btn btn-sm btn-danger">Reminder</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
