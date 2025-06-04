<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Reservasi</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- Font Awesome (untuk ikon jam) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Reservasi</h2>
    <form action="<?= base_url('reservasi/update/' . $reservasi['id_reservasi']) ?>" method="post">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label for="tanggal_reservasi" class="form-label">Tanggal Reservasi</label>
            <input type="text" class="form-control" name="tanggal_reservasi" id="tanggal_reservasi" 
                   value="<?= esc($reservasi['tanggal_reservasi']) ?>" required>
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Jenis Layanan</label>
            <select name="jenis_layanan" class="form-select" required>
                <option value="" disabled>-- Pilih Jenis Layanan --</option>
                <option value="Home Care" <?= $reservasi['jenis_layanan'] == 'Home Care' ? 'selected' : '' ?>>Home Care</option>
                <option value="Outlet" <?= $reservasi['jenis_layanan'] == 'Outlet' ? 'selected' : '' ?>>Outlet</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="id_layanan" class="form-label">Layanan</label>
            <select name="id_layanan" class="form-select" required>
                <option value="" disabled>-- Pilih Layanan --</option>
                <?php foreach ($layanan as $l): ?>
                    <option value="<?= $l['id_layanan'] ?>" <?= $l['id_layanan'] == $reservasi['id_layanan'] ? 'selected' : '' ?>>
                        <?= esc($l['nama_layanan']) ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="col-md-6 mb-3">
            <label for="jam_reservasi" class="form-label">Jam Reservasi</label>
            <div class="input-group">
                <input 
                    type="text" 
                    id="jam_reservasi"
                    name="jam_reservasi"
                    class="form-control"
                    required 
                    value="<?= esc($reservasi['jam_reservasi']) ?>"
                    placeholder="-- Pilih Jam Reservasi --"
                    style="background-color: white;">
                <label for="jam_reservasi" class="input-group-text" style="background-color: white; cursor: pointer;">
                    <i class="fa-solid fa-clock"></i>
                </label>
            </div>
        </div>

        <div class="mb-3">
            <label for="id_pelanggan" class="form-label">Nama Pelanggan</label>
            <select name="id_pelanggan" class="form-select" required>
                <?php foreach ($pelanggan as $p): ?>
                    <option value="<?= $p['id_pelanggan'] ?>" <?= $p['id_pelanggan'] == $reservasi['id_pelanggan'] ? 'selected' : '' ?>>
                        <?= esc($p['nama_pelanggan']) ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="Menunggu" <?= $reservasi['status'] == 'Menunggu' ? 'selected' : '' ?>>Menunggu</option>
                <option value="Selesai" <?= $reservasi['status'] == 'Selesai' ? 'selected' : '' ?>>Selesai</option>
                <option value="Batal" <?= $reservasi['status'] == 'Batal' ? 'selected' : '' ?>>Batal</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="<?= base_url('dashboard') ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>

<!-- Bootstrap Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Flatpickr -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    // Inisialisasi setelah DOM siap
    document.addEventListener('DOMContentLoaded', function () {
        flatpickr("#tanggal_reservasi", {
            dateFormat: "Y-m-d",
            minDate: "today"
        });

        flatpickr("#jam_reservasi", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true,
            minTime: "08:00",
            maxTime: "19:00"
        });
    });
</script>
</body>
</html>
