<?php

/**
 * Pertemuan 4 — Encapsulation
 * Stok dilindungi dengan private, akses lewat method.
 */

class Buku
{
    public function __construct(
        public string $judul,
        public string $penulis,
        public int $tahun,
        private int $stok = 0
    ) {
        if ($this->stok < 0) {
            $this->stok = 0;
        }
    }

    public function getStok(): int
    {
        return $this->stok;
    }

    public function tambahStok(int $jumlah): void
    {
        if ($jumlah > 0) {
            $this->stok += $jumlah;
        }
    }

    public function pinjam(int $jumlah = 1): bool
    {
        if ($jumlah > 0 && $this->stok >= $jumlah) {
            $this->stok -= $jumlah;
            return true;
        }
        return false;
    }

    public function kembalikan(int $jumlah = 1): void
    {
        if ($jumlah > 0) {
            $this->stok += $jumlah;
        }
    }

    public function info(): string
    {
        return "{$this->judul} — {$this->penulis} ({$this->tahun}), stok: {$this->getStok()}";
    }
}

$buku = new Buku("Belajar OOP", "Pak Guru", 2026, 3);

echo $buku->info() . "\n";
echo "Pinjam 1: " . ($buku->pinjam(1) ? "Berhasil" : "Gagal") . "\n";
echo $buku->info() . "\n";

$buku->kembalikan(1);
echo "Setelah dikembalikan: " . $buku->info() . "\n";

// $buku->stok = 999; // ERROR: Cannot access private property
