# Pertemuan 4 — Encapsulation (Enkapsulasi)

| | |
|---|---|
| **Pertemuan** | 4 dari 10 |
| **Durasi** | 90 menit |
| **Prasyarat** | Pertemuan 3 — constructor |

## Tujuan Pembelajaran

Setelah pertemuan ini, siswa mampu:
1. Menjelaskan konsep enkapsulasi dengan analogi brankas
2. Membedakan access modifier `public` dan `private`
3. Melindungi data dengan property private
4. Menyediakan akses terkontrol lewat getter/setter
5. Menambahkan validasi di dalam method

## Koneksi Pertemuan Sebelumnya

Di pertemuan 3, class `Buku` sudah punya constructor dan validasi stok di constructor. Namun masalah baru muncul:

```php
$buku = new Buku("OOP", "Budi", 2026, 5);
$buku->stok = -999;  // masih bisa! data rusak
```

Constructor hanya berjalan **sekali** saat object dibuat. Setelah itu, property `public` masih bisa diubah sembarangan dari luar class. Pertemuan ini memecahkan masalah itu dengan **enkapsulasi**.

## Analogi Dunia Nyata

**Brankas** — uang di dalam tidak boleh diambil sembarangan. Harus lewat prosedur resmi: `setor()`, `tarik()`, `cekSaldo()`. Tidak ada yang bisa langsung merogoh brankas dari luar.

Di project perpustakaan: stok buku adalah "uang di brankas". Hanya method `pinjam()` dan `kembalikan()` yang boleh mengubahnya.

## Materi Teori

### Apa itu Enkapsulasi?

Enkapsulasi = **menyembunyikan data internal** dan hanya memberi akses lewat method yang sudah kita tentukan. Tujuannya: data tetap valid dan program lebih aman dari kesalahan pengguna.

### Access Modifier

| Modifier | Dari class sendiri | Dari luar class | Dari class anak (inheritance) |
|----------|-------------------|-----------------|-------------------------------|
| `public` | Ya | Ya | Ya |
| `private` | Ya | Tidak | Tidak |
| `protected` | Ya | Tidak | Ya (dibahas di pertemuan 5) |

**Aturan praktis:** property yang menyimpan data sensitif atau penting (stok, saldo, password) → `private`. Method yang boleh dipanggil dari luar → `public`.

### Getter vs Method Bisnis

| Jenis | Fungsi | Contoh |
|-------|--------|--------|
| **Getter** | Hanya membaca data, tidak mengubah | `getStok()` |
| **Method bisnis** | Mengubah data + validasi + logika | `pinjam()`, `tambahStok()` |

Jangan buat setter sembarangan (`setStok(-5)`) jika ada aturan bisnis. Lebih baik method `tambahStok()` dan `pinjam()` yang sudah memvalidasi.

### Sebelum vs Sesudah Enkapsulasi

| Aspek | Tanpa enkapsulasi | Dengan enkapsulasi |
|-------|-------------------|-------------------|
| Akses stok | `$buku->stok = -999` langsung | Hanya lewat `pinjam()` / `kembalikan()` |
| Validasi | Hanya di constructor | Di setiap method yang mengubah data |
| Keamanan data | Siapa saja bisa ubah | Hanya method class yang boleh ubah |
| Error | Data rusak diam-diam | PHP tolak akses langsung |

### Getter & Setter — Contoh Kode

```php
private int $stok = 0;

public function getStok(): int {
    return $this->stok;  // hanya baca, tidak ubah
}

public function pinjam(int $jumlah): bool {
    if ($jumlah > 0 && $this->stok >= $jumlah) {
        $this->stok -= $jumlah;
        return true;
    }
    return false;  // gagal jika stok tidak cukup
}
```

### Kesalahan Umum

| Error / Masalah | Penyebab | Solusi |
|-----------------|----------|--------|
| `Cannot access private property` | Akses `$obj->stok` dari luar class | Pakai `getStok()` atau method bisnis |
| Stok tetap bisa negatif | Property masih `public` | Ubah ke `private`, akses lewat method |
| Setter tanpa validasi | `setStok()` menerima nilai apa saja | Ganti dengan method bisnis yang validasi |

### Hubungan ke Project Thread

Di project Sistem Perpustakaan Mini:
- `$stok` di class `Buku` → **private**
- `$bukuDipinjam` di class `Anggota` → **private**
- Semua perubahan stok lewat `pinjam()` dan `kembalikan()`

## Contoh Bertahap

### Langkah 1 — Masalah: stok public

```php
class Buku {
    public int $stok = 5;
}
$buku = new Buku();
$buku->stok = -100;  // tidak ada yang mencegah ini
```

### Langkah 2 — Solusi: stok private + getter

```php
class Buku {
    private int $stok = 5;
    public function getStok(): int { return $this->stok; }
}
// $buku->stok = 10;  // ERROR!
echo $buku->getStok();  // 5 — aman
```

### Langkah 3 — Method bisnis dengan validasi

```php
public function pinjam(int $jumlah = 1): bool {
    if ($jumlah > 0 && $this->stok >= $jumlah) {
        $this->stok -= $jumlah;
        return true;
    }
    return false;
}
```

## Praktik Terpandu di Kelas

Kerjakan bersama guru (25–45 menit):

1. Jalankan `php contoh/pertemuan-04/TanpaEncapsulation.php` — ubah stok ke `-5`, lihat masalahnya
2. Refactor: ubah `$stok` dari `public` menjadi `private`
3. Tambah `getStok()` untuk membaca stok
4. Tambah `pinjam()` dan `kembalikan()` dengan validasi
5. Coba `$buku->stok = 999` — catat pesan error PHP
6. Bandingkan dengan `php contoh/pertemuan-04/BukuEncapsulated.php`

## Checkpoint Pemahaman

Jawab lisan sebelum lanjut ke latihan mandiri:

1. Apa beda `public` dan `private`?
2. Mengapa `getStok()` lebih aman daripada `$buku->stok`?
3. Kapan kita pakai method `pinjam()` daripada getter?

## Demo Live Coding

```bash
php contoh/pertemuan-04/TanpaEncapsulation.php   # masalah tanpa enkapsulasi
php contoh/pertemuan-04/BukuEncapsulated.php     # solusi dengan enkapsulasi
```

File demo:
- [`contoh/pertemuan-04/TanpaEncapsulation.php`](../contoh/pertemuan-04/TanpaEncapsulation.php)
- [`contoh/pertemuan-04/BukuEncapsulated.php`](../contoh/pertemuan-04/BukuEncapsulated.php)

**Demo error:** Uncomment baris `$buku->stok = 999` di `BukuEncapsulated.php` — tunjukkan pesan error.

## Struktur 90 Menit

| Waktu | Aktivitas |
|-------|-----------|
| 0–10 | Review constructor + demo masalah stok negatif |
| 10–25 | Teori enkapsulasi + tabel access modifier |
| 25–45 | Praktik terpandu: refactor `Buku` step-by-step |
| 45–50 | Checkpoint pemahaman (3 pertanyaan lisan) |
| 50–75 | Latihan mandiri: class `Rekening` dan `Akun` |
| 75–85 | Demo error akses private property |
| 85–90 | Refleksi + ringkasan + preview inheritance |

## Latihan

Lihat: [`latihan/pertemuan-04-latihan.md`](../latihan/pertemuan-04-latihan.md)

Worksheet mencakup: konsep isian, guided `Rekening`, refactor `Buku`, class `Akun`, uji pemahaman error, dan refleksi mandiri.

## Pertanyaan Diskusi

1. Mengapa stok sebaiknya `private`?
2. Apa yang terjadi jika kita akses property private langsung?
3. Kapan kita pakai getter vs method bisnis (`pinjam()`)?
4. Di aplikasi nyata (bank, game), data apa yang sebaiknya dienkapsulasi?

## Refleksi Siswa

Diskusikan di kelas setelah praktik (5 menit):

1. Dengan kata-kata sendiri, apa arti enkapsulasi?
2. Apa yang terjadi saat kita akses property private langsung? Mengapa PHP melarangnya?
3. Di project perpustakaan, property apa yang sebaiknya private? Mengapa?
4. Satu hal yang masih membingungkan dari pertemuan ini: _______________

## Tugas Rumah

Refactor class `Buku` project thread: stok jadi private, tambah `tambahStok()`, `pinjam()`, `kembalikan()`, `getStok()`.

## Ringkasan

- Enkapsulasi = sembunyikan data, akses lewat method terkontrol
- `private` = hanya bisa diakses dari dalam class sendiri
- Getter hanya membaca; method bisnis mengubah data + validasi
- Tanpa enkapsulasi, data bisa rusak tanpa error (stok negatif)
- Project perpustakaan: stok buku dan daftar pinjaman harus private

## Checklist Pemahaman

[`checklist/pertemuan-04-checklist.md`](../checklist/pertemuan-04-checklist.md)
