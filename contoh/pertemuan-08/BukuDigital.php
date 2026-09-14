<?php

require_once __DIR__ . '/Buku.php';

class BukuDigital extends Buku
{
    public function __construct(
        string $judul,
        string $penulis,
        private string $format
    ) {
        parent::__construct($judul, $penulis);
    }

    public function pinjam(): bool
    {
        return true;
    }

    public function kembalikan(): void
    {
        // Digital tidak mengurangi stok
    }

    public function getInfo(): string
    {
        return parent::getInfo() . " [Digital, Format: {$this->format}]";
    }
}
