<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PelangganModel;
use App\Models\ReservasiModel;

class BroadcastController extends BaseController
{
    public function index()
    {
        $pelanggan = new PelangganModel();
        $data = $pelanggan->findAll();
        return view('broadcast_form', [
            'pelanggan' => $data
        ]);
    }

    public function send($id)
    {
        

        $pelangganModel = new PelangganModel();
        $reservasiModel = new ReservasiModel();

        $pelanggan = $pelangganModel->find($id);
        $reservasi = $reservasiModel
                    ->where('id_pelanggan', $id)
                    ->orderBy('tanggal_reservasi', 'DESC')
                    ->first();
        if (!$reservasi || !$pelanggan) {
            return redirect()->back()->with('error', 'Data reservasi atau pelanggan tidak ditemukan.');
        }
        $tanggalRaw = strtotime($reservasi['tanggal_reservasi']);
        $jam = date('H:i', strtotime($reservasi['jam_reservasi']));
        $hari = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        ];

        $bulan = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        ];
        $dayName = $hari[date('l', $tanggalRaw)];
        $tgl = date('d', $tanggalRaw);
        $bulanName = $bulan[date('m', $tanggalRaw)];
        $tahun = date('Y', $tanggalRaw);

        $tanggal = "$dayName, tanggal $tgl $bulanName, $tahun";

        $nama = $pelanggan['nama_pelanggan'];
        $no_hp = $pelanggan['no_hp_pelanggan'];

        $pesan ="Halo Bunda 😊 \n\n
                Jangan lupa, bunda ada treatment pada hari {$tanggal} di jam {$jam}. \n
                Kami menginfokan bunda agar tidak terlambat dikarenakan akan mempengaruhi jadwal treatment selanjutnya. \n
                Jika terdapat hal diluar kendali bunda yang membuat terlambat, diharapkan konfirmasi 2 jam sebelum treatment nggih. \n
                Jika cancel atau reschedule treatment, harap konfirmasi maksimal 1 hari sebelum tanggal treatment nggih. \n
                Jika tidak ada konfirmasi dari bunda akan kami CANCEL setelah kami tunggu hingga 10 menit dari jam reservasi treatment 🙏🏻 \n
                Terimakasih Bunda 🥰🙏🏻\n
                -------------------
                MAMINA MALANG";
        // fungsi sementara 
        header("Content-Type: text/plain");
        echo "Nama: $nama\n";
        echo "No. HP: $no_hp\n";
        echo "Pesan:\n$pesan";
        // === Send to API === 
        //$apiUrl = 'https://example.com/api/send-message'; // Replace with your API provider URL
        //$apiKey = 'YOUR_API_KEY_HERE'; // Replace with your actual API key
//
        //$payload = [
        //    'phone' => $no_hp,
        //    'message' => $pesan,
        //];
//
        //$client = \Config\Services::curlrequest();
        //try {
        //    $response = $client->post($apiUrl, [
        //        'headers' => [
        //            'Authorization' => $apiKey,
        //            'Content-Type'  => 'application/json',
        //        ],
        //        'body' => json_encode($payload),
        //    ]);
//
        //    $responseData = json_decode($response->getBody(), true);
        //    if (isset($responseData['status']) && $responseData['status'] === 'success') {
        //        return redirect()->back()->with('success', 'Reminder berhasil dikirim.');
        //    } else {
        //        return redirect()->back()->with('error', 'Gagal mengirim reminder.');
        //    }
        //} catch (\Exception $e) {
        //    log_message('error', 'API error: ' . $e->getMessage());
        //    return redirect()->back()->with('error', 'Terjadi kesalahan saat mengirim reminder.');
        //}
            exit;
            return redirect()->to('/')->with('success', 'Reminder berhasil dikirim.');
        }
}
