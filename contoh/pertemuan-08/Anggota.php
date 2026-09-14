<?php

require_once __DIR__ . '/Config.php';

class Anggota
{
    public static int $totalAnggota = 0;

    /** @var array<string, int> judul => hari pinjam (simulasi) */
    private array $pinjaman = [];

    public function __construct(
        public string $nama,
        public string $idAnggota
    ) {
        self::$totalAnggota++;
    }

    public function getJumlahPinjam(): int
    {
        return count($this->pinjaman);
    }

    public function getPinjaman(): array
    {
        return $this->pinjaman;
    }

    public function catatPinjam(string $judul, int $hari = 0): bool
    {
        if ($this->getJumlahPinjam() >= Config::MAX_PINJAM) {
            return false;
        }
        $this->pinjaman[$judul] = $hari;
        return true;
    }

    public function catatKembali(string $judul): bool
    {
        if (!isset($this->pinjaman[$judul])) {
            return false;
        }
        unset($this->pinjaman[$judul]);
        return true;
    }

    public function profil(): string
    {
        return "{$this->nama} ({$this->idAnggota}) — pinjam: {$this->getJumlahPinjam()}/" . Config::MAX_PINJAM;
    }
}
