<?php

namespace App\Http\Controllers;

class AboutController extends Controller
{
    public function index()
    {
        $history = [
            'Gereja Baptis Indonesia Banyumanik didirikan pada tahun 1975 oleh sekelompok jemaat yang memiliki visi untuk mendirikan gereja di wilayah Banyumanik, Semarang. Dimulai dari pertemuan doa di rumah-rumah jemaat, gereja ini berkembang menjadi komunitas iman yang aktif dalam melayani Tuhan dan memberkati lingkungan sekitarnya.',
            'Sejak berdirinya, GBI Banyumanik konsisten mengadakan ibadah mingguan, sekolah minggu, persekutuan doa, dan berbagai kegiatan penginjilan serta pelayanan sosial. Gedung gereja yang berdiri di Jl. Raya Banyumanik ini telah menjadi saksi bisu perjalanan iman beratus-ratus jemaat selama lebih dari empat dekade.',
            'Saat ini, gereja dipimpin oleh Pdt. [Nama Pendeta] bersama Majelis Jemaat yang setia melayani. GBI Banyumanik terus berkomitmen untuk menjadi gereja yang berbasis Alkitab, berorientasi Misi, dan penuh kasih dalam melayani jemaat dan masyarakat.',
        ];

        $values = [
            ['title' => 'Berbasis Alkitab', 'desc' => 'Firman Tuhan menjadi fondasi setiap ajaran, keputusan, dan pelayanan kami.'],
            ['title' => 'Berorientasi Misi', 'desc' => 'Setia memberitakan Injil dan menjangkau lingkungan dengan kasih yang nyata.'],
            ['title' => 'Penuh Kasih', 'desc' => 'Setiap orang diterima sebagai keluarga, ditumbuhkan, dan diberdayakan.'],
        ];

        $vision = 'Menjadi gereja yang bertumbuh dalam kasih Kristus, setia pada Firman Tuhan, dan menjadi berkat bagi bangsa melalui pelayanan yang holistik.';

        $missions = [
            'Mengadakan ibadah yang memuliakan Tuhan dan membangun iman jemaat melalui pengajaran Firman yang setia pada Alkitab.',
            'Membina jemaat dalam ketaatan kepada Kristus melalui penggembalaan, pemuridan, dan persekutuan yang saling membangun.',
            'Melayani masyarakat sekitar dengan kasih Kristus melalui pelayanan sosial, penginjilan, dan advokasi keadilan.',
            'Mengembangkan generasi muda yang beriman, berbudi luhur, dan berani menjadi pengaruh positif di tengah masyarakat.',
            'Bekerja sama dengan gereja-gereja dan organisasi Kristen lainnya untuk memperluas Kerajaan Allah.',
        ];

        $leaders = [
            ['name' => 'Pdt. [Nama Pendeta]', 'role' => 'Pendeta Jemaat', 'period' => 'Melayani sejak 2020'],
            ['name' => '[Nama Ketua Majelis]', 'role' => 'Ketua Majelis', 'period' => 'Periode 2024-2026'],
            ['name' => '[Nama Sekretaris]', 'role' => 'Sekretaris Majelis', 'period' => 'Periode 2024-2026'],
            ['name' => '[Nama Bendahara]', 'role' => 'Bendahara Majelis', 'period' => 'Periode 2024-2026'],
        ];

        return view('about', compact('history', 'values', 'vision', 'missions', 'leaders'));
    }
}