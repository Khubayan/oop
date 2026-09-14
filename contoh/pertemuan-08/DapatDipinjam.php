<?php

interface DapatDipinjam
{
    public function getJudul(): string;
    public function pinjam(): bool;
    public function kembalikan(): void;
    public function getInfo(): string;
}
