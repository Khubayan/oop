<?php

/**
 * Pertemuan 9 — Fitur Pinjam/Kembali + Denda
 * Jalankan: php contoh/pertemuan-09/demo-pinjam.php
 *
 * Uncomment skenario di bagian bawah untuk uji satu per satu.
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

// SKENARIO 1: Pinjam buku fisik, stok cukup
$result = $perpus->pinjam("AG001", "Algoritma", 7);
echo "[1] Pinjam Algoritma (7 hari): " . ($result['sukses'] ? "Berhasil" : "Gagal — {$result['pesan']}") . "\n";

// SKENARIO 5: Kembali telat (pinjam 7 hari, kembali hari ke-10 = 3 hari telat)
$result = $perpus->kembali("AG001", "Algoritma", 10);
echo "[5] Kembali Algoritma (hari ke-10): " . ($result['sukses'] ? "Berhasil" : "Gagal") . "\n";
if ($result['sukses'] && $result['denda'] > 0) {
    echo "    Denda: Rp " . number_format($result['denda']) . " ({$result['hariTelat']} hari telat)\n";
}

// SKENARIO 4: Pinjam buku digital
$result = $perpus->pinjam("AG001", "OOP PHP", 14);
echo "[4] Pinjam OOP PHP (digital): " . ($result['sukses'] ? "Berhasil" : "Gagal — {$result['pesan']}") . "\n";

echo "\n";
$perpus->tampilkanAnggota();

// --- SKENARIO TAMBAHAN: uncomment untuk uji ---

// SKENARIO 2: Pinjam buku fisik, stok habis (pinjam 2x sampai stok 0, lalu pinjam lagi)
// $perpus2 = new PerpustakaanLengkap();
// $perpus2->tambahBuku(new BukuFisik("Test", "A", 1, "X"));
// $perpus2->tambahAnggota(new Anggota("Test", "T001"));
// $perpus2->pinjam("T001", "Test", 7);
// $r = $perpus2->pinjam("T001", "Test", 7);
// echo "[2] Pinjam stok habis: " . ($r['sukses'] ? "Berhasil" : "Gagal — {$r['pesan']}") . "\n";

// SKENARIO 3: Pinjam buku ke-4 (max 3)
// $perpus3 = new PerpustakaanLengkap();
// $perpus3->tambahBuku(new BukuDigital("A", "X", "PDF"));
// $perpus3->tambahBuku(new BukuDigital("B", "X", "PDF"));
// $perpus3->tambahBuku(new BukuDigital("C", "X", "PDF"));
// $perpus3->tambahBuku(new BukuDigital("D", "X", "PDF"));
// $perpus3->tambahAnggota(new Anggota("Max", "M001"));
// $perpus3->pinjam("M001", "A", 7);
// $perpus3->pinjam("M001", "B", 7);
// $perpus3->pinjam("M001", "C", 7);
// $r = $perpus3->pinjam("M001", "D", 7);
// echo "[3] Pinjam ke-4: " . ($r['sukses'] ? "Berhasil" : "Gagal — {$r['pesan']}") . "\n";

// SKENARIO 6: Kembali buku yang tidak dipinjam
// $r = $perpus->kembali("AG001", "Buku Tidak Ada", 5);
// echo "[6] Kembali buku tidak dipinjam: " . ($r['sukses'] ? "Berhasil" : "Gagal") . "\n";
