<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PelangganModel;
use App\Models\ReservasiModel;

class BroadcastUlasanController extends BaseController
{
    public function kirim_ulasan($id_reservasi)
    {
        $reservasiModel = new ReservasiModel();
        $pelangganModel = new PelangganModel();

        // Ambil data reservasi
        $reservasi = $reservasiModel
            ->where('id_reservasi', $id_reservasi)
            ->where('status', 'Selesai') // hanya kirim ke reservasi selesai
            ->first();

        if (!$reservasi) {
           return redirect()->back()->with('status', 'Reservasi tidak ditemukan atau belum selesai.');
        }

        // Ambil data pelanggan
        $pelanggan = $pelangganModel->find($reservasi['id_pelanggan']);

        if (!$pelanggan) {
           return redirect()->back()->with('status', 'Pelanggan tidak ditemukan.');
        }

        $nama = $pelanggan['nama_pelanggan'];
        $no_hp = $pelanggan['no_hp_pelanggan']; // Pastikan kolom sesuai model

        $link_form = "http://localhost:8080/form-ulasan?id_reservasi=" . $id_reservasi; // Ganti dengan link form ulasan kamu

        $pesan = "🌸 Halo Ayah / Bunda 😊\n\n"
               . "Terima kasih sudah mempercayakan perawatan di Mamina Malang 💖\n"
               . "Kami mohon bantuannya untuk mengisi form ulasan ya, Bunda, supaya kami bisa terus memberikan pelayanan terbaik ke depannya ✨\n\n"
               . "📝 Link form ulasan: $link_form\n\n"
               . "Isi form-nya sebentar saja kok, nggak sampai 2 menit 🍃\n"
               . "Kami tunggu ya, Bunda 🥰\n"
               . "Terima kasih banyak atas waktunya 🙏🏻\n\n"
               . "Salam hangat,\n"
               . "-------------- \n" 
               . "MAMINA MALANG 🌷";

        $token = "GNZMk9TteQJj9ooLoPCuAF898KDaJTbeagVdNpvYDVsMOJq2SgHWSBXQsVHZ41kM.ULyzAU93";

        $payload = [
            "data" => [
                [
                    'phone' => $no_hp,
                    'message' => $pesan,
                    'isGroup' => false
                ]
            ]
        ];

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            "Authorization: $token",
            "Content-Type: application/json"
        ]);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($curl, CURLOPT_URL, "https://pati.wablas.com/api/v2/send-message");
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        $result = curl_exec($curl);
        curl_close($curl);
        // print_r($result);
        $response = json_decode($result, true);

        if (isset($response['status']) && $response['status'] === true) {
            return redirect()->back()->with('status', 'Broadcast ulasan berhasil dikirim.');
        } else {
            return redirect()->back()->with('status', 'Gagal mengirim broadcast ulasan.');
        }
    }
}
