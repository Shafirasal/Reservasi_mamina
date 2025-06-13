<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Ulasan Pelanggan</title>

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f8;
            padding: 20px;
            margin: 0;
        }

        .container {
            max-width: 700px;
            margin: auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .container img.logo {
            display: block;
            margin: 0 auto 20px auto;
            height: 80px;
        }

        h2 {
            text-align: center;
            color: rgb(240, 96, 144);
            font-size: 28px;
            font-weight: bold;
            text-transform: uppercase;
            position: relative;
            margin-bottom: 35px;
        }

        h2::after {
            content: '';
            display: block;
            width: 60px;
            height: 4px;
            background-color: rgb(240, 96, 144);
            margin: 10px auto 0 auto;
            border-radius: 2px;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: 600;
            color: #555;
        }

        input[type="text"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        .radio-group {
            display: flex;
            gap: 10px;
            margin-top: 6px;
        }

        .radio-group label {
            font-weight: normal;
            background: #e9ecef;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .radio-group input[type="radio"] {
            display: none;
        }

        .radio-group input[type="radio"]:checked + label {
            background-color: rgb(240, 96, 144);
            color: #fff;
        }

        button {
            margin-top: 25px;
            padding: 12px;
            background-color: rgb(240, 96, 144);
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            transition: background 0.3s;
        }

        button:hover {
            background-color: rgb(220, 76, 124);
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Logo -->
    <img src="<?= base_url('assets/logo_mamina.png') ?>" alt="Logo Mamina" class="logo">

    <!-- Judul -->
    <h2>Form Ulasan Pelanggan</h2>

    <!-- Notifikasi dengan SweetAlert jika sukses -->
    <?php if (session()->getFlashdata('success')): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '<?= session()->getFlashdata('success') ?>',
                confirmButtonColor: '#f06090',
                allowOutsideClick: false,
                allowEscapeKey: false
            });
        });
    </script>
    <?php endif; ?>

    <!-- Form -->
     <label> Nama Pelanggan </label>
    <form action="<?= base_url('simpan') ?>" method="post">
    <input type="text" value="<?= esc($nama_pelanggan) ?>" disabled>
    <input type="hidden" name="id_pelanggan" value="<?= esc($id_pelanggan) ?>">
    
    <label> Layanan </label>
   <?php
    $namaLayananGabung = implode(', ', array_column($layanan_list, 'nama_layanan'));
?>
<input type="text" value="<?= esc($namaLayananGabung) ?>" disabled>

<?php foreach ($layanan_list as $layanan): ?>
    <input type="hidden" name="id_layanan[]" value="<?= esc($layanan['id_layanan']) ?>">
<?php endforeach; ?>



        <!-- Hidden untuk ID penting -->
    <input type="hidden" name="id_pelanggan" value="<?= esc($id_pelanggan) ?>">
    <input type="hidden" name="id_reservasi" value="<?= esc($id_reservasi) ?>">


        <label>Kualitas Layanan (1 = Buruk, 5 = Sangat Baik)</label>
        <div class="radio-group">
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <input type="radio" name="kualitas_layanan" value="<?= $i ?>" id="kualitas_<?= $i ?>" required>
                <label for="kualitas_<?= $i ?>"><?= $i ?></label>
            <?php endfor; ?>
        </div>

        <label>Kenyamanan Fasilitas (1 = Tidak Nyaman, 5 = Sangat Nyaman)</label>
        <div class="radio-group">
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <input type="radio" name="kenyamanan_fasilitas" value="<?= $i ?>" id="fasilitas_<?= $i ?>" required>
                <label for="fasilitas_<?= $i ?>"><?= $i ?></label>
            <?php endfor; ?>
        </div>

        <label>Kesesuaian Harga (1 = Tidak Sesuai, 5 = Sangat Sesuai)</label>
        <div class="radio-group">
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <input type="radio" name="kesesuaian_harga" value="<?= $i ?>" id="harga_<?= $i ?>" required>
                <label for="harga_<?= $i ?>"><?= $i ?></label>
            <?php endfor; ?>
        </div>

        <label for="keinginan_layanan_tambahan">Keinginan Layanan Tambahan</label>
        <textarea name="keinginan_layanan_tambahan" id="keinginan_layanan_tambahan" rows="3"></textarea>

        <label for="ingin_dihubungi_promo">Ingin Dihubungi untuk Promo?</label>
        <select name="ingin_dihubungi_promo" id="ingin_dihubungi_promo" required>
            <option value="1">Ya</option>
            <option value="0">Tidak</option>
        </select>

        <button type="submit">Kirim Ulasan</button>
    </form>
</div>

</body>
</html>
