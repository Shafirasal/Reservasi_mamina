<?php

namespace App\Controllers;

use App\Models\UlasanModel;

class UlasanController extends BaseController
{
    public function index()
{
    $id_reservasi = $this->request->getGet('id_reservasi');

    if (!$id_reservasi) {
        return redirect()->to('/')->with('errors', ['Link tidak valid.']);
    }

    // Ambil data reservasi
    $db = \Config\Database::connect();
    $builder = $db->table('reservasi');
    $builder->select('reservasi.id_reservasi, reservasi.id_pelanggan, pelanggan.nama_pelanggan, reservasi.id_layanan');
    $builder->join('pelanggan', 'pelanggan.id_pelanggan = reservasi.id_pelanggan');
    $builder->where('reservasi.id_reservasi', $id_reservasi);
    $data = $builder->get()->getRow();

    if (!$data) {
        return redirect()->to('/')->with('status', ['Reservasi tidak ditemukan.']);
    }

    // Decode JSON array from id_layanan column
    $idLayananArray = json_decode($data->id_layanan, true); // will be ['1', '2', '3']

    if (!is_array($idLayananArray)) {
        return redirect()->to('/')->with('errors', ['Format data layanan tidak valid.']);
    }

    // Query layanan names based on decoded ids
    $layananBuilder = $db->table('layanan');
    $layananBuilder->select('id_layanan, nama_layanan');
    $layananBuilder->whereIn('id_layanan', $idLayananArray);
    $layananList = $layananBuilder->get()->getResultArray();

    return view('ulasan', [
        'id_reservasi'   => $data->id_reservasi,
        'id_pelanggan'   => $data->id_pelanggan,
        'nama_pelanggan' => $data->nama_pelanggan,
        'id_layanan'     => $idLayananArray,        // array of layanan IDs
        'layanan_list'   => $layananList,           // array of layanan info
        'validation'     => \Config\Services::validation(),
        'success'        => session()->getFlashdata('success'),
        'errors'         => session()->getFlashdata('errors'),
    ]);
}



    public function simpan()
    {
        $ulasanModel = new UlasanModel();

        // Validasi data
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id_reservasi' => 'required|numeric',
            'id_pelanggan' => 'required|numeric',
            //'id_layanan'   => 'required|numeric',
            'kualitas_layanan' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[5]',
            'kenyamanan_fasilitas' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[5]',
            'kesesuaian_harga' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[5]',
            'ingin_dihubungi_promo' => 'required|in_list[0,1]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Simpan data
        $ulasanModel->insert([
    'id_reservasi' => $this->request->getPost('id_reservasi'),
    'id_pelanggan' => $this->request->getPost('id_pelanggan'),
    'id_layanan'   => implode(',', $this->request->getPost('id_layanan')), // ✅ Convert array to string
    'kualitas_layanan' => $this->request->getPost('kualitas_layanan'),
    'kenyamanan_fasilitas' => $this->request->getPost('kenyamanan_fasilitas'),
    'kesesuaian_harga' => $this->request->getPost('kesesuaian_harga'),
    'keinginan_layanan_tambahan' => $this->request->getPost('keinginan_layanan_tambahan'),
    'ingin_dihubungi_promo' => $this->request->getPost('ingin_dihubungi_promo'),
    'created_at' => date('Y-m-d H:i:s')
]);


        return redirect()->to('/form-ulasan')->with('success', 'Terima kasih atas ulasan Anda!');
    }
}
