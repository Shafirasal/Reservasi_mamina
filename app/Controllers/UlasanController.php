<?php

namespace App\Controllers;

use App\Models\UlasanModel;

class UlasanController extends BaseController
{
    public function index()
    {
        return view('ulasan', [
            'validation' => \Config\Services::validation(),
            'success' => session()->getFlashdata('success'),
            'errors' => session()->getFlashdata('errors'),
        ]);
    }

    public function simpan()
    {
        $ulasanModel = new UlasanModel();

        // Validasi data
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id_pelanggan' => 'required',
            'id_layanan' => 'required',
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
            'id_pelanggan' => $this->request->getPost('id_pelanggan'),
            'id_layanan' => $this->request->getPost('id_layanan'),
            'kualitas_layanan' => $this->request->getPost('kualitas_layanan'),
            'kenyamanan_fasilitas' => $this->request->getPost('kenyamanan_fasilitas'),
            'kesesuaian_harga' => $this->request->getPost('kesesuaian_harga'),
            'keinginan_layanan_tambahan' => $this->request->getPost('keinginan_layanan_tambahan'),
            'ingin_dihubungi_promo' => $this->request->getPost('ingin_dihubungi_promo'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('index')->with('success', 'Terima kasih atas ulasan Anda!');
    }
}