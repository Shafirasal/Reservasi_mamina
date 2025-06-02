<?php

namespace App\Controllers;
use App\Models\ReservasiModel;
use App\Models\PelangganModel;
use App\Models\LayananModel;

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
            'id_layanan' => 'required'
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
                    'no_hp_pelanggan'     => $this->request->getPost('no_hp_pelanggan'),
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
            $dataReservasi = [
                'tanggal_reservasi' => $this->request->getPost('tanggal_reservasi'),
                'jenis_layanan'     => $this->request->getPost('jenis_layanan'),
                'tau_mamina_dari'   => $this->request->getPost('tau_mamina_dari'),
                'jam_reservasi'     => $this->request->getPost('jam_reservasi'),
                'status'            => 'Menunggu',
                'id_pelanggan'      => $id_pelanggan,
                'id_layanan'        => $this->request->getPost('id_layanan'),
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
}