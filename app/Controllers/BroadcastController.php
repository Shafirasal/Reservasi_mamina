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

    // Format tanggal dan jam
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
        '01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April',
        '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus',
        '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
    ];

    $dayName = $hari[date('l', $tanggalRaw)];
    $tgl = date('d', $tanggalRaw);
    $bulanName = $bulan[date('m', $tanggalRaw)];
    $tahun = date('Y', $tanggalRaw);
    $tanggal = "$dayName, tanggal $tgl $bulanName, $tahun";

    $nama = $pelanggan['nama_pelanggan'];
    $nama_bunda = $pelanggan['nama_ortu_pelanggan'];
    $no_hp =  $pelanggan['no_hp_pelanggan']; // Ensure number is numeric

    if($nama_bunda === null) {
        $pesan = "Halo Bunda {$nama} 😊 \n\n"
           . "Jangan lupa, ada treatment pada hari *{$tanggal}* di jam *{$jam}*. \n\n"
           . "Kami menginfokan jadwal treatment agar tidak terlambat dikarenakan keterlambatan akan mempengaruhi jadwal treatment selanjutnya. \n\n"
           . "Jika terdapat hal diluar kendali anda yang membuat terlambat, diharapkan konfirmasi 2 jam sebelum treatment nggih. \n\n"
           . "Jika cancel atau reschedule treatment, harap konfirmasi maksimal 1 hari sebelum tanggal treatment nggih. \n\n"
           . "Jika tidak ada konfirmasi, akan kami CANCEL setelah kami tunggu hingga 10 menit dari jam reservasi treatment 🙏🏻 \n\n"
           . "Terimakasih 🥰🙏🏻\n"
           . "-------------------\n"
           . "MAMINA MALANG";
    } else {
        $pesan = "Halo Bunda {$nama_bunda} 😊 \n\n"
           . "Jangan lupa, ada treatment untuk adik {$nama} pada hari *{$tanggal}* di jam *{$jam}*. \n\n"
           . "Kami menginfokan jadwal treatment agar tidak terlambat dikarenakan keterlambatan akan mempengaruhi jadwal treatment selanjutnya. \n\n"
           . "Jika terdapat hal diluar kendali anda yang membuat terlambat, diharapkan konfirmasi 2 jam sebelum treatment nggih. \n\n"
           . "Jika cancel atau reschedule treatment, harap konfirmasi maksimal 1 hari sebelum tanggal treatment nggih. \n\n"
           . "Jika tidak ada konfirmasi, akan kami CANCEL setelah kami tunggu hingga 10 menit dari jam reservasi treatment 🙏🏻 \n\n"
           . "Terimakasih 🥰🙏🏻\n"
           . "-------------------\n"
           . "MAMINA MALANG";
    }

    // Format pesan
    

    // API setup
    $curl = curl_init();
$token = "GNZMk9TteQJj9ooLoPCuAF898KDaJTbeagVdNpvYDVsMOJq2SgHWSBXQsVHZ41kM.ULyzAU93";
$random = true;
$payload = [
    "data" => [
        [
            'phone' => $no_hp,
            'message' => $pesan,
            'isGroup' => 'false'
        ]
    ]
];
curl_setopt($curl, CURLOPT_HTTPHEADER,
    array(
        "Authorization: $token",
        "Content-Type: application/json"
    )
);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($payload) );
curl_setopt($curl, CURLOPT_URL,  "https://pati.wablas.com/api/v2/send-message");
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

$result = curl_exec($curl);
curl_close($curl);

// Decode the result to check if it was successful
$response = json_decode($result, true);

if (isset($response['status']) && $response['status'] === true) {
    return redirect()->back()->with('status', 'Reminder berhasil dikirim.');
} else {
    return redirect()->back()->with('status', 'Gagal mengirim reminder.');
}
}



}
