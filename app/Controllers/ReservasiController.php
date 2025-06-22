<?php

namespace App\Controllers;
use App\Models\ReservasiModel;
use App\Models\PelangganModel;
use App\Models\LayananModel;
use CodeIgniter\Validation\Validation;

class ReservasiController extends BaseController
{
    protected $pelangganModel;
    protected $layananModel;
    protected $reservasiModel;

    public function __construct()
    {
        $this->pelangganModel = new PelangganModel();
        $this->layananModel = new LayananModel();
        $this->reservasiModel = new ReservasiModel();
    }

    //  public function index()
    // {
    //     $tanggal = $this->request->getGet('tanggal');
        
    //     $query = $this->reservasiModel;

    //     if ($tanggal) {
    //         $query = $query->where('tanggal_reservasi', $tanggal);
    //     }

    //     $data['reservasi'] = $query->findAll();

    //     $data['tanggal'] = $tanggal;

    //     return view('dashboard', $data);
    // }




    // public function index()
    // {
    //     // Koneksi ke database
    //     $db = \Config\Database::connect();

    //     // Query builder untuk join reservasi dengan pelanggan
    //     $builder = $db->table('reservasi');
    //     $builder->select('
    //         reservasi.id_reservasi,
    //         reservasi.tanggal_reservasi,
    //         reservasi.jenis_layanan,
    //         reservasi.jam_reservasi,
    //         reservasi.status,
    //         pelanggan.nama_pelanggan
    //     ');
    //     $builder->join('pelanggan', 'pelanggan.id_pelanggan = reservasi.id_pelanggan');
    //     $builder->orderBy('reservasi.tanggal_reservasi', 'DESC');

    //     // Eksekusi dan ambil hasilnya
    //     $data['reservasi'] = $builder->get()->getResultArray();

    //     // Kirim ke view dashboard.php
    //     return view('dashboard', $data);
    // }


    public function index()
    {
        $db = \Config\Database::connect();

        $builder = $db->table('reservasi');
        $builder->select('
            reservasi.id_reservasi,
            reservasi.tanggal_reservasi,
            reservasi.jenis_layanan,
            reservasi.jam_reservasi,
            reservasi.status,
            pelanggan.nama_pelanggan,
            pelanggan.id_pelanggan,
            reservasi.id_layanan,
        ');
        $builder->join('pelanggan', 'pelanggan.id_pelanggan = reservasi.id_pelanggan');
        $builder->orderBy('reservasi.tanggal_reservasi', 'DESC');

        $reservasiData = $builder->get()->getResultArray();
        foreach ($reservasiData as &$row) {
            if (!empty($row['id_layanan'])) {
                $selectedLayananIds = json_decode($row['id_layanan'], true);
                if (is_array($selectedLayananIds)) {
                    $layananNames = [];
                    foreach ($selectedLayananIds as $layananId) {
                        $layananInfo = $this->layananModel->find($layananId);
                        if ($layananInfo) {
                            $layananNames[] = $layananInfo['nama_layanan'];
                        }
                    }
                    $row['nama_layanan'] = implode(', ', $layananNames);
                } else {
                    $row['nama_layanan'] = 'N/A';
                }
            } else {
                $row['nama_layanan'] = 'Tidak ada layanan';
            }
        }

        $data['reservasi'] = $reservasiData;

        return view('dashboard', $data);
    }

    public function create()
    {
        $data = [
            'pelanggan' => null,
            'layanan' => $this->layananModel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('reservasi_form', $data);
    }

    public function store()
    {
        // Validasi input
        $rules = [
            'nama_pelanggan' => 'required',
            'no_hp_pelanggan' => 'required',
            'kota_pelanggan' => 'required',
            'status_member' => 'required|in_list[0,1]',
            'tanggal_reservasi' => 'required',
            'jam_reservasi' => 'required',
            'jenis_layanan' => 'required',
            'tau_mamina_dari' => 'required',
            'id_layanan' => 'required',
            'id_layanan.*' => 'required|numeric|is_not_unique[layanan.id_layanan]'
        ];

        if (!$this->validate($rules)) {
            log_message('error', 'Validasi gagal: '.print_r($this->validator->getErrors(), true));
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $db = \Config\Database::connect();
        $db->transStart();

        try {
            // Proses pelanggan
            if ($this->request->getPost('id_pelanggan')) {
                // Pelanggan lama
                $id_pelanggan = $this->request->getPost('id_pelanggan');
                log_message('debug', 'Menggunakan pelanggan lama ID: '.$id_pelanggan);
            } else {
                // Data pelanggan baru
                $dataPelanggan = [
                    'nama_pelanggan'      => $this->request->getPost('nama_pelanggan'),
                    'nama_ortu_pelanggan' => $this->request->getPost('nama_ortu_pelanggan'),
                    'usia_pelanggan'      => $this->request->getPost('usia_pelanggan'),
                    'no_hp_pelanggan'     => '62'. $this->request->getPost('no_hp_pelanggan'),
                    'kota_pelanggan'      => $this->request->getPost('kota_pelanggan'),
                    'status_member'       => (int)$this->request->getPost('status_member')
                ];
                
                // Simpan pelanggan baru
                if (!$this->pelangganModel->save($dataPelanggan)) {
                    log_message('error', 'Gagal menyimpan pelanggan: '.print_r($this->pelangganModel->errors(), true));
                    throw new \RuntimeException('Gagal menyimpan data pelanggan');
                }
                
                $id_pelanggan = $this->pelangganModel->getInsertID();
                log_message('debug', 'Pelanggan baru berhasil disimpan dengan ID: '.$id_pelanggan);
            }

            // Data reservasi
            $selectedLayananIds = $this->request->getPost('id_layanan');
            $jsonLayanan = json_encode(array_values($selectedLayananIds));
            $dataReservasi = [
                'tanggal_reservasi' => $this->request->getPost('tanggal_reservasi'),
                'jenis_layanan'     => $this->request->getPost('jenis_layanan'),
                'tau_mamina_dari'   => $this->request->getPost('tau_mamina_dari'),
                'jam_reservasi'     => $this->request->getPost('jam_reservasi'),
                'status'            => 'Menunggu',
                'id_pelanggan'      => $id_pelanggan,
                'id_layanan'        => $jsonLayanan,
            ];
            
            // Simpan reservasi
            if (!$this->reservasiModel->save($dataReservasi)) {
                log_message('error', 'Gagal menyimpan reservasi: '.print_r($this->reservasiModel->errors(), true));
                throw new \RuntimeException('Gagal menyimpan data reservasi');
            }

            $db->transComplete();
            log_message('debug', 'Transaction berhasil diselesaikan');

            return redirect()->to(base_url('create'))->with('success', 'Reservasi berhasil ditambahkan.');

        } catch (\Exception $e) {
            $db->transRollback();
            log_message('error', 'Error: '.$e->getMessage());
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function cari_pelanggan()
    {
        $keyword = $this->request->getGet('keyword');
        
        $pelanggan = $this->pelangganModel->like('nama_pelanggan', $keyword)
            ->orLike('no_hp_pelanggan', $keyword)
            ->findAll();

        return $this->response->setJSON($pelanggan);
    }

    public function edit($id)
    {
        $db = \Config\Database::connect();

        $reservasi = $db->table('reservasi')->where('id_reservasi', $id)->get()->getRowArray();
        $pelanggan = $db->table('pelanggan')->get()->getResultArray();
        $layanan   = $db->table('layanan')->get()->getResultArray();

        if (!empty($reservasi['id_layanan'])) {
            $decodedLayanan = json_decode($reservasi['id_layanan'], true);
            $reservasi['id_layanan'] = is_array($decodedLayanan) ? $decodedLayanan : [];
        } else {
            $reservasi['id_layanan'] = [];
        }

        return view('edit_reservasi', [
            'reservasi' => $reservasi,
            'pelanggan' => $pelanggan,
            'layanan'   => $layanan,
            'validation' => \Config\Services::validation()
        ]);
    }


    public function update($id)
    {
        $rules = [
            'tanggal_reservasi' => 'required',
            'jam_reservasi' => 'required',
            'jenis_layanan' => 'required',
            'tau_mamina_dari' => 'required',
            'id_pelanggan' => 'required|numeric|is_not_unique[pelanggan.id_pelanggan]',
            'id_layanan' => 'required',
            'id_layanan.*' => 'required|numeric|is_not_unique[layanan.id_layanan]',
            'status' => 'required|in_list[Menunggu,Selesai,Batal]'
        ];

        if (!$this->validate($rules)) {
            log_message('error', 'Validasi gagal saat update: '.print_r($this->validator->getErrors(), true));
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $db = \Config\Database::connect();
        $db->transStart();

        try {
            $selectedLayananIds = $this->request->getPost('id_layanan');
            $jsonLayanan = json_encode(array_values($selectedLayananIds));
            $data = [
                'tanggal_reservasi' => $this->request->getPost('tanggal_reservasi'),
                'jenis_layanan'     => $this->request->getPost('jenis_layanan'),
                'jam_reservasi'     => $this->request->getPost('jam_reservasi'),
                'tau_mamina_dari'   => $this->request->getPost('tau_mamina_dari'),
                'id_pelanggan'      => $this->request->getPost('id_pelanggan'),
                'id_layanan'        => $jsonLayanan,
                'status'            => $this->request->getPost('status')
            ];

            $affectedRows = $db->table('reservasi')->update($data, ['id_reservasi' => $id]);

            if ($affectedRows === false) {
                $error = $db->error();
                log_message('error', 'Gagal update reservasi (DB Error): ' . $error['message']);
                throw new \RuntimeException('Terjadi kesalahan database saat memperbarui reservasi: ' . $error['message']);
            } else if ($affectedRows === 0) {
                $db->transComplete();
                log_message('debug', 'Reservasi tidak diperbarui karena tidak ada perubahan data. ID: ' . $id);
                return redirect()->back()->with('info', 'Tidak ada perubahan pada data reservasi.');
            } else {
                $db->transComplete();
                log_message('debug', 'Update reservasi berhasil. ID: ' . $id);
                return redirect()->back()->with('success', 'Reservasi berhasil diperbarui.');
            }

        } catch (\Exception $e) {
            $db->transRollback();
            log_message('error', 'Error saat update reservasi: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }
}