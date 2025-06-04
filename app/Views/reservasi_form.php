<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Form Reservasi Baby Spa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@700&display=swap" rel="stylesheet">


    <style>
        :root {
            --primary: #614DAC;
            --accent: #D9584D;
            --light-bg: #FFFDEB;
            --light-blue: #B4EBE6;
            --light-pink: #EF9F9B;
        }
        
        body {
            background-color: var(--light-bg);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .card-header {
            font-size: 1.1rem;
            font-weight: 600;
        }
        
        .form-control:read-only {
            background-color: rgba(255, 253, 235, 0.5);
        }
        
        .ui-autocomplete {
            max-height: 200px;
            overflow-y: auto;
            overflow-x: hidden;
            background-color: white;
            border-radius: 0 0 5px 5px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .card-header.bg-primary {
            background-color: var(--primary) !important;
            color: white;
        }

        .btn-success {
            background-color: var(--accent);
            border-color: var(--accent);
        }
        
        .btn-success:hover {
            background-color: #c04a40;
            border-color: #c04a40;
        }

        .alert-success {
            background-color: var(--light-blue);
            border-color: var(--light-blue);
            color: #333;
        }
        
        .alert-danger {
            background-color: var(--light-pink);
            border-color: var(--light-pink);
            color: #333;
        }
   
        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(97, 77, 172, 0.25);
        }

        .custom-title {
            color: var(--primary);
            position: relative;
            display: inline-block;
            font-family: 'Roboto Slab', serif;
        }
        
        .custom-title:after {
            content: '';
            position: absolute;
            width: 60%;
            height: 3px;
            background-color: var(--accent);
            bottom: -8px;
            left: 20%;
            border-radius: 3px;
        }
        
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        .bi-calendar-check-fill, .bi-person-lines-fill, .bi-journal-bookmark-fill, .bi-save {
            color: var(--accent);
        }
        .logo-container {
            text-align: center;
            margin: 20px 0;
            padding: 10px;
        }

        .logo {
            height: 110px;
            width: auto;
            max-width: 100%;
            object-fit: contain;
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));
        }

        .form-label {
            display: block;
            text-align: left;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }

    </style>
    </head>
    <body>

    <div class="logo-container">
    <img src="<?= base_url('assets/logo_mamina.png') ?>" 
         alt="Mamina Baby Spa Logo" 
         class="logo">
    <div class="container my-2">
    <div class="text-center mb-3">
        <h2 class="custom-title"></i>Form Reservasi Baby Spa</h2>
    </div>

    < <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <script>
            setTimeout(function() {
                window.location.href = "<?= base_url('dashboard') ?>";
            }, 1000);
        </script>
    <?php endif; ?>

    <?php if (isset($errors)): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul class="mb-0">
            <?php foreach ($errors as $error): ?>
            <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('store') ?>" method="post" id="reservasiForm">
        <?= csrf_field() ?>
        <!-- Data Pelanggan -->
        <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <strong><i class="bi bi-person-lines-fill me-2 text-white"></i>Data Pelanggan</strong>
        </div>
        <div class="card-body" style="background-color: rgba(180, 235, 230, 0.2);">

            <?php if (isset($pelanggan) && $pelanggan): ?>
            <input type="hidden" name="id_pelanggan" value="<?= $pelanggan['id_pelanggan'] ?>">

            <div class="row">
                <div class="col-md-6 mb-3">
                <label class="form-label">Nama Anak</label>
                <input type="text" class="form-control" value="<?= esc($pelanggan['nama_pelanggan']) ?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                <label class="form-label">Nama Orang Tua</label>
                <input type="text" class="form-control" value="<?= esc($pelanggan['nama_ortu_pelanggan'] ?? '') ?>" readonly>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                <label class="form-label">Usia</label>
                <input type="text" class="form-control" value="<?= esc($pelanggan['usia_pelanggan'] ?? '') ?>" readonly>
                </div>
                <div class="col-md-4 mb-3">
                <label class="form-label">No HP</label>
                <input type="text" class="form-control" value="<?= esc($pelanggan['no_hp_pelanggan']) ?>" readonly>
                </div>
                <div class="col-md-4 mb-3">
                <label class="form-label">Kota</label>
                <input type="text" class="form-control" value="<?= esc($pelanggan['kota_pelanggan']) ?>" readonly>
                </div>
            </div>

            <?php else: ?>
            <div class="row">
                <div class="col-md-6 mb-3">
                <label class="form-label">Nama Anak</label>
                <input type="text" class="form-control <?= session('errors.nama_pelanggan') ? 'is-invalid' : '' ?>" 
                        name="nama_pelanggan" id="nama_pelanggan" placeholder="Nama lengkap" required
                        value="<?= old('nama_pelanggan') ?>">
                <?php if (session('errors.nama_pelanggan')): ?>
                    <div class="invalid-feedback"><?= session('errors.nama_pelanggan') ?></div>
                <?php endif; ?>
                <input type="hidden" name="id_pelanggan" id="id_pelanggan">
                </div>
                <div class="col-md-6 mb-3">
                <label class="form-label">Nama Orang Tua</label>
                <input type="text" class="form-control" name="nama_ortu_pelanggan" id="nama_ortu_pelanggan"
                        placeholder="Nama orang tua/wali" value="<?= old('nama_ortu_pelanggan') ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                <label class="form-label">Usia</label>
                <input type="text" class="form-control" name="usia_pelanggan" id="usia_pelanggan"
                        placeholder="Contoh: 6 Bulan" value="<?= old('usia_pelanggan') ?>">
                </div>
                <div class="col-md-4 mb-3">
                <label class="form-label">No HP</label>
                <input type="text" class="form-control <?= session('errors.no_hp_pelanggan') ? 'is-invalid' : '' ?>" 
                        name="no_hp_pelanggan" id="no_hp_pelanggan" placeholder="08xxxxxxxxxx" required
                        value="<?= old('no_hp_pelanggan') ?>">
                <?php if (session('errors.no_hp_pelanggan')): ?>
                    <div class="invalid-feedback"><?= session('errors.no_hp_pelanggan') ?></div>
                <?php endif; ?>
                </div>
                <div class="col-md-4 mb-3">
                <label class="form-label">Kota</label>
                <input type="text" class="form-control <?= session('errors.kota_pelanggan') ? 'is-invalid' : '' ?>" 
                        name="kota_pelanggan" id="kota_pelanggan" placeholder="Nama kota" required
                        value="<?= old('kota_pelanggan') ?>">
                <?php if (session('errors.kota_pelanggan')): ?>
                    <div class="invalid-feedback"><?= session('errors.kota_pelanggan') ?></div>
                <?php endif; ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                <label class="form-label">Status Member</label>
                <select class="form-select <?= session('errors.status_member') ? 'is-invalid' : '' ?>" 
                        name="status_member" id="status_member" required>
                    <option value="" disabled selected>-- Pilih Status --</option>
                    <option value="0" <?= old('status_member') == '0' ? 'selected' : '' ?>>Non Member</option>
                    <option value="1" <?= old('status_member') == '1' ? 'selected' : '' ?>>Member</option>
                </select>
                <?php if (session('errors.status_member')): ?>
                    <div class="invalid-feedback"><?= session('errors.status_member') ?></div>
                <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
        </div>

        <!-- Data Reservasi -->
        <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <strong><i class="bi bi-journal-bookmark-fill me-2 text-white"></i>Data Reservasi</strong>
        </div>
        <div class="card-body" style="background-color: rgba(180, 235, 230, 0.2);">
            <div class="row">
            <div class="col-md-6 mb-3">
                <label for="tanggal_reservasi" class="form-label">Tanggal Reservasi</label>
                <div class="input-group">
                    <input 
                        type="text" 
                        id="tanggal_reservasi"
                        name="tanggal_reservasi"
                        class="form-control <?= session('errors.tanggal_reservasi') ? 'is-invalid' : '' ?>" 
                        required 
                        value="<?= old('tanggal_reservasi') ?>"
                        placeholder="-- Pilih Tanggal Reservasi --"
                        style="background-color: white;">
                    <label for="tanggal_reservasi" class="input-group-text" style="background-color: white; cursor: pointer;">
                        <i class="fa-solid fa-calendar-days"></i>
                    </label>
                </div>
                <?php if (session('errors.tanggal_reservasi')): ?>
                    <div class="invalid-feedback d-block"><?= session('errors.tanggal_reservasi') ?></div>
                <?php endif; ?>
            </div>

            <div class="col-md-6 mb-3">
                <label for="jam_reservasi" class="form-label">Jam Reservasi</label>
                <div class="input-group">
                    <input 
                        type="text" 
                        id="jam_reservasi"
                        name="jam_reservasi"
                        class="form-control <?= session('errors.jam_reservasi') ? 'is-invalid' : '' ?>" 
                        required 
                        value="<?= old('jam_reservasi') ?>"
                        placeholder="-- Pilih Jam Reservasi --"
                        style="background-color: white;">
                    <label for="jam_reservasi" class="input-group-text" style="background-color: white; cursor: pointer;">
                        <i class="fa-solid fa-clock"></i>
                    </label>
                </div>
                <?php if (session('errors.jam_reservasi')): ?>
                    <div class="invalid-feedback d-block"><?= session('errors.jam_reservasi') ?></div>
                <?php endif; ?>
            </div>
            </div>

            <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Jenis Layanan</label>
                <select name="jenis_layanan" class="form-select <?= session('errors.jenis_layanan') ? 'is-invalid' : '' ?>" required>
                <option value="" disabled selected>-- Pilih Jenis Layanan --</option>
                <option value="Home Care" <?= old('jenis_layanan') == 'Home Care' ? 'selected' : '' ?>>Home Care</option>
                <option value="Outlet" <?= old('jenis_layanan') == 'Outlet' ? 'selected' : '' ?>>Outlet</option>
                </select>
                <?php if (session('errors.jenis_layanan')): ?>
                <div class="invalid-feedback"><?= session('errors.jenis_layanan') ?></div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Mengetahui Baby Spa Dari</label>
                <input type="text" class="form-control <?= session('errors.tau_mamina_dari') ? 'is-invalid' : '' ?>" 
                    name="tau_mamina_dari" placeholder="Contoh: Instagram, Teman, dsb" required
                    value="<?= old('tau_mamina_dari') ?>">
                <?php if (session('errors.tau_mamina_dari')): ?>
                <div class="invalid-feedback"><?= session('errors.tau_mamina_dari') ?></div>
                <?php endif; ?>
            </div>
            </div>

            <div class="mb-3">
            <label class="form-label">Pilih Layanan</label>
            <select name="id_layanan" class="form-select <?= session('errors.id_layanan') ? 'is-invalid' : '' ?>" required>
                <option value="" disabled selected>-- Pilih Layanan --</option>
                <?php foreach ($layanan as $l): ?>
                <option value="<?= $l['id_layanan'] ?>" <?= old('id_layanan') == $l['id_layanan'] ? 'selected' : '' ?>>
                    <?= esc($l['nama_layanan']) ?>
                </option>
                <?php endforeach; ?>
            </select>
            <?php if (session('errors.id_layanan')): ?>
                <div class="invalid-feedback"><?= session('errors.id_layanan') ?></div>
            <?php endif; ?>
            </div>
        </div>
        </div>
        <div class="d-flex justify-content-end gap-2">
            <a href="<?= base_url('dashboard') ?>" class="btn btn-success px-4 py-2 rounded-pill">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
            <button type="submit" class="btn btn-success px-4 py-2 rounded-pill">
                <i class="bi bi-save me-1 text-white"></i> Simpan Reservasi
            </button>
        </div>
    </form>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    $(function() {
        $("#nama_pelanggan").autocomplete({
            source: function(request, response) {
                $.getJSON("<?= base_url('cari_pelanggan') ?>", {
                    keyword: request.term
                }, function(data) {
                    response($.map(data, function(item) {
                        return {
                            label: item.nama_pelanggan + " (" + item.no_hp_pelanggan + ")",
                            value: item.nama_pelanggan,
                            data: item
                        };
                    }));
                });
            },
            minLength: 2,
            select: function(event, ui) {
                if (ui.item.data) {
                    // Isi data otomatis
                    $("#id_pelanggan").val(ui.item.data.id_pelanggan);
                    $("#nama_ortu_pelanggan").val(ui.item.data.nama_ortu_pelanggan || '');
                    $("#usia_pelanggan").val(ui.item.data.usia_pelanggan || '');
                    $("#no_hp_pelanggan").val(ui.item.data.no_hp_pelanggan);
                    $("#kota_pelanggan").val(ui.item.data.kota_pelanggan);
                    $("#status_member").val(ui.item.data.status_member);
                    $("[name='nama_ortu_pelanggan'], [name='usia_pelanggan'], [name='no_hp_pelanggan'], [name='kota_pelanggan']")
                        .prop('readonly', true).css('background-color', 'rgba(255, 253, 235, 0.5)');
                    $("[name='status_member']").prop('disabled', true).css('background-color', 'rgba(255, 253, 235, 0.5)');
                }
            }
        });

        $("#nama_pelanggan").on('input', function() {
            if ($(this).val() !== $("#nama_pelanggan").data('last-selected')) {
                $("#id_pelanggan").val('');
                $("[name='nama_ortu_pelanggan'], [name='usia_pelanggan'], [name='no_hp_pelanggan'], [name='kota_pelanggan'], [name='status_member']")
                    .val('')
                    .prop('readonly', false)
                    .css('background-color', '');
            }
        });
    });
    </script>

    <script>
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
    </script>

    </body>
</html>