<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Reservasi Baby Spa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" /> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

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
            font-family: 'Poppins', sans-serif;
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

        .btn-success:disabled,
        .btn-success[disabled] {
            background-color: #c04a40 !important;
            border-color: #c04a40 !important; 
            color: white !important;
            cursor: not-allowed;
            opacity: 0.6;
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
            font-family: 'Poppins', sans-serif;
            font-size: 2.0rem;
            font-weight: 600; 
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
        <h2 class="custom-title"></i>Edit Data Reservasi Baby Spa</h2>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: 'Berhasil!',
                    text: <?= json_encode(session()->getFlashdata('success')) ?>,
                    icon: 'success',
                    confirmButtonColor: '#614DAC',
                    timer: 1400,
                    timerProgressBar: true,
                    position: 'center',
                    showConfirmButton: false
                }).then((result) => {
                    window.location.href = "<?= base_url('dashboard') ?>";
                });
            });
        </script>
    <?php endif; ?>

    <?php if (isset($errors)): ?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var errorHtml = '<ul>';
                <?php foreach ($errors as $error): ?>
                    errorHtml += '<li><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></li>';
                <?php endforeach; ?>
                errorHtml += '</ul>';

                Swal.fire({
                    title: 'Terjadi Kesalahan!',
                    html: errorHtml,
                    icon: 'error',
                    confirmButtonColor: '#614DAC',
                    position: 'center',
                    showConfirmButton: true
                });
            });
        </script>
    <?php endif; ?>

    <form action="<?= base_url('reservasi/update/' . $reservasi['id_reservasi']) ?>" method="post">
        <?= csrf_field() ?>
            <!-- Data Pelanggan -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <strong><i class="bi bi-person-lines-fill me-2 text-white"></i>Data Pelanggan</strong>
                </div>
                <div class="card-body" style="background-color: rgba(180, 235, 230, 0.2);">
                    <?php 
                    $selectedPelanggan = null;
                    foreach ($pelanggan as $p) {
                        if ($p['id_pelanggan'] == $reservasi['id_pelanggan']) {
                            $selectedPelanggan = $p;
                            break;
                        }
                    }
                    ?>
                <input type="hidden" name="id_pelanggan" value="<?= esc($reservasi['id_pelanggan']) ?>">
            
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama Pelanggan/Anak</label>
                            <input type="text" class="form-control" 
                                value="<?= esc($selectedPelanggan['nama_pelanggan'] ?? '') ?>" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama Orang Tua</label>
                            <input type="text" class="form-control" 
                                value="<?= esc($selectedPelanggan['nama_ortu_pelanggan'] ?? '') ?>" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Usia</label>
                            <input type="text" class="form-control" 
                                value="<?= esc($selectedPelanggan['usia_pelanggan'] ?? '') ?>" readonly>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">No HP</label>
                            <input type="text" class="form-control" 
                                value="<?= esc($selectedPelanggan['no_hp_pelanggan'] ?? '') ?>" readonly>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Kota</label>
                            <input type="text" class="form-control" 
                                value="<?= esc($selectedPelanggan['kota_pelanggan'] ?? '') ?>" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Status Member</label>
                            <input type="text" class="form-control" 
                                value="<?= $selectedPelanggan['status_member'] == 1 ? 'Member' : 'Non Member' ?>" readonly>
                        </div>
                    </div>
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
                                    class="form-control" 
                                    required 
                                    value="<?= esc($reservasi['tanggal_reservasi']) ?>"
                                    placeholder="-- Pilih Tanggal Reservasi --"
                                    style="background-color: white;">
                                <label for="tanggal_reservasi" class="input-group-text" style="background-color: white; cursor: pointer;">
                                    <i class="fa-solid fa-calendar-days"></i>
                                </label>
                            </div>
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
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jenis Layanan</label>
                            <select name="jenis_layanan" class="form-select" required>
                                <option value="" disabled>-- Pilih Jenis Layanan --</option>
                                <option value="Home Care" <?= $reservasi['jenis_layanan'] == 'Home Care' ? 'selected' : '' ?>>Home Care</option>
                                <option value="Outlet" <?= $reservasi['jenis_layanan'] == 'Outlet' ? 'selected' : '' ?>>Outlet</option>
                            </select>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Mengetahui Baby Spa Dari</label>
                            <input type="text" class="form-control" 
                                name="tau_mamina_dari" placeholder="Contoh: Instagram, Teman, dsb" required
                                value="<?= esc($reservasi['tau_mamina_dari'] ?? '') ?>">
                            <?php if (session('errors.tau_mamina_dari')): ?>
                                <div class="invalid-feedback d-block"><?= session('errors.tau_mamina_dari') ?></div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Status Reservasi</label>
                            <select name="status" class="form-select" required>
                                <option value="Menunggu" <?= $reservasi['status'] == 'Menunggu' ? 'selected' : '' ?>>Menunggu</option>
                                <option value="Selesai" <?= $reservasi['status'] == 'Selesai' ? 'selected' : '' ?>>Selesai</option>
                                <option value="Batal" <?= $reservasi['status'] == 'Batal' ? 'selected' : '' ?>>Batal</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <label class="form-label mb-0">Pilih Layanan</label>
                            <button type="button" id="add-layanan-edit" class="btn btn-sm" style="background-color: #614DAC; border-color: #614DAC; color: #fff;">
                                <i class="bi bi-plus-circle"></i>
                            </button>
                        </div>

                        <div id="layanan-container-edit">
                            <?php
                                $selectedLayananIds = $reservasi['id_layanan'];

                                if (empty($selectedLayananIds)):
                            ?>
                                <div class="input-group mb-3 layanan-item-edit">
                                    <select name="id_layanan[]" class="form-select layanan-select-edit <?= session('errors.id_layanan') ? 'is-invalid' : '' ?>" required>
                                        <option value="" disabled selected>-- Pilih Layanan --</option>
                                        <?php foreach ($layanan as $l): ?>
                                            <option value="<?= $l['id_layanan'] ?>">
                                                <?= esc($l['nama_layanan']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <button type="button" class="btn btn-outline-danger remove-layanan-edit" style="display:none;"><i class="bi bi-dash-circle"></i></button>
                                </div>
                            <?php
                                else:
                                    foreach ($selectedLayananIds as $index => $selectedId):
                            ?>
                                <div class="input-group mb-3 layanan-item-edit">
                                    <select name="id_layanan[]" class="form-select layanan-select-edit <?= isset(session('errors')['id_layanan.' . $index]) ? 'is-invalid' : '' ?>" required>
                                        <option value="" disabled>-- Pilih Layanan --</option>
                                        <?php foreach ($layanan as $l): ?>
                                            <option value="<?= $l['id_layanan'] ?>" <?= $selectedId == $l['id_layanan'] ? 'selected' : '' ?>>
                                                <?= esc($l['nama_layanan']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <button type="button" class="btn btn-outline-danger remove-layanan-edit" <?= (count($selectedLayananIds) === 1) ? 'style="display:none;"' : '' ?>><i class="bi bi-dash-circle"></i></button>
                                </div>
                                <?php if (isset(session('errors')['id_layanan.' . $index])): ?>
                                    <div class="invalid-feedback d-block"><?= session('errors')['id_layanan.' . $index] ?></div>
                                <?php endif; ?>
                            <?php
                                    endforeach;
                                endif;
                            ?>
                        </div>
                        <?php if (session('errors.id_layanan') && !is_array(session('errors.id_layanan'))): ?>
                            <div class="invalid-feedback d-block"><?= session('errors.id_layanan') ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <div class="d-flex justify-content-end gap-2">
                <a href="<?= base_url('dashboard') ?>" class="btn btn-success px-4 py-2 rounded-pill">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
                <button type="submit" class="btn btn-success px-4 py-2 rounded-pill" id="submitButton" disabled>
                    <i class="bi bi-save me-1 text-white"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

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

    $(document).ready(function() {
        var initialFormState = {};
        var initialLayananState = [];

        function getCurrentLayananState() {
            var currentLayanan = [];
            $('.layanan-select-edit').each(function() {
                currentLayanan.push($(this).val());
            });
            return currentLayanan.sort(); 
        }

        initialFormState['tanggal_reservasi'] = $('#tanggal_reservasi').val();
        initialFormState['jam_reservasi'] = $('#jam_reservasi').val();
        initialFormState['jenis_layanan'] = $('[name="jenis_layanan"]').val();
        initialFormState['status'] = $('[name="status"]').val();
        initialFormState['tau_mamina_dari'] = $('[name="tau_mamina_dari"]').val();
        
        initialLayananState = getCurrentLayananState();

        console.log("Initial Form State (Simple Fields):", initialFormState);
        console.log("Initial Layanan State (Array):", initialLayananState);

        var submitButton = $('#submitButton');
        submitButton.prop('disabled', true); 
        function checkFormChanges() {
            var hasChanges = false;
            for (var fieldName in initialFormState) {
                if (initialFormState.hasOwnProperty(fieldName)) {
                    var currentValue = $('[name="' + fieldName + '"]').val();
                    if (String(initialFormState[fieldName]) !== String(currentValue)) {
                        hasChanges = true;
                        console.log("Perubahan terdeteksi pada field:", fieldName, "Nilai Awal:", initialFormState[fieldName], "Nilai Sekarang:", currentValue);
                        break;
                    }
                }
            }
            if (!hasChanges) {
                var currentLayanan = getCurrentLayananState();
                console.log("Current Layanan State (for comparison):", currentLayanan);

                if (initialLayananState.length !== currentLayanan.length) {
                    hasChanges = true;
                    console.log("Perubahan terdeteksi: Jumlah layanan berbeda. Awal:", initialLayananState.length, "Sekarang:", currentLayanan.length);
                } else {
                    for (var i = 0; i < initialLayananState.length; i++) {
                        if (String(initialLayananState[i]) !== String(currentLayanan[i])) {
                            hasChanges = true;
                            console.log("Perubahan terdeteksi: Nilai layanan di indeks " + i + " berbeda. Awal:", initialLayananState[i], "Sekarang:", currentLayanan[i]);
                            break; 
                        }
                    }
                }
            }
            
            submitButton.prop('disabled', !hasChanges);
            console.log("Tombol Simpan dinonaktifkan:", !hasChanges);
        }

        $('#tanggal_reservasi, #jam_reservasi, [name="jenis_layanan"], [name="status"], [name="tau_mamina_dari"]').on('input change', checkFormChanges);

        $('#add-layanan-edit').on('click', function() {
            var layananOptions = `
                <?php foreach ($layanan as $l): ?>
                    <option value="<?= $l['id_layanan'] ?>">
                        <?= esc($l['nama_layanan']) ?>
                    </option>
                <?php endforeach; ?>
            `;
            var newRow = `
                <div class="input-group mb-3 layanan-item-edit">
                    <select name="id_layanan[]" class="form-select layanan-select-edit" required>
                        <option value="" disabled selected>-- Pilih Layanan --</option>
                        ${layananOptions}
                    </select>
                    <button type="button" class="btn btn-outline-danger remove-layanan-edit"><i class="bi bi-dash-circle"></i></button>
                </div>
            `;
            $('#layanan-container-edit').append(newRow);
            updateRemoveButtons();
            checkFormChanges(); 
        });
        $('#layanan-container-edit').on('click', '.remove-layanan-edit', function() {
            $(this).closest('.layanan-item-edit').remove();
            updateRemoveButtons();
            checkFormChanges(); 
        });

        $('#layanan-container-edit').on('change', '.layanan-select-edit', checkFormChanges);

        function updateRemoveButtons() {
            var layananItems = $('.layanan-item-edit');
            if (layananItems.length === 1) {
                layananItems.find('.remove-layanan-edit').hide();
            } else {
                layananItems.find('.remove-layanan-edit').show();
            }
        }
        updateRemoveButtons();
        checkFormChanges(); 
    });
    </script>

    </body>
</html>