<?php

/**
 * Pertemuan 8 — Demo Error: lupa require_once
 * Jalankan: php contoh/pertemuan-08/demo-error-require.php
 *
 * Tunjukkan error "Class not found" saat lupa require.
 * Uncomment baris require untuk memperbaiki.
 */

// KESALAHAN: langsung pakai class tanpa require
// require_once __DIR__ . '/Perpustakaan.php';  // uncomment untuk perbaiki

echo "=== Demo Error: Class not found ===\n";
echo "Jalankan file ini untuk lihat error jika require dilupakan.\n\n";

// Uncomment untuk demo error:
// $perpus = new Perpustakaan();
// echo "Berhasil\n";

echo "Solusi: tambahkan require_once untuk setiap class yang dipakai.\n";
echo "Lihat urutan require di demo.php.\n";
