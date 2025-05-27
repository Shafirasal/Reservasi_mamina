<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ReservasiModel;

class ReservasiController extends BaseController
{
    protected $reservasiModel;

    public function __construct()
    {
        $this->reservasiModel = new ReservasiModel();
    }

    public function index()
    {
        $tanggal = $this->request->getGet('tanggal');
        
        $query = $this->reservasiModel;

        if ($tanggal) {
            $query = $query->where('tanggal_reservasi', $tanggal);
        }

        $data['reservasi'] = $query->findAll();
        $data['tanggal'] = $tanggal;

        return view('dashboard', $data);
    }

    public function create()
    {
        return view('reservasi_form');
    }

    public function store()
    {
        $data = [
            'tanggal_reservasi' => $this->request->getPost('tanggal_reservasi'),
            'jenis_layanan'     => $this->request->getPost('jenis_layanan'),
            'tau_mamina_dari'   => $this->request->getPost('tau_mamina_dari'),
            'jam_reservasi'     => $this->request->getPost('jam_reservasi'),
            'status'            => 'Menunggu',
            'id_pelanggan'      => $this->request->getPost('id_pelanggan'),
            'id_layanan'        => $this->request->getPost('id_layanan'),
            'id_ulasan'         => $this->request->getPost('id_ulasan'),
        ];

        $this->reservasiModel->insert($data);
        return redirect()->to('reservasi');
    }
}