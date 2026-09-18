<?php

/**
 * Pertemuan 8 — Integrasi Class Perpustakaan
 * Jalankan: php contoh/pertemuan-08/demo.php
 *
 * Entry point — memuat semua class lewat require_once.
 */

// LANGKAH 1: Urutan require penting — dependency dulu
require_once __DIR__ . '/Config.php';
require_once __DIR__ . '/DapatDipinjam.php';
require_once __DIR__ . '/Buku.php';
require_once __DIR__ . '/BukuFisik.php';
require_once __DIR__ . '/BukuDigital.php';
require_once __DIR__ . '/Anggota.php';
require_once __DIR__ . '/Perpustakaan.php';

// LANGKAH 2: Buat object Perpustakaan (komposisi has-a)
$perpus = new Perpustakaan();

// LANGKAH 3: Tambah buku dan anggota ke array internal
$perpus->tambahBuku(new BukuFisik("Algoritma", "Budi", 5, "A-01"));
$perpus->tambahBuku(new BukuFisik("Basis Data", "Ani", 3, "B-02"));
$perpus->tambahBuku(new BukuDigital("OOP PHP", "Pak Guru", "PDF"));

$perpus->tambahAnggota(new Anggota("Budi Santoso", "AG001"));
$perpus->tambahAnggota(new Anggota("Ani Wijaya", "AG002"));

// LANGKAH 4: Tampilkan koleksi
echo "=== " . Config::NAMA_APP . " ===\n\n";
$perpus->tampilkanBuku();
echo "\n";
$perpus->tampilkanAnggota();
