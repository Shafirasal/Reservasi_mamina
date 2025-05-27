<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Form Reservasi</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
  <div class="container my-4">
    <h2>Form Reservasi</h2>

    <form action="<?= base_url('reservasi/store') ?>" method="post">
      <?= csrf_field() ?>

      <div class="mb-3">
          <label for="tanggal_reservasi" class="form-label">Tanggal Reservasi</label>
          <input type="date" class="form-control" id="tanggal_reservasi" name="tanggal_reservasi" required>
      </div>

      <div class="mb-3">
          <label for="jenis_layanan" class="form-label">Jenis Layanan</label>
          <select class="form-select" id="jenis_layanan" name="jenis_layanan" required>
              <option value="" selected>Pilih Jenis Layanan</option>
              <option value="Home Care">Home Care</option>
              <option value="Outlet">Outlet</option>
          </select>
      </div>

      <div class="mb-3">
          <label for="tau_mamina_dari" class="form-label">Tau Mamina Dari</label>
          <input type="text" class="form-control" id="tau_mamina_dari" name="tau_mamina_dari" maxlength="20" required>
      </div>

      <div class="mb-3">
          <label for="jam_reservasi" class="form-label">Jam Reservasi</label>
          <input type="time" class="form-control" id="jam_reservasi" name="jam_reservasi" required>
      </div>

      <div class="mb-3">
          <label for="status" class="form-label">Status</label>
          <select class="form-select" id="status" name="status" required>
              <option value="Menunggu" selected>Menunggu</option>
              <option value="Selesai">Selesai</option>
              <option value="Batal">Batal</option>
          </select>
      </div>

      <div class="mb-3">
          <label for="id_pelanggan" class="form-label">ID Pelanggan</label>
          <input type="number" class="form-control" id="id_pelanggan" name="id_pelanggan" required>
      </div>

      <div class="mb-3">
          <label for="id_layanan" class="form-label">ID Layanan</label>
          <input type="number" class="form-control" id="id_layanan" name="id_layanan" required>
      </div>

      <div class="mb-3">
          <label for="id_ulasan" class="form-label">ID Ulasan</label>
          <input type="number" class="form-control" id="id_ulasan" name="id_ulasan">
      </div>

      <button type="submit" class="btn btn-primary">Simpan Reservasi</button>
    </form>
  </div>

  <!-- Bootstrap 5 JS Bundle (Optional, untuk fitur interaktif Bootstrap) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
