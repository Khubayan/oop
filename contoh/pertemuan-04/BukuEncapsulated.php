<?php

/**
 * Pertemuan 4 — DENGAN Enkapsulasi (solusi)
 * Jalankan: php contoh/pertemuan-04/BukuEncapsulated.php
 *
 * Bandingkan dengan TanpaEncapsulation.php — stok dilindungi private.
 */

// LANGKAH 1: Stok private — tidak bisa diakses dari luar
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

    // LANGKAH 2: Getter — hanya membaca, tidak mengubah
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

    // LANGKAH 3: Method bisnis — ubah data + validasi
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

echo "=== Demo Enkapsulasi ===\n";
echo $buku->info() . "\n";

echo "Pinjam 1: " . ($buku->pinjam(1) ? "Berhasil" : "Gagal") . "\n";
echo $buku->info() . "\n";

$buku->kembalikan(1);
echo "Setelah dikembalikan: " . $buku->info() . "\n";

// LANGKAH 4: Coba akses langsung — uncomment baris di bawah untuk demo error
// $buku->stok = 999; // ERROR: Cannot access private property Buku::$stok
