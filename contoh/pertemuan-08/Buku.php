<?php

abstract class Buku implements DapatDipinjam
{
    public function __construct(
        protected string $judul,
        protected string $penulis
    ) {}

    public function getJudul(): string
    {
        return $this->judul;
    }

    public function getInfo(): string
    {
        return "{$this->judul} — {$this->penulis}";
    }
}
