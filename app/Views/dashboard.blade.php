<h2>Daftar Reservasi</h2>
<a href="<?= base_url('reservasi/create') ?>">+ Tambah Reservasi</a>

<form method="get">
  <input type="date" name="tanggal" value="<?= esc($tanggal) ?>">
  <button type="submit">Filter</button>
</form>

<table border="1">
  <thead>
    <tr>
      <th>Tanggal</th>
      <th>Jam</th>
      <th>Layanan</th>
      <th>Jenis</th>
      <th>Info</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($reservasi as $r): ?>
    <tr>
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
