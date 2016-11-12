<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| File Konfig yang berisi pendefinisian Modul
| Data Modul harus sama dengan tabel usermng_modul
*/

$config['modul_json']='
[{
	"MODULID": "1",
	"MODUL": "SIAP",
	"LONG_NAME": "Sistem Informasi Administrasi Pegawai",
	"DESC": "Mengelola administrasi kepegawaian yang terintegrasi untuk memudahkan proses inventarisasi data pegawai serta memfasilitasi proses pengelolaan kepegawaian rutin.",
	"is_aktif": null,
	"data_modul": null
}, {
	"MODULID": "2",
	"MODUL": "Dossier",
	"LONG_NAME": "Dokumen Pegawai",
	"DESC": "Modul ini memfasilitasi proses penyimpanan dokumen kepegawaian dalam bentuk digital supaya lebiih terorganisir dengan baik. Dan juga untuk keperluan kemudahan dalam pemanfaatan sesuai dengan kebutuhan. (Dosir)",
	"is_aktif": null,
	"data_modul": null
}, {
	"MODULID": "3",
	"MODUL": "Pelayanan",
	"LONG_NAME": "Pelayanan Pegawai",
	"DESC": "Memfasilitasi proses pelayanan administrasi kepegawaian bagi pegawai. Tujuan sistem ini ialah memberikan pelayanan prima kepada semua pegawai. (eService)",
	"is_aktif": null,
	"data_modul": null
}, {
	"MODULID": "4",
	"MODUL": "Presensi",
	"LONG_NAME": "Kehadiran Pegawai",
	"DESC": "Modul ini mempermudah proses monitoring data kehadiran\/ ketidakhadiran pegawai serta fasilitas untuk mendukung keperluan pencatatan perizinan. (PresensiKu)",
	"is_aktif": null,
	"data_modul": null
}, {
	"MODULID": "5",
	"MODUL": "Tukin",
	"LONG_NAME": "Tunjangan Kinerja Pegawai",
	"DESC": "Modul ini mempermudah proses perhitungan tunjangan kinerja sesuai dengan kinerja dan kehadiran pegawai dan mengurangi resiko human error dalam perhitungan tunjangan kinerja pegawai. (Tukiner)",
	"is_aktif": null,
	"data_modul": null
}, {
	"MODULID": "6",
	"MODUL": "Manjab",
	"LONG_NAME": "Manajemen Jabatan",
	"DESC": "Memfasilitasi proses penyusunan organisasi dan jabatan, analisa dan pemetaan jabatan, data kamus jabatan serta syarat-syarat jabatan baik struktural maupun fungsional. (Morgan)",
	"is_aktif": null,
	"data_modul": null
}, {
	"MODULID": "7",
	"MODUL": "Baperjakat",
	"LONG_NAME": "Badan Pertimbangan Jabatan dan Kepangkatan ",
	"DESC": "Membantu pimpinan atau Tim Baperjakat dalam mengambil keputusan untuk mendapatkan orang atau pejabat yang tepat untuk jabatan yang tepat. (Ortejab)",
	"is_aktif": null,
	"data_modul": null
}, {
	"MODULID": "8",
	"MODUL": "Formasi",
	"LONG_NAME": "Formasi Pegawai",
	"DESC": "Menampilkan data formasi pegawai serta menganalisa perencanaan pengadaan pegawai. juga memfasilitasi proses pengusulan kebutuhan, persetujuan dan redistribusi kuota formasi yang telah disetujui. (Fodara)",
	"is_aktif": null,
	"data_modul": null
}, {
	"MODULID": "9",
	"MODUL": "Rekrutmen",
	"LONG_NAME": "Rekrutmen Pegawai",
	"DESC": "Memfasilitasi proses rekrutmen Pegawai Negeri Sipil secara online melalui internet. proses pendaftaran, seleksi sampai didapatkan peserta lolos akhir. Juga disediakan fasilitas pengumuman, tanya jawab dan informasi-informasi lainnya. (eRpega)",
	"is_aktif": null,
	"data_modul": null
}, {
	"MODULID": "10",
	"MODUL": "EIS",
	"LONG_NAME": "executive information system",
	"DESC": "Memfasilitasi proses analisa dan reporting (pelaporan) data-data kepegawaian. Analis disini secara menyeluruh baik lingkup unit kerja, lingkup data pegawai, waktu atau periode beserta data-data riwayat. (Eksis)",
	"is_aktif": null,
	"data_modul": null
}, {
	"MODULID": "11",
	"MODUL": "Diklat",
	"LONG_NAME": "Pendidikan dan Pelatihan",
	"DESC": "Proses administrasi pendidikan dan pelatihan pegawai. Menyajikan proses analisa untuk dapat mengetahui data-data pegawai yang sudah waktunya untuk ditugaskan ikut serta dalam suatu proses pendidikan dan pelatihan tertentu. (SisDiklat)",
	"is_aktif": null,
	"data_modul": null
}, {
	"MODULID": "12",
	"MODUL": "Kinerja",
	"LONG_NAME": "Sasaran Kinerja Pegawai (SKP)",
	"DESC": "Melakukan pencatatan dan memfasilitasi proses pemantauan capaian Sasaran Kinerja Pegawai (SKP) pegawai. Modul ini memudahkan proses pengusulan SKP, verifikasi SKP, penilaian kinerja, dan pengajuan keberatan penilaian (jika ada). (Prestasi)",
	"is_aktif": null,
	"data_modul": null
}, {
	"MODULID": "13",
	"MODUL": "Kompetensi",
	"LONG_NAME": "Kompetensi Pegawai",
	"DESC": "Modul ini berfungsi untuk membantu pencatatan dan mengelola data kompetensi dan riwayat kompetensi dari setiap pegawai. (Kompega)",
	"is_aktif": null,
	"data_modul": null
}, {
	"MODULID": "14",
	"MODUL": "ABK",
	"LONG_NAME": "Analisa Beban Kerja",
	"DESC": "Memfasilitasi proses analisis beban kerja untuk mengetahui jumlah dan kualitas pegawai yang diperlukan. Analisis dilakukan berdasarkan beban kerja. Dari analisis tersebut akan diperoleh jumlah kebutuhan pegawai. (ABeKa)",
	"is_aktif": null,
	"data_modul": null
}, {
	"MODULID": "15",
	"MODUL": "Penggajian",
	"LONG_NAME": "Penggajian Pegawai",
	"DESC": "Modul ini memfasilitasi proses perhitungan gaji pegawai mulai dari perencanaan \/ forecasting, realisasi penggajian (operasional gaji bulanan) sampai melihat data penerimaan gaji bulanan bagi tiap pegawai. (Kisuga)",
	"is_aktif": null,
	"data_modul": null
}, {
	"MODULID": "16",
	"MODUL": "Polka",
	"LONG_NAME": "Pola Karir Pegawai",
	"DESC": "Membuat gambaran tentang jenjang karir dan pola yang dimiliki oleh sebuah jabatan baik fungsional maupun struktural sehingga diketahui pendidikan dan pengembangan yang diperlukan beserta alfernatifnya.",
	"is_aktif": null,
	"data_modul": null
}, {
	"MODULID": "17",
	"MODUL": "Catatan Medis",
	"LONG_NAME": "Rekam Medis Pegawai",
	"DESC": "Modul yang berfungsi untuk membantu pengelolaan data kesehatan pegawai yang dapat digunakan untuk mendukung proses-proses lain dalam pengelolaan kepegawaian. (SaySasa)",
	"is_aktif": null,
	"data_modul": null
}, {
	"MODULID": "18",
	"MODUL": "Assesmen",
	"LONG_NAME": "Assesmen Kompetensi Online",
	"DESC": "Sebagai wadah untuk memfasilitasi proses manajemen pelaksanaan pengukuran kompetensi pegawai secara online. (Seas)",
	"is_aktif": null,
	"data_modul": null
}, {
	"MODULID": "19",
	"MODUL": "Talenta",
	"LONG_NAME": "Manajemen Talenta",
	"DESC": "Modul identifikasi, pengembangan dan manajemen portofolio talenta yaitu jumlah, tipe dan kualitas para karyawan yang akan mencapai sasaran operasional strategis secara efektif. (Pusbakat)",
	"is_aktif": null,
	"data_modul": null
}, {
	"MODULID": "20",
	"MODUL": "Penugasan",
	"LONG_NAME": "Penugasan Pegawai",
	"DESC": "Modul yang berfungsi untuk memberikan kemudahan pencatatan penugasan kepada pegawai termasuk didalamnya penerbitan surat tugas dan manajemen kalender penugasan pegawai. (Tugasku)",
	"is_aktif": null,
	"data_modul": null
}, {
	"MODULID": "26",
	"MODUL": "SSO",
	"LONG_NAME": "Singgle Sign On",
	"DESC": "Sebuah mekanisme akses terhadap sistem yang dilakukan oleh seorang user yang memungkinkan dengan hanya sekali login maka user tersebut bisa mengakses banyak sistem tanpa harus login lagi pada masing-masing sistem tersebut (InOne)",
	"is_aktif": null,
	"data_modul": null
}, {
	"MODULID": "22",
	"MODUL": "Juara",
	"LONG_NAME": "Kinerja Organisasi",
	"DESC": "Modul ini berfokus pada kinerja organisasi dengan mengukur apa yang penting serta meningkatkan komunikasi organisasi visi dan strategi. Bisnis proses pengembangan sistem kinerja organisasi menerapkan metode balance scorecard.",
	"is_aktif": null,
	"data_modul": null
}, {
	"MODULID": "23",
	"MODUL": "FPAK",
	"LONG_NAME": "Fungsional dan Penilaian Angka Kredit",
	"DESC": "Modul yang memfasilitasi proses-proses penilaian dan penetapan angka kredit bagi para pegawai fungsional tertentu.",
	"is_aktif": null,
	"data_modul": null
}, {
	"MODULID": "24",
	"MODUL": "eLearning",
	"LONG_NAME": "e - Learning Online Pegawai",
	"DESC": "Modul ini membantu proses pelaksanaan belajar mengajar dalam kegiatan diklat secara online. (KnowMan)",
	"is_aktif": null,
	"data_modul": ""
}, {
	"MODULID": "25",
	"MODUL": "Flexyport",
	"LONG_NAME": "Flexyble Report",
	"DESC": "Memfasilitasi proses pencarian dan penyajian data dan rekapitulasi laporan secara fleksibel yang mencakup seluruh fungsi dalam modul SDM",
	"is_aktif": null,
	"data_modul": null
}, {
	"MODULID": "21",
	"MODUL": "Alker",
	"LONG_NAME": "Alat Kerja Pegawai",
	"DESC": "Modul yang digunakan untuk membantu proses pengelolaan alat kerja yang digunakan PNS dalam menjalankan tupoksinya, termasuk didalamnya juga dukungan terhadap proses ABK dan terintegrasi dengan Sistem Perlengkapan.",
	"is_aktif": null,
	"data_modul": null
}]';
$config['modul']=json_decode($config['modul_json']);
foreach ($config['modul'] as $row) {
	$config['modul'.$row->MODULID]=$row;
}