<?php

/**
 * Pertemuan 6 — Polymorphism
 * Interface DapatDipinjam diimplementasi oleh BukuFisik dan BukuDigital.
 */

interface DapatDipinjam
{
    public function pinjam(): bool;
    public function kembalikan(): void;
    public function getInfo(): string;
}

class BukuFisik implements DapatDipinjam
{
    public function __construct(
        private string $judul,
        private int &$stok
    ) {}

    public function pinjam(): bool
    {
        if ($this->stok > 0) {
            $this->stok--;
            return true;
        }
        return false;
    }

    public function kembalikan(): void
    {
        $this->stok++;
    }

    public function getInfo(): string
    {
        return "{$this->judul} (Fisik, stok: {$this->stok})";
    }
}

class BukuDigital implements DapatDipinjam
{
    public function __construct(private string $judul) {}

    public function pinjam(): bool
    {
        return true; // digital unlimited
    }

    public function kembalikan(): void
    {
        // digital tidak perlu dikembalikan
    }

    public function getInfo(): string
    {
        return "{$this->judul} (Digital)";
    }
}

function prosesPinjam(DapatDipinjam $item): void
{
    if ($item->pinjam()) {
        echo "Berhasil pinjam: {$item->getInfo()}\n";
    } else {
        echo "Gagal pinjam: {$item->getInfo()}\n";
    }
}

$stokFisik = 2;
$bukuFisik = new BukuFisik("Algoritma", $stokFisik);
$bukuDigital = new BukuDigital("OOP PHP");

$koleksi = [$bukuFisik, $bukuDigital];

echo "=== Polimorfisme: satu loop, beda perilaku ===\n";
foreach ($koleksi as $item) {
    prosesPinjam($item);
}
