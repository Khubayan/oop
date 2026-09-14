<?php

/**
 * Pertemuan 3 — Constructor
 * Constructor property promotion (PHP 8+).
 */

class Buku
{
    public function __construct(
        public string $judul,
        public string $penulis,
        public int $tahun,
        public int $stok = 0
    ) {}

    public function info(): string
    {
        return "{$this->judul} — {$this->penulis} ({$this->tahun}), stok: {$this->stok}";
    }

    public function pinjam(int $jumlah = 1): bool
    {
        if ($this->stok >= $jumlah) {
            $this->stok -= $jumlah;
            return true;
        }
        return false;
    }
}

$buku1 = new Buku("Belajar OOP", "Pak Guru", 2026, 5);
$buku2 = new Buku("PHP Dasar", "Budi", 2025); // stok default 0

echo $buku1->info() . "\n";
echo "Pinjam 2 eksemplar: " . ($buku1->pinjam(2) ? "Berhasil" : "Gagal") . "\n";
echo $buku1->info() . "\n";

echo "\n" . $buku2->info() . "\n";
echo "Pinjam 1 eksemplar: " . ($buku2->pinjam(1) ? "Berhasil" : "Gagal") . "\n";
