<?php

/**
 * Pertemuan 7 — Static & Constant + Class Anggota
 * Jalankan: php contoh/pertemuan-07/Anggota.php
 */

// LANGKAH 1: Constant — aturan tetap, tidak bisa diubah
class Config
{
    public const MAX_PINJAM = 3;
    public const NAMA_APP = "Perpustakaan Mini";
}

// LANGKAH 2: Static property — milik class, bukan per object
class Anggota
{
    public static int $totalAnggota = 0;

    public function __construct(
        public string $nama,
        public string $idAnggota,
        private array $bukuDipinjam = []
    ) {
        self::$totalAnggota++;  // LANGKAH 3: increment counter saat anggota baru
    }

    // LANGKAH 4: Validasi max pinjam pakai Config::MAX_PINJAM
    public function pinjamBuku(string $judulBuku): bool
    {
        if (count($this->bukuDipinjam) >= Config::MAX_PINJAM) {
            return false;
        }
        $this->bukuDipinjam[] = $judulBuku;
        return true;
    }

    public function kembalikanBuku(string $judulBuku): bool
    {
        $key = array_search($judulBuku, $this->bukuDipinjam, true);
        if ($key !== false) {
            unset($this->bukuDipinjam[$key]);
            $this->bukuDipinjam = array_values($this->bukuDipinjam);
            return true;
        }
        return false;
    }

    public function getBukuDipinjam(): array
    {
        return $this->bukuDipinjam;
    }

    public function profil(): string
    {
        $jumlah = count($this->bukuDipinjam);
        return "{$this->nama} ({$this->idAnggota}) — pinjam: {$jumlah}/" . Config::MAX_PINJAM;
    }

    public static function getTotalAnggota(): int
    {
        return self::$totalAnggota;
    }
}

echo "=== " . Config::NAMA_APP . " ===\n";
echo "Max pinjam per anggota: " . Config::MAX_PINJAM . "\n\n";

$anggota1 = new Anggota("Budi", "AG001");
$anggota2 = new Anggota("Ani", "AG002");

$anggota1->pinjamBuku("Algoritma");
$anggota1->pinjamBuku("OOP PHP");
$anggota1->pinjamBuku("Basis Data");
$hasil = $anggota1->pinjamBuku("Jaringan"); // LANGKAH 5: gagal — sudah 3 buku

echo $anggota1->profil() . "\n";
echo "Pinjam ke-4 (Jaringan): " . ($hasil ? "Berhasil" : "Gagal — max pinjam tercapai") . "\n";
echo $anggota2->profil() . "\n";
echo "Total anggota terdaftar: " . Anggota::getTotalAnggota() . "\n";
