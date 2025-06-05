<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pesan Broadcast</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- Font Awesome (untuk ikon jam) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Pesan Broadcast</h2>
    <form action="<?= base_url('broadcast/send/') ?>" method="post">
        <?= csrf_field() ?>

        <!-- Dropdown Nama Pelanggan -->
        <div class="mb-3">
            <label for="id_pelanggan" class="form-label">Nama Pelanggan</label>
            <select name="id_pelanggan" id="id_pelanggan" class="form-select" required>
                <option value="">-- Pilih Pelanggan --</option>
                <?php foreach ($pelanggan as $p): ?>
                    <option value="<?= $p['id_pelanggan'] ?>" data-nohp="<?= esc($p['no_hp_pelanggan']) ?>">
                        <?= esc($p['nama_pelanggan']) ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>

        <!-- Auto-filled Nomor HP -->
        <div class="mb-3">
            <label for="no_hp" class="form-label">No. HP</label>
            <input type="text" name="no_hp" id="no_hp" class="form-control" readonly required>
        </div>

        <!-- Pesan -->
        <div class="mb-3">
            <label for="pesan" class="form-label">Pesan</label>
            <textarea name="pesan" id="pesan" class="form-control" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Kirim</button>
        <a href="<?= base_url('dashboard') ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>

<!-- Bootstrap Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Flatpickr -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    document.getElementById('id_pelanggan').addEventListener('change', function () {
        const selected = this.options[this.selectedIndex];
        const phone = selected.getAttribute('data-nohp');
        const nama = selected.getAttribute('data-nama');

        document.getElementById('phone').value = phone || '';
        document.getElementById('nama_pelanggan').value = nama || '';
    });
</script>
</body>
</html>
