<?php

require_once __DIR__ . '/Buku.php';

class BukuFisik extends Buku
{
    public function __construct(
        string $judul,
        string $penulis,
        private int $stok,
        private string $rak
    ) {
        parent::__construct($judul, $penulis);
    }

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
        return parent::getInfo() . " [Fisik, Rak: {$this->rak}, Stok: {$this->stok}]";
    }

    public function getStok(): int
    {
        return $this->stok;
    }
}
