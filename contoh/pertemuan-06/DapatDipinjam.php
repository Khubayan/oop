<?php

/**
 * Pertemuan 6 — Polymorphism
 * Jalankan: php contoh/pertemuan-06/DapatDipinjam.php
 *
 * Interface DapatDipinjam diimplementasi oleh BukuFisik dan BukuDigital.
 */

// LANGKAH 1: Definisikan kontrak interface
interface DapatDipinjam
{
    public function pinjam(): bool;
    public function kembalikan(): void;
    public function getInfo(): string;
}

// LANGKAH 2: Implementasi BukuFisik — stok terbatas
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

// LANGKAH 3: Implementasi BukuDigital — unlimited
class BukuDigital implements DapatDipinjam
{
    public function __construct(private string $judul) {}

    public function pinjam(): bool
    {
        return true;
    }

    public function kembalikan(): void {}

    public function getInfo(): string
    {
        return "{$this->judul} (Digital)";
    }
}

// LANGKAH 4: Function dengan type hint interface
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

// LANGKAH 5: Skenario stok habis — uncomment untuk uji
echo "\n=== Skenario: pinjam sampai stok habis ===\n";
prosesPinjam($bukuFisik); // stok 1 → 0
prosesPinjam($bukuFisik); // stok 0 → GAGAL
