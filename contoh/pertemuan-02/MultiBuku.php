<?php

/**
 * Pertemuan 2 — Class & Object
 * Demonstrasi multi-instance dan $this.
 */

class Buku
{
    public $judul;
    public $penulis;
    public $tahun;

    public function info(): void
    {
        echo "[{$this->tahun}] {$this->judul} — {$this->penulis}\n";
    }
}

$buku1 = new Buku();
$buku1->judul = "Belajar OOP";
$buku1->penulis = "Pak Guru";
$buku1->tahun = 2026;

$buku2 = new Buku();
$buku2->judul = "Algoritma Dasar";
$buku2->penulis = "Ani Wijaya";
$buku2->tahun = 2024;

$buku3 = new Buku();
$buku3->judul = "Basis Data";
$buku3->penulis = "Citra Lestari";
$buku3->tahun = 2023;

echo "=== Daftar Buku ===\n";
$buku1->info();
$buku2->info();
$buku3->info();

echo "\nUbah buku1, buku2 tidak terpengaruh:\n";
$buku1->judul = "OOP dengan PHP";
$buku1->info();
$buku2->info();
