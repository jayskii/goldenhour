<?php


namespace App\Components;


class Referensi
{

    public static function findArrayJenisPegawaiId()
    {
        return [
            '1' => 'PNS Pusat yang bekerja pada Departemen/Lembaga',
            '2' => 'PNS Pusat DPB pada Instansi lain',
            '3' => 'PNS Pusat DPK pada Instansi lain',
            '4' => 'PNS Pusat DPB pada Pemerintah Propinsi',
            '5' => 'PNS Pusat DPK pada Pemerintah Propinsi',
            '6' => 'PNS Pusat DPB pada Pemerintah Kabupaten/Kota',
            '7' => 'PNS Pusat DPK pada Pemerintah Kabupaten/Kota',
            '8' => 'PNS Pusat DPB pada BUMN/Badan lain',
            '9' => 'PNS Pusat DPK pada BUMN/Badan lain',
            '10' => 'PNS Daerah Propinsi yang bekerja pada Propinsi',
            '11' => 'PNS Daerah Propinsi DPB pada Instansi lain',
            '12' => 'PNS Daerah Propinsi DPK pada Instansi lain',
            '13' => 'PNS Daerah Propinsi DPB pada BUMN/BUMD',
            '14' => 'PNS Daerah Propinsi DPK pada BUMN/BUMD',
            '15' => 'PNS Daerah Kab./Kota yang bekerja pada Kab./Kota',
            '16' => 'PNS Daerah Kab./Kota DPB pada Instansi lain',
            '17' => 'PNS Daerah Kab./Kota DPK pada Instansi lain',
            '18' => 'PNS Daerah Kab./Kota DPB pada BUMN/BUMD',
            '19' => 'PNS Daerah Kab./Kota DPK pada BUMN/BUMD',
        ];
    }

    public static function findArrayJenisKawinId()
    {
        return [
            '1' => 'Menikah',
            '2' => 'Cerai',
            '3' => 'Janda / Duda',
            '4' => 'Belum Kawin'
        ];
    }

    public static function findArrayKedudukanHukumId()
    {
        return [
            '1' => 'Aktif',
            '2' => 'CLTN',
            '3' => 'Tugas Belajar',
            '4' => 'Pemberhentian Sementara',
            '5' => 'Penerima Uang Tunggu',
            '6' => 'Prajurit Wajib',
            '7' => 'Pejabat Negara',
            '8' => 'Kepala Desa',
            '9' => 'Sedang dlm Proses Banding BAPEK',
            '11' =>	'Pegawai Titipan',
            '12' =>	'Pengungsi',
            '13' =>	'Perpanjangan CLTN',
            '14' =>	'PNS yang dinyatakan hilang',
            '15' =>	'PNS kena hukuman disiplin',
            '16' =>	'Pemindahan dalam rangka penurunan Jabatan',
            '20' =>	'Masa Persiapan Pensiun',
            '51' =>	'CPNS yang belum menerima SK CPNS',
            '52' =>	'Tidak Aktif',
            '66' =>	'Diberhentikan',
            '67' =>	'Punah',
            '68' =>	'Eks PNS Timor Timur',
            '69' =>	'TMS Dari Pengadaan',
            '70' =>	'Pembatalan NIP',
            '77' =>	'Pemberhentian tanpa hak pensiun',
            '88' =>	'Pemberhentian dengan hak pensiun',
            '89' =>	'Tidak aktif tetapi diusulkan Pensiun',
            '90' =>	'Tidak Ikut PUPNS 2015',
            '91' =>	'Tindak Pidana/ Tindak Pidana Jabatan',
            '92' =>	'Pemblokiran Data PNS',
            '98' =>	'Mencapai BUP',
            '99' =>	'Pensiun',
        ];
    }

    public static function findArrayEselonId()
    {
        return [
            '10' => 'I.a - JPT UTAMA',
            '11' => 'I.a - JPT MADYA',
            '12' => 'I.b - JPT MADYA',
            '21' => 'II.a - JPT PRATAMA',
            '22' => 'II.b - JPT PRATAMA',
            '31' => 'III.a - ADMINISTRATOR',
            '32' => 'III.b - ADMINISTRATOR',
            '41' => 'IV.a - PENGAWAS',
            '42' => 'IV.b - PENGAWAS',
            '51' =>	'V.a',
            '52' => 'V.b',
            '99' =>	'NON'
        ];
    }

    public static function findArrayAgamaId()
    {
        return [
            '1' => 'Islam',
            '2' => 'Kristen',
            '3' => 'Katholik',
            '4' => 'Hindu',
            '5' => 'Budha',
            '6' => 'Konghucu',
            '7' => 'Lainnya',
        ];
    }

    public static function findArrayGolonganId()
    {
        return [
            '11' => 'I/a - Juru Muda',
            '12' => 'I/b - Juru Muda Tingkat I',
            '13' => 'I/c - Juru',
            '14' => 'I/d - Juru Tingkat I',
            '21' => 'II/a - Pengatur Muda',
            '22' => 'II/b - Pengatur Muda Tingkat I',
            '23' => 'II/c - Pengatur',
            '24' => 'II/d - Pengatur Tingkat I',
            '31' => 'III/a - Penata Muda',
            '32' => 'III/b - Penata Muda Tingkat I',
            '33' => 'III/c - Penata',
            '34' => 'III/d - Penata Tingkat I',
            '41' => 'IV/a - Pembina',
            '42' => 'IV/b - Pembina Tingkat I',
            '43' => 'IV/c - Pembina Utama Muda',
            '44' => 'IV/d - Pembina Utama Madya',
            '45' => 'IV/e - Pembina Utama',
        ];
    }

    public static function findArrayJenisJabatanId()
    {
        return [
            '1' => 'Jabatan Struktural',
            '2' => 'Jabatan Fungsional Tertentu',
            '3' => 'Jabatan Rangkap (Struktural dan Fungsional)',
            '4' => 'Jabatan Fungsional Umum',
        ];
    }

    public static function findArrayJenisPengadaanId()
    {
        return [
            '1' => 'UMUM',
            '2' => 'HONORER',
            '3' => 'SEKDES',
            '4' => 'ALIH STATUS',
            '5' => 'KHUSUS DOKTER',
            '6' => 'TENAGA AHLI TERTENTU/KHUSUS',
            '7' => 'KHUSUS SM-3T',
            '8' => 'KHUSUS DISABILITAS',
            '9' => 'KHUSUS PUTRA PUTRI TERBAIK',
            'A' => 'D1 STAN',
            'B' => 'DIASPORA',
            'C' => 'PPPK',
            'D' => 'GURU GARIS DEPAN',
            'G' => 'TENAGA GURU',
            'I' => 'IKATAN DINAS',
            'K' => 'PTT KEMENKES',
            'L' => 'THLTB PENYULUH PERTANIAN',
            'O' => 'UNTUK OLAHRAGAWAN BERPRESTASI DAN PELATIH BERPRESTASI',
            'P' => 'KHUSUS PUTRA/I PAPUA',
            'S' => 'STTD KEMENTRIAN PERHUBUNGAN',
        ];
    }

    public static function findArrayJenisKelamin()
    {
        return [
            1 => 'Laki-Laki',
            2 => 'Perempuan'
        ];
    }

    public static function findArrayGolonganDarah()
    {
        return [
            1 => 'O',
            2 => 'A',
            3 => 'AB',
            4 => 'B'
        ];
    }

    public static function findArrayJenisKpId()
    {
        return [
            '101' => 'Reguler',
            '201' => 'Pilihan  (Jabatan Struktural)',
            '202' => 'Pilihan  (Jabatan Fungsional Tertentu)',
            '203' => 'Pilihan  (Penyesuaian Ijazah)',
            '204' => 'Pilihan  (Sedang Melaksanakan Tugas Belajar)',
            '205' => 'Pilihan  (Setelah Selesai Tugas Belajar)',
            '206' => 'Pilihan  (Diperbantukan/Diperkerjakan Instansi Lain)',
            '207' => 'Pilihan  (Penemuan Baru)',
            '208' => 'Pilihan  (Prestasi Luar Biasa)',
            '209' => 'Pilihan  (Pejabat Negara)',
            '210' => 'Pilihan  (Selama DPK/DPB)',
            '211' => 'Gol. dari Pengadaan CPNS/PNS',
        ];
    }

    public static function findArrayCltnId()
    {
        return [
            '1' => 'CLTN',
            '2' => 'Prajurit Wajib',
            '3' => 'Pengaktifan kembali dari CLTN',
            '4' => 'Pengaktifan kembali dari Prajurit Wajib',
            '5' => 'Perpanjangan CLTN',
            '6' => 'Tugas Belajar',
            '7' => 'Perpanjangan Tugas Belajar',
            '8' => 'Pengaktifan dari Tugas Belajar',
            '9' => 'Pejabat Negara',
            '10' => 'Kepala Desa',
            '11' => 'Pengaktifan kembali Pejabat Negara',
            '12' => 'Pengaktifan kembali Kepala Desa',
        ];
    }

    public static function findArrayJenisHukumanId()
    {
        return [
            '1' => 'TEGURAN LISAN',
            '2' => 'TEGURAN TERTULIS',
            '3' => 'PERNYATAAN TIDAK PUAS SECARA TERTULIS',
            '4' => 'PENUNDAAN KGB SELAMA 1 THN',
            '5' => 'PENURUNAN GAJI MAX 1 TH',
            '6' => 'PENUNDAAN GAJI MAX 1 THN',
            '7' => 'PENUNDAAN KP SELAMA 1 THN',
            '8' => 'PENURUNAN PANGKAT 1 TINGKAT 1 THN',
            '9' => 'PEMBEBASAN DARI JABATAN',
            '10' => 'PEMBERHENTIAN DENGAN HORMAT TIDAK ATAS PERMINTAAN SENDIRI',
            '11' => 'PEMBERHENTIAN TIDAK DENGAN HORMAT SEBAGAI PNS',
            '12' => 'PENGAKTIFAN HUKUMAN DISIPLIN',
            '13' => 'PEMINDAHAN DLM RANGKA PENURUNAN JABATAN 1 TINGKAT',
            '14' => 'PENURUNAN PANGKAT 1 TINGKAT 3 THN',
        ];
    }
    public static function findArrayJenisKursusSertifikat()
    {
        return [
            '1' => 'KURIKULUM',
            '2' => 'KELOMPOK KERJA GURU',
            '3' => 'KEPEMIMPINAN DAN SUMBER DAYA MANUSIA',
        ];
    }
     public static function findArrayLatihanStrukturalId()
    {
        return [
            '1' => 'SEPADA',
            '2' => 'SEPALA/ADUM/DIKLAT PIM TK.IV',
            '3' => 'SEPADYA/SPAMA/DIKLAT PIM TK. III',
            '4' => 'SPAMEN/SESPA/SESPANAS/DIKLAT PIM TK. II',
            '5' => 'SEPATI/DIKLAT PIM TK. I',
            '6' => 'SESPIM',
            '7' => 'SESPATI',
            '8' => 'Diklat Struktural Lainnya',
        ];
    }

    public static function findArrayHargaId()
    {
        return [
            '100' => 'BINTANG',
            '101' => 'R.I ADIPURNA',
            '102' => 'R.I ADIPRADANA',
            '103' => 'R.I  UTAMA',
            '104' => 'R.I  PRATAMA',
            '105' => 'R.I  NARARYA',
            '106' => 'MAHAPUTERA ADIPURNA',
            '107' => 'MAHAPUTERA ADIPRADANA',
            '108' => 'MAHAPUTERA UTAMA',
            '109' => 'MAHAPUTERA PRATAMA',
            '110' => 'MAHAPUTERA NARARYA',
            '111' => 'TANDA PENGHARGAAN TRIKORA',
            '112' => 'TP PEMBEBASAN IRIAN BARAT',
            '201' => 'KARYA SATYA 10 TAHUN',
            '202' => 'KARYA SATYA  20 TAHUN',
            '203' => 'KARYA SATYA  30 TAHUN',
            '204' => 'WIRA KARYA',
            '300' => 'TANDA JASA LAINNYA',
            '301' => 'TP SIDHAKARYA ADHYAKSA',
            '302' => 'TP PURNABAKTI ADHYAKSA',
            '303' => 'TP DHARMA ADHYAKSA',
            '304' => 'TP TELADAN TK NASIONAL',
            '305' => 'TP TELADAN TK PROPINSI',
            '306' => 'TP TELADAN TK KABUPATEN/KOTA',
            '307' => 'TP PNS LUAR BIASA PRESTASINYA',
            '308' => 'TP PENEMUAN BERMANFAAT BAGI NEGARA',
            '309' => 'SISWA TELADAN',
            '310' => 'OLIMPIADE',
            '400' => 'TANDA PENGHARGAAN LAINNYA',
        ];
    }

    public static function findArrayJenisKepanitiaanId()
    {
        return[
            '0' => 'Tidak Ikut Dalam Organisasi',
            '1' => 'Politik',
            '2' => 'Ekonomi, termasuk Badan Usaha Negara',
            '3' => 'Sosial',
            '4' => 'Kebudayaan',
            '5' => 'Pendidikan',
            '6' => 'Keagamaan',
            '7' => 'Olah Raga',
            '8' => 'Golongan Karya',
            '9' => 'Organisasi Masa',
            'A' => 'Lain-Lain',
            'B' => 'Dharma Wanita',
            'C' => 'KORPI',
        ];
    }

    public static function findArrayStatusCpnsPnsId()
    {
        return[
            'C' => 'CPNS',
            'P' => 'PNS'
        ];
    }

    public static function findArrayInstansiId()
    {
        return [
            '1' => 'Kementerian Koordinator Bidang Politik, Hukum dan Keamanan',
            ];
    }

    public static function findArrayKpknBaruId()
    {
        return [
            '1' => ' 01 KU POLDA ACEH',
            ];
    }

    public static function findArraySatuanKerjaId()
    {
        return [
            '1' => 'Kementerian Koordinator Bidang Politik, Hukum dan Keamanan ',
            ];
    }

    public static function findArrayLokasiKerjaBaruId()
    {
        return [
            '1' => 'Botto ',
            ];
    }

    public static function findArrayJenisDokumenId()
    {
        return [
            '1' => 'Kartu Tanda Penduduk',
            '2' => 'Passport',
            '3' => 'Surat Izin Mengemudi'
        ];
    }

    public static function findArrayStatusHidupId()
    {
        return [
            '1' => 'Hidup',
            '0' => 'Meninggal'
        ];
    }

    public static function findArrayBahasaId()
    {
        return [
            '1' => 'Indonesia',
            '2' => 'English'
        ];
    }

    public static function findArrayTingkatPendidikanId()
    {
        return [
            'Sekolah Dasar' => 'Sekolah Dasar',
            'SLTP' => 'SLTP',
            'SLTP Kejuruan' => 'SLTP Kejuruan',
            'SLTA' => 'SLTA',
            'SLTA Kejuruan' => 'SLTA Kejuruan',
            'SLTA Keguruan' => 'SLTA Keguruan',
            'Diploma I' => 'Diploma I',
            'Diploma II' => 'Diploma II',
            'Diploma III/Sarjana Muda' => 'Diploma III/Sarjana Muda',
            'Diploma IV' => 'Diploma IV',
            'S1' => 'S-1/Sarjana',
            'S2' => 'S-2',
            '53' => 'S-3/Doktor'
        ] ;
    }
}
