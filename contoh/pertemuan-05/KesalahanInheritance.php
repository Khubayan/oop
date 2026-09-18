<?php

/**
 * Pertemuan 5 — Kesalahan Umum Inheritance
 * Jalankan: php contoh/pertemuan-05/KesalahanInheritance.php
 *
 * Demo: lupa parent::__construct() — property parent tidak terisi.
 */

class Buku
{
    public function __construct(
        protected string $judul,
        protected string $penulis
    ) {}

    public function info(): string
    {
        return "{$this->judul} — {$this->penulis}";
    }
}

class BukuFisikSalah extends Buku
{
    public function __construct(
        string $judul,
        string $penulis,
        private string $rak
    ) {
        // KESALAHAN: lupa parent::__construct($judul, $penulis)
        // $this->rak = $rak; — juga tidak di-set!
    }

    public function info(): string
    {
        return parent::info() . " [Rak: {$this->rak}]";
    }
}

echo "=== Demo Kesalahan: lupa parent::__construct() ===\n";
echo "Property judul/penulis parent TIDAK terisi.\n";
echo "Jalankan untuk lihat warning/error:\n\n";

// Uncomment untuk demo error:
// $buku = new BukuFisikSalah("Algoritma", "Budi", "A-12");
// echo $buku->info() . "\n";

echo "Solusi: selalu panggil parent::__construct() di constructor anak.\n";
