<?php

/**
 * Pertemuan 9 — Fitur Pinjam/Kembali + Denda
 */

require_once __DIR__ . '/../pertemuan-08/Config.php';
require_once __DIR__ . '/../pertemuan-08/DapatDipinjam.php';
require_once __DIR__ . '/../pertemuan-08/Buku.php';
require_once __DIR__ . '/../pertemuan-08/BukuFisik.php';
require_once __DIR__ . '/../pertemuan-08/BukuDigital.php';
require_once __DIR__ . '/../pertemuan-08/Anggota.php';
require_once __DIR__ . '/PerpustakaanLengkap.php';

$perpus = new PerpustakaanLengkap();

$perpus->tambahBuku(new BukuFisik("Algoritma", "Budi", 2, "A-01"));
$perpus->tambahBuku(new BukuDigital("OOP PHP", "Pak Guru", "PDF"));
$perpus->tambahAnggota(new Anggota("Budi Santoso", "AG001"));

echo "=== Demo Pinjam & Kembali ===\n\n";

$result = $perpus->pinjam("AG001", "Algoritma", 7);
echo "Pinjam Algoritma (7 hari): " . ($result['sukses'] ? "Berhasil" : "Gagal — {$result['pesan']}") . "\n";

$result = $perpus->kembali("AG001", "Algoritma", 10); // 3 hari telat
echo "Kembali Algoritma (hari ke-10): " . ($result['sukses'] ? "Berhasil" : "Gagal") . "\n";
if ($result['sukses'] && $result['denda'] > 0) {
    echo "Denda: Rp " . number_format($result['denda']) . " ({$result['hariTelat']} hari telat)\n";
}

$result = $perpus->pinjam("AG001", "OOP PHP", 14);
echo "Pinjam OOP PHP (digital): " . ($result['sukses'] ? "Berhasil" : "Gagal") . "\n";

echo "\n";
$perpus->tampilkanAnggota();
