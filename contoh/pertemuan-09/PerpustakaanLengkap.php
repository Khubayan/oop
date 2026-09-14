<?php

require_once __DIR__ . '/../pertemuan-08/Perpustakaan.php';
require_once __DIR__ . '/../pertemuan-08/Config.php';

class PerpustakaanLengkap extends Perpustakaan
{
    /**
     * @return array{sukses: bool, pesan: string}
     */
    public function pinjam(string $idAnggota, string $judulBuku, int $lamaPinjamHari): array
    {
        $anggota = $this->cariAnggota($idAnggota);
        if ($anggota === null) {
            return ['sukses' => false, 'pesan' => 'Anggota tidak ditemukan'];
        }

        $buku = $this->cariBuku($judulBuku);
        if ($buku === null) {
            return ['sukses' => false, 'pesan' => 'Buku tidak ditemukan'];
        }

        if (!$anggota->catatPinjam($judulBuku, $lamaPinjamHari)) {
            return ['sukses' => false, 'pesan' => 'Melebihi batas pinjam'];
        }

        if (!$buku->pinjam()) {
            $anggota->catatKembali($judulBuku);
            return ['sukses' => false, 'pesan' => 'Stok buku habis'];
        }

        return ['sukses' => true, 'pesan' => 'Berhasil dipinjam'];
    }

    /**
     * @return array{sukses: bool, denda: int, hariTelat: int}
     */
    public function kembali(string $idAnggota, string $judulBuku, int $hariKembali): array
    {
        $anggota = $this->cariAnggota($idAnggota);
        if ($anggota === null) {
            return ['sukses' => false, 'denda' => 0, 'hariTelat' => 0];
        }

        $pinjaman = $anggota->getPinjaman();
        if (!isset($pinjaman[$judulBuku])) {
            return ['sukses' => false, 'denda' => 0, 'hariTelat' => 0];
        }

        $lamaPinjam = $pinjaman[$judulBuku];
        $hariTelat = max(0, $hariKembali - $lamaPinjam);
        $denda = $hariTelat * Config::DENDA_PER_HARI;

        $buku = $this->cariBuku($judulBuku);
        $buku?->kembalikan();
        $anggota->catatKembali($judulBuku);

        return ['sukses' => true, 'denda' => $denda, 'hariTelat' => $hariTelat];
    }
}
