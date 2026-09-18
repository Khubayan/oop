<?php

/**
 * Pertemuan 4 — TANPA Enkapsulasi (contoh masalah)
 * Jalankan: php contoh/pertemuan-04/TanpaEncapsulation.php
 *
 * Tujuan demo: tunjukkan bahwa property public bisa dimanipulasi
 * sembarangan, sehingga data menjadi tidak valid.
 */

// LANGKAH 1: Class dengan stok public — tidak aman
class Buku
{
    public function __construct(
        public string $judul,
        public string $penulis,
        public int $tahun,
        public int $stok = 0
    ) {}
}

$buku = new Buku("Belajar OOP", "Pak Guru", 2026, 5);

echo "=== SEBELUM manipulasi ===\n";
echo "Stok: {$buku->stok}\n\n";

// LANGKAH 2: Siapa saja bisa ubah stok langsung — tidak ada validasi!
$buku->stok = -999;

echo "=== SETELAH \$buku->stok = -999 ===\n";
echo "Stok: {$buku->stok}\n";
echo "Program tidak error, tapi data RUSAK!\n\n";

// LANGKAH 3: Bandingkan — buka BukuEncapsulated.php untuk solusinya
echo "Solusi: ubah stok jadi private + method pinjam()/kembalikan()\n";
echo "Lihat: contoh/pertemuan-04/BukuEncapsulated.php\n";
