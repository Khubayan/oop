<?php

/**
 * Main CLI — Sistem Perpustakaan Mini
 * Lengkapi semua class terlebih dahulu sebelum menjalankan.
 */

require_once __DIR__ . '/Config.php';
require_once __DIR__ . '/DapatDipinjam.php';
require_once __DIR__ . '/Buku.php';
require_once __DIR__ . '/BukuFisik.php';
require_once __DIR__ . '/BukuDigital.php';
require_once __DIR__ . '/Anggota.php';
require_once __DIR__ . '/Perpustakaan.php';

$perpus = new Perpustakaan();

// TODO: Tambah data awal buku dan anggota

function tampilkanMenu(): void
{
    echo "\n=== Perpustakaan Mini ===\n";
    echo "1. Tampilkan buku\n";
    echo "2. Tampilkan anggota\n";
    echo "3. Pinjam buku\n";
    echo "4. Kembalikan buku\n";
    echo "0. Keluar\n";
    echo "Pilih: ";
}

// TODO: Implement loop menu interaktif
// Gunakan readline() atau fgets(STDIN) untuk input

echo "Lengkapi class dan implementasi menu di file ini.\n";
echo "Referensi: contoh/pertemuan-10/demo-perpustakaan.php\n";
