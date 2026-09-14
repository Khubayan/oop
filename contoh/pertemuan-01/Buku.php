<?php

/**
 * Pertemuan 1 — Pengenalan OOP
 * Class Buku sederhana dengan property public dan method dasar.
 */

class Buku
{
    public $judul = "Belajar OOP";
    public $penulis = "Pak Guru";
    public $tahun = 2026;

    public function info(): void
    {
        echo "{$this->judul} — {$this->penulis} ({$this->tahun})\n";
    }
}

$buku = new Buku();
$buku->info();

$buku->judul = "PHP Dasar";
$buku->penulis = "Budi Santoso";
$buku->tahun = 2025;
$buku->info();
