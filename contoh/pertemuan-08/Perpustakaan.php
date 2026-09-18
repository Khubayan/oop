<?php

/**
 * Pertemuan 8 — Class Perpustakaan (komposisi has-a)
 * Perpustakaan PUNYA array buku dan anggota — bukan extends Buku.
 */

class Perpustakaan
{
    /** @var DapatDipinjam[] Koleksi buku — komposisi has-a */
    private array $buku = [];

    /** @var Anggota[] Daftar anggota terdaftar */
    private array $anggota = [];

    public function tambahBuku(DapatDipinjam $buku): void
    {
        $this->buku[] = $buku;
    }

    public function tambahAnggota(Anggota $anggota): void
    {
        $this->anggota[] = $anggota;
    }

    public function cariBuku(string $judul): ?DapatDipinjam
    {
        foreach ($this->buku as $b) {
            if ($b->getJudul() === $judul) {
                return $b;
            }
        }
        return null;
    }

    public function cariAnggota(string $id): ?Anggota
    {
        foreach ($this->anggota as $a) {
            if ($a->idAnggota === $id) {
                return $a;
            }
        }
        return null;
    }

    public function tampilkanBuku(): void
    {
        echo "--- Daftar Buku ---\n";
        foreach ($this->buku as $b) {
            echo "- {$b->getInfo()}\n";
        }
    }

    public function tampilkanAnggota(): void
    {
        echo "--- Daftar Anggota ---\n";
        foreach ($this->anggota as $a) {
            echo "- {$a->profil()}\n";
        }
    }

    public function getBuku(): array
    {
        return $this->buku;
    }

    public function getAnggota(): array
    {
        return $this->anggota;
    }
}
