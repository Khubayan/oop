# Pertemuan 9 — Fitur Lengkap: Pinjam & Kembali

| | |
|---|---|
| **Pertemuan** | 9 dari 10 |
| **Durasi** | 90 menit |
| **Prasyarat** | Pertemuan 8 — class Perpustakaan dasar |

## Tujuan Pembelajaran

Setelah pertemuan ini, siswa mampu:
1. Mengimplementasikan alur bisnis pinjam buku dengan validasi
2. Mengimplementasikan pengembalian buku dan update stok
3. Menghitung denda keterlambatan
4. Menangani skenario gagal (stok habis, max pinjam, data tidak ditemukan)
5. Mengembalikan status operasi lewat array result

## Koneksi Pertemuan Sebelumnya

Pertemuan 8 menghasilkan class `Perpustakaan` yang bisa menampung buku dan anggota. Sekarang kita tambahkan **alur bisnis nyata**: pinjam buku, kembalikan buku, dan hitung denda — seperti perpustakaan sungguhan.

## Analogi Dunia Nyata

Antrian di perpustakaan nyata:
1. Petugas cek kartu anggota (valid?)
2. Cek buku ada di koleksi? (valid?)
3. Cek anggota belum max pinjam? (valid?)
4. Cek stok buku fisik cukup? (valid?)
5. Baru proses pinjam

Jika salah satu gagal, transaksi dibatalkan — tidak ada buku yang "hilang" dari sistem.

## Materi Teori

### Workflow Pinjam — Validasi Berlapis

```
pinjam(idAnggota, judulBuku, lamaPinjamHari)
    │
    ├─ 1. cariAnggota(id) → null? return gagal
    ├─ 2. cariBuku(judul) → null? return gagal
    ├─ 3. anggota.catatPinjam() → false? return gagal (max pinjam)
    ├─ 4. buku.pinjam() → false? rollback + return gagal (stok habis)
    └─ 5. return sukses
```

Validasi **berurutan** — hentikan di langkah pertama yang gagal.

### Workflow Kembali

```
kembali(idAnggota, judulBuku, hariKembali)
    │
    ├─ 1. cariAnggota(id) → null? return gagal
    ├─ 2. anggota punya pinjaman buku ini? → tidak? return gagal
    ├─ 3. hitung hariTelat = max(0, hariKembali - lamaPinjam)
    ├─ 4. hitung denda = hariTelat × DENDA_PER_HARI
    ├─ 5. buku.kembalikan() + anggota.catatKembali()
    └─ 6. return sukses + denda
```

### Rollback Sederhana

Jika buku gagal dipinjam **setelah** anggota sudah dicatat, batalkan catatan anggota:

```php
if (!$anggota->catatPinjam($judulBuku, $lamaPinjamHari)) {
    return ['sukses' => false, 'pesan' => 'Melebihi batas pinjam'];
}

if (!$buku->pinjam()) {
    $anggota->catatKembali($judulBuku);  // rollback!
    return ['sukses' => false, 'pesan' => 'Stok buku habis'];
}
```

Tanpa rollback, anggota tercatat pinjam tapi stok tidak berkurang — data tidak konsisten.

### Pola Return Array Result

```php
// Pinjam
return ['sukses' => true/false, 'pesan' => '...'];

// Kembali
return ['sukses' => true/false, 'denda' => int, 'hariTelat' => int];
```

Caller (demo/main) bisa cek `$result['sukses']` dan tampilkan pesan ke user.

### Rumus Denda

```php
$hariTelat = max(0, $hariKembali - $lamaPinjam);
$denda = $hariTelat * Config::DENDA_PER_HARI;
```

Contoh: pinjam 7 hari, kembali hari ke-10 → telat 3 hari.

### Skenario Uji Wajib

| No | Skenario | Hasil yang diharapkan |
|----|----------|----------------------|
| 1 | Pinjam buku fisik, stok cukup | Berhasil |
| 2 | Pinjam buku fisik, stok habis | Gagal — stok habis |
| 3 | Pinjam buku ke-4 (max 3) | Gagal — max pinjam |
| 4 | Pinjam buku digital | Berhasil (unlimited) |
| 5 | Kembali telat 2 hari | Berhasil + denda |
| 6 | Kembali buku tidak dipinjam | Gagal |

### Kesalahan Umum

| Masalah | Penyebab | Solusi |
|---------|----------|--------|
| Stok negatif | Validasi pinjam kurang | Cek stok di `BukuFisik::pinjam()` |
| Anggota tercatat pinjam tapi stok tidak berkurang | Tidak rollback | Panggil `catatKembali()` jika `pinjam()` gagal |
| Denda selalu 0 | Rumus salah | `max(0, hariKembali - lamaPinjam)` |

### Hubungan ke Project Thread

Method `pinjam()` dan `kembali()` di `Perpustakaan` project starter — ini fitur inti project akhir.

## Contoh Bertahap

### Langkah 1 — Validasi anggota

```php
$anggota = $this->cariAnggota($idAnggota);
if ($anggota === null) {
    return ['sukses' => false, 'pesan' => 'Anggota tidak ditemukan'];
}
```

### Langkah 2 — Validasi buku + pinjam

```php
$buku = $this->cariBuku($judulBuku);
if ($buku === null) {
    return ['sukses' => false, 'pesan' => 'Buku tidak ditemukan'];
}
```

### Langkah 3 — Rollback jika gagal

```php
if (!$buku->pinjam()) {
    $anggota->catatKembali($judulBuku);
    return ['sukses' => false, 'pesan' => 'Stok buku habis'];
}
```

## Praktik Terpandu di Kelas

Kerjakan bersama guru (25–45 menit):

1. Buka `contoh/pertemuan-09/PerpustakaanLengkap.php` — baca alur `pinjam()`
2. Implement validasi anggota (langkah 1)
3. Implement validasi buku (langkah 2)
4. Implement `catatPinjam()` + `buku->pinjam()` dengan rollback
5. Implement `kembali()` + hitung denda
6. Jalankan `php contoh/pertemuan-09/demo-pinjam.php`
7. Uncomment skenario uji di demo satu per satu

## Checkpoint Pemahaman

Jawab lisan sebelum lanjut:

1. Urutan validasi apa yang harus dilakukan saat pinjam?
2. Apa yang dilakukan rollback dan kapan?
3. Bagaimana rumus denda?

## Demo Live Coding

```bash
php contoh/pertemuan-09/demo-pinjam.php
```

File demo: [`contoh/pertemuan-09/demo-pinjam.php`](../contoh/pertemuan-09/demo-pinjam.php)

**Eksperimen:** Uncomment skenario uji di bagian bawah demo untuk uji stok habis, max pinjam, dll.

## Struktur 90 Menit

| Waktu | Aktivitas |
|-------|-----------|
| 0–10 | Review project pertemuan 8 |
| 10–25 | Teori validasi + workflow pinjam/kembali |
| 25–45 | Praktik terpandu: `pinjam()` dan `kembali()` |
| 45–50 | Checkpoint pemahaman |
| 50–75 | Implementasi di project starter |
| 75–85 | Uji 6 skenario gagal/berhasil |
| 85–90 | Refleksi + preview presentasi project |

## Latihan

Lihat: [`latihan/pertemuan-09-latihan.md`](../latihan/pertemuan-09-latihan.md)

## Pertanyaan Diskusi

1. Mengapa validasi harus berurutan?
2. Apa yang terjadi tanpa rollback saat pinjam gagal?
3. Validasi mana yang menurut Anda paling penting?
4. Bagaimana mengetes semua skenario gagal?

## Refleksi Siswa

Diskusikan di kelas setelah praktik (5 menit):

1. Bagian implementasi pinjam/kembali mana yang paling sulit?
2. Skenario uji mana yang paling menantang?
3. Bagaimana rollback menjaga data tetap konsisten?
4. Satu hal yang masih membingungkan: _______________

## Tugas Rumah

Selesaikan fitur pinjam/kembali + denda di project starter. Uji 6 skenario (lihat tabel di modul dan spesifikasi project).

## Ringkasan

- Validasi berlapis: anggota → buku → max pinjam → stok
- Rollback = batalkan perubahan jika langkah berikutnya gagal
- Return array result untuk komunikasi status ke caller
- Denda = hari telat × DENDA_PER_HARI
- Uji semua skenario gagal sebelum anggap fitur selesai

## Checklist Pemahaman

[`checklist/pertemuan-09-checklist.md`](../checklist/pertemuan-09-checklist.md)
