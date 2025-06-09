<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Daftar Reservasi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary: #614DAC;
      --primary-light: #7a66c0;
      --accent: #D9584D;
      --light-bg: #FFFDEB;
      --light-blue: #B4EBE6;
      --light-pink: #EF9F9B;
      --status-yellow: #FFD700;
      --status-green: #28a745;
      --status-red: #dc3545;
      --text-dark: #2d3748;
      --text-medium: #4a5568;
      --text-light: #718096;
    }

    body {
      background-color: var(--light-bg);
      font-family: 'Poppins', sans-serif;
      color: var(--text-dark);
    }

    h2 {
      color: var(--primary);
      font-weight: 700;
      position: relative;
      display: inline-block;
      margin-bottom: 1.5rem;
    }

    h2::after {
      content: '';
      position: absolute;
      bottom: -8px;
      left: 0;
      width: 60px;
      height: 4px;
      background-color: var(--accent);
      border-radius: 2px;
    }

    .container {
      background: #ffffff;
      padding: 2.5rem;
      border-radius: 16px;
      box-shadow: 0 6px 30px rgba(0,0,0,0.08);
      margin-top: 2rem;
      margin-bottom: 2rem;
    }

    .btn-success {
      background-color: var(--primary) !important;
      border-color: var(--primary) !important;
      font-weight: 500;
      letter-spacing: 0.5px;
      transition: all 0.3s ease;
      padding: 0.5rem 1.25rem;
    }

    .btn-success:hover {
      background-color: var(--primary-light) !important;
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(97, 77, 172, 0.2);
    }

    .btn-warning {
      background-color: var(--light-pink) !important;
      border-color: var(--light-pink) !important;
      color: white !important;
      transition: all 0.3s ease;
    }

    .btn-warning:hover {
      background-color: #e87d78 !important;
      transform: translateY(-2px);
    }

    .btn-danger {
      background-color: var(--accent) !important;
      border-color: var(--accent) !important;
      transition: all 0.3s ease;
    }

    .btn-danger:hover {
      background-color: #d14035 !important;
      transform: translateY(-2px);
    }

    .btn-info {
      background-color: #4DA6FF !important;
      border-color: #4DA6FF !important;
      color: white !important;
      transition: all 0.3s ease;
    }

    .btn-info:hover {
      background-color: #3691f5 !important;
      transform: translateY(-2px);
    }

    .badge {
      font-weight: 500;
      padding: 0.5em 0.75em;
      border-radius: 12px;
      font-size: 0.8rem;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .badge.status-menunggu {
      background-color: var(--status-yellow);
      color: #8a6d0b;
    }

    .badge.status-selesai {
      background-color: var(--status-green);
      color: white;
    }

    .badge.status-batal {
      background-color: var(--status-red);
      color: white;
    }

    .table {
      border-collapse: separate;
      border-spacing: 0 0.75rem;
    }

    .table th {
      background-color: var(--primary);
      color: white;
      text-align: center;
      font-weight: 500;
      padding: 1rem;
      border: none;
    }

    .table td {
      vertical-align: middle;
      padding: 1rem;
      background-color: white;
      border-top: none;
      border-bottom: none;
      color: var(--text-medium);
    }

    .table tr {
      box-shadow: 0 4px 12px rgba(0,0,0,0.05);
      border-radius: 12px;
      overflow: hidden;
      transition: all 0.3s ease;
    }

    .table tr:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 16px rgba(0,0,0,0.1);
    }

    .table td:first-child {
      border-top-left-radius: 12px;
      border-bottom-left-radius: 12px;
    }

    .table td:last-child {
      border-top-right-radius: 12px;
      border-bottom-right-radius: 12px;
    }

    .action-buttons .btn {
      margin: 0 3px;
      width: 36px;
      height: 36px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      border-radius: 10px !important;
    }

    .empty-state {
      text-align: center;
      padding: 3rem;
      color: var(--text-light);
    }

    .empty-state i {
      font-size: 4rem;
      color: var(--light-blue);
      margin-bottom: 1rem;
    }

    .filter-section {
      background-color: #f8f9fa;
      padding: 1.5rem;
      border-radius: 12px;
      margin-bottom: 0.5rem;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .filter-title {
      font-weight: 600;
      color: var(--primary);
      margin-bottom: 1rem;
    }

    .filter-group {
      margin-bottom: 1rem;
    }

    .filter-label {
      font-weight: 500;
      color: var(--text-medium);
      margin-bottom: 0.2rem;
    }

    .filter-reset {
      color: var(--accent);
      font-weight: 500;
      cursor: pointer;
      transition: all 0.2s;
    }

    .filter-reset:hover {
      text-decoration: underline;
    }

    @media (max-width: 768px) {
      .container {
        padding: 1.5rem;
      }
      
      .table-responsive {
        border-radius: 12px;
        overflow: hidden;
      }
      
      .table th, .table td {
        padding: 0.75rem;
      }
      
      .filter-section {
        padding: 1rem;
      }
    }
  </style>
</head>
<body>

<div class="container">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Daftar Reservasi</h2>
    <a href="<?= base_url('create') ?>" class="btn btn-success">
      <i class="bi bi-plus-lg me-1"></i> Tambah Reservasi
    </a>
  </div>

  <!-- Filter Section -->
  <div class="filter-section">
    <div class="row">
      <div class="col-md-6">
        <div class="filter-group">
          <label class="filter-label">Filter by Status</label>
          <select class="form-select" id="statusFilter">
            <option value="" selected disabled>-- Pilih Status --</option>
            <option value="Menunggu">Menunggu</option>
            <option value="Selesai">Selesai</option>
            <option value="Batal">Batal</option>
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="filter-group">
          <label class="filter-label">Filter by Tanggal</label>
          <input type="date" class="form-control" id="dateFilter">
        </div>
      </div>
    </div>
    <div class="row mt-2">
      <div class="col-md-12 d-flex justify-content-end">
        <button id="resetFilters" class="btn btn-outline-secondary">
          <i class="bi bi-arrow-counterclockwise me-1"></i> Reset Filter
        </button>
      </div>
    </div>
  </div>

  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
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
        <?php if (empty($reservasi)): ?>
          <tr>
            <td colspan="8">
              <div class="empty-state">
                <i class="bi bi-calendar-x"></i>
                <h4>Tidak ada reservasi</h4>
                <p>Belum ada data reservasi yang tersedia</p>
                <a href="<?= base_url('/create') ?>" class="btn btn-success mt-2">
                  <i class="bi bi-plus-lg me-1"></i> Buat Reservasi Baru
                </a>
              </div>
            </td>
          </tr>
        <?php else: ?>
          <?php $i = 1; foreach ($reservasi as $r): ?>
          <tr class="reservation-row" 
              data-status="<?= esc($r['status']) ?>" 
              data-date="<?= esc($r['tanggal_reservasi']) ?>">
            <td class="fw-bold"><?= $i++ ?></td>
            <td class="fw-medium"><?= esc($r['nama_pelanggan']) ?></td>
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

            <td class="text-center action-buttons">
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
        <?php endif ?>
      </tbody>
    </table>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Filter functionality
    const statusFilter = document.getElementById('statusFilter');
    const dateFilter = document.getElementById('dateFilter');
    const resetFilters = document.getElementById('resetFilters');
    const reservationRows = document.querySelectorAll('.reservation-row');

    function applyFilters() {
      const statusValue = statusFilter.value;
      const dateValue = dateFilter.value;

      reservationRows.forEach(row => {
        const rowStatus = row.getAttribute('data-status');
        const rowDate = row.getAttribute('data-date');

        // Convert dates to comparable format
        const filterDate = dateValue ? new Date(dateValue).toISOString().split('T')[0] : null;
        const rowDateFormatted = rowDate ? new Date(rowDate).toISOString().split('T')[0] : null;

        const statusMatch = !statusValue || rowStatus === statusValue;
        const dateMatch = !dateValue || rowDateFormatted === filterDate;

        if (statusMatch && dateMatch) {
          row.style.display = '';
        } else {
          row.style.display = 'none';
        }
      });
    }

    // Event listeners for filters
    statusFilter.addEventListener('change', applyFilters);
    dateFilter.addEventListener('change', applyFilters);

    // Reset filters
    resetFilters.addEventListener('click', function() {
      statusFilter.value = '';
      dateFilter.value = '';
      applyFilters();
    });

    // Check if there are filter parameters in URL
    const urlParams = new URLSearchParams(window.location.search);
    const statusParam = urlParams.get('status');
    const dateParam = urlParams.get('date');

    if (statusParam) {
      statusFilter.value = statusParam;
    }
    if (dateParam) {
      dateFilter.value = dateParam;
    }

    // Apply filters on page load if parameters exist
    if (statusParam || dateParam) {
      applyFilters();
    }
  });

  <?php if ($status = session()->getFlashdata('status')): ?>
  document.addEventListener("DOMContentLoaded", function() {
    Swal.fire({
      title: 'Berhasil!',
      text: <?= json_encode($status) ?>,
      icon: 'success',
      confirmButtonColor: '#614DAC',
      timer: 3000,
      timerProgressBar: true,
      toast: true,
      position: 'top-end',
      showConfirmButton: false
    });
  });
  <?php endif; ?>
</script>
</body>
</html>