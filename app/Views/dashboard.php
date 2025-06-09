<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Daftar Reservasi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <style>
    :root {
      --primary: #614DAC;
      --accent: #D9584D;
      --light-bg: #FFFDEB;
      --light-blue: #B4EBE6;
      --light-pink: #EF9F9B;
      --status-yellow: #FFD700;
      --status-green: #28a745;
      --status-red: #dc3545;
    }

    body {
      background-color: var(--light-bg);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    h2 {
      color: var(--primary);
      font-weight: 700;
    }

    .container {
      background: #ffffff;
      padding: 30px;
      border-radius: 16px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.05);
      margin-top: 30px;
    }

    .btn-success {
      background-color: var(--primary) !important;
      border-color: var(--primary) !important;
    }

    .btn-warning {
      background-color: var(--light-pink) !important;
      border-color: var(--light-pink) !important;
      color: black !important;
    }

    .btn-danger {
      background-color: var(--accent) !important;
      border-color: var(--accent) !important;
    }

    .btn-info {
      background-color: #4DA6FF !important;
      border-color: #4DA6FF !important;
      color: white !important;
    }

    .badge.status-menunggu {
      background-color: var(--status-yellow);
      color: black;
    }

    .badge.status-selesai {
      background-color: var(--status-green);
      color: white;
    }

    .badge.status-batal {
      background-color: var(--status-red);
      color: white;
    }

    .table th {
      background-color: var(--light-blue);
      color: #333;
      text-align: center;
    }

    .table td {
      vertical-align: middle;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Daftar Reservasi</h2>
  <a href="<?= base_url('/create') ?>" class="btn btn-success mb-3">+ Tambah Reservasi</a>

  <table class="table table-bordered table-striped table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Nama Pelanggan</th>
        <th>Tanggal</th>
        <th>Jenis Layanan</th>
        <th>Nama Layanan</th>
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
        <td><?= esc($r['nama_layanan']) ?></td>
        <td><?= esc($r['jam_reservasi']) ?></td>
        <td class="text-center">
        <?php
            $status = esc($r['status']);
            $badgeClass = '';

            if ($status === 'Menunggu') {
                $badgeClass = 'status-menunggu';
            } elseif ($status === 'Selesai') {
                $badgeClass = 'status-selesai';
            } elseif ($status === 'Batal') {
                $badgeClass = 'status-batal';
            }
        ?>
        <span class="badge <?= $badgeClass ?>"><?= $status ?></span>
        </td>

        <td class="text-center">
        <a href="<?= base_url('reservasi/edit/' . $r['id_reservasi']) ?>" class="btn btn-sm btn-warning" title="Edit">
            <i class="bi bi-pencil-square"></i>
        </a>
        <a href="<?= base_url('broadcast/' . $r['id_pelanggan']) ?>" class="btn btn-sm btn-danger" title="Reminder">
            <i class="bi bi-bell-fill"></i>
        </a>
        <a href="<?= base_url('ulasan/' . $r['id_reservasi']) ?>" class="btn btn-sm btn-info" title="Ulasan">
            <i class="bi bi-chat-left-text-fill"></i>
        </a>
        </td>
      </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if ($status = session()->getFlashdata('status')): ?>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    Swal.fire({
      title: 'Info',
      text: <?= json_encode($status) ?>,
      icon: 'success'
    });
  });
</script>
<?php endif; ?>
</body>
</html>
