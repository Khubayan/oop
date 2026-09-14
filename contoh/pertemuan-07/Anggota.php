<?php

/**
 * Pertemuan 7 — Static & Constant + Class Anggota
 */

class Config
{
    public const MAX_PINJAM = 3;
    public const NAMA_APP = "Perpustakaan Mini";
}

class Anggota
{
    public static int $totalAnggota = 0;

    public function __construct(
        public string $nama,
        public string $idAnggota,
        private array $bukuDipinjam = []
    ) {
        self::$totalAnggota++;
    }

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

echo Config::NAMA_APP . "\n";
echo "Max pinjam per anggota: " . Config::MAX_PINJAM . "\n\n";

$anggota1 = new Anggota("Budi", "AG001");
$anggota2 = new Anggota("Ani", "AG002");

$anggota1->pinjamBuku("Algoritma");
$anggota1->pinjamBuku("OOP PHP");
$anggota1->pinjamBuku("Basis Data");
$anggota1->pinjamBuku("Jaringan"); // gagal, sudah 3

echo $anggota1->profil() . "\n";
echo $anggota2->profil() . "\n";
echo "Total anggota terdaftar: " . Anggota::getTotalAnggota() . "\n";
