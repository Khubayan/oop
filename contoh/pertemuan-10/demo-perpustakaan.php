<?php

/**
 * Pertemuan 10 — Demo Project Perpustakaan Lengkap (CLI Menu)
 */

require_once __DIR__ . '/../pertemuan-08/Config.php';
require_once __DIR__ . '/../pertemuan-08/DapatDipinjam.php';
require_once __DIR__ . '/../pertemuan-08/Buku.php';
require_once __DIR__ . '/../pertemuan-08/BukuFisik.php';
require_once __DIR__ . '/../pertemuan-08/BukuDigital.php';
require_once __DIR__ . '/../pertemuan-08/Anggota.php';
require_once __DIR__ . '/../pertemuan-09/PerpustakaanLengkap.php';

$perpus = new PerpustakaanLengkap();

// Data awal
$perpus->tambahBuku(new BukuFisik("Algoritma", "Budi", 3, "A-01"));
$perpus->tambahBuku(new BukuFisik("Basis Data", "Ani", 2, "B-02"));
$perpus->tambahBuku(new BukuDigital("OOP PHP", "Pak Guru", "PDF"));
$perpus->tambahAnggota(new Anggota("Budi Santoso", "AG001"));
$perpus->tambahAnggota(new Anggota("Ani Wijaya", "AG002"));

function tampilkanMenu(): void
{
    echo "\n=== " . Config::NAMA_APP . " ===\n";
    echo "1. Tampilkan buku\n";
    echo "2. Tampilkan anggota\n";
    echo "3. Pinjam buku\n";
    echo "4. Kembalikan buku\n";
    echo "0. Keluar\n";
    echo "Pilih: ";
}

// Demo otomatis (tanpa input interaktif)
echo "=== Demo Project Akhir ===\n";
$perpus->tampilkanBuku();
$perpus->tampilkanAnggota();

$r = $perpus->pinjam("AG001", "Algoritma", 7);
echo "\nPinjam: " . ($r['sukses'] ? "OK" : $r['pesan']) . "\n";

$r = $perpus->kembali("AG001", "Algoritma", 9);
echo "Kembali: " . ($r['sukses'] ? "OK, denda Rp " . number_format($r['denda']) : "Gagal") . "\n";

echo "\nTotal anggota terdaftar: " . Anggota::$totalAnggota . "\n";
echo "\n(Project interaktif: kembangkan main.php di folder project/perpustakaan-starter/)\n";
