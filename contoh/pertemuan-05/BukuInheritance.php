<?php

/**
 * Pertemuan 5 — Inheritance
 * BukuFisik dan BukuDigital extends Buku.
 */

class Buku
{
    public function __construct(
        protected string $judul,
        protected string $penulis,
        protected int $stok = 0
    ) {}

    public function info(): string
    {
        return "{$this->judul} — {$this->penulis}";
    }

    public function getStok(): int
    {
        return $this->stok;
    }
}

class BukuFisik extends Buku
{
    public function __construct(
        string $judul,
        string $penulis,
        int $stok,
        private string $rak
    ) {
        parent::__construct($judul, $penulis, $stok);
    }

    public function info(): string
    {
        return parent::info() . " [Fisik, Rak: {$this->rak}]";
    }
}

class BukuDigital extends Buku
{
    public function __construct(
        string $judul,
        string $penulis,
        private string $format
    ) {
        parent::__construct($judul, $penulis, 999);
    }

    public function info(): string
    {
        return parent::info() . " [Digital, Format: {$this->format}]";
    }
}

$bukuFisik = new BukuFisik("Algoritma", "Budi", 5, "A-12");
$bukuDigital = new BukuDigital("OOP PHP", "Ani", "PDF");

echo $bukuFisik->info() . ", stok: {$bukuFisik->getStok()}\n";
echo $bukuDigital->info() . ", stok: {$bukuDigital->getStok()}\n";
