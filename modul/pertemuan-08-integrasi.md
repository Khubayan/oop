# Pertemuan 8 — Komposisi & Integrasi

| | |
|---|---|
| **Pertemuan** | 8 dari 10 |
| **Durasi** | 90 menit |
| **Prasyarat** | Pertemuan 1–7 selesai |

## Tujuan Pembelajaran

Setelah pertemuan ini, siswa mampu:
1. Mengintegrasikan beberapa class dalam satu aplikasi
2. Mengelola array of objects (buku, anggota)
3. Membuat relasi antar class (komposisi: Perpustakaan **punya** buku)
4. Mencari object dalam array berdasarkan kriteria
5. Memecah kode ke beberapa file dengan `require_once`

## Koneksi Pertemuan Sebelumnya

Pertemuan 1–7 menghasilkan class-class terpisah: `Buku`, `BukuFisik`, `BukuDigital`, `Anggota`, `Config`, interface `DapatDipinjam`. Sekarang saatnya **menyatukan** semuanya dalam satu aplikasi Sistem Perpustakaan Mini.

## Analogi Dunia Nyata

Perpustakaan **memiliki** banyak buku dan anggota — bukan "is-a", tapi **"has-a"** (komposisi). Perpustakaan bukan jenis buku; perpustakaan **punya** koleksi buku.

## Materi Teori

### Komposisi vs Inheritance

| Relasi | Arti | Keyword | Contoh |
|--------|------|---------|--------|
| **is-a** | Adalah bagian dari | `extends` | BukuFisik adalah Buku |
| **has-a** | Memiliki / punya | property array | Perpustakaan punya buku |

```
Perpustakaan (has-a)
├── buku[]     → array of DapatDipinjam
└── anggota[]  → array of Anggota
```

### Array of Objects

Class `Perpustakaan` mengelola koleksi object lewat array:

```php
private array $buku = [];
private array $anggota = [];

public function tambahBuku(DapatDipinjam $buku): void {
    $this->buku[] = $buku;
}
```

Type hint `DapatDipinjam` memastikan hanya buku yang bisa dipinjam yang ditambahkan (polimorfisme dari pertemuan 6).

### Mencari Object dalam Array

```php
public function cariBuku(string $judul): ?DapatDipinjam {
    foreach ($this->buku as $b) {
        if ($b->getJudul() === $judul) {
            return $b;
        }
    }
    return null;  // tidak ditemukan
}
```

Return `null` jika tidak ketemu — penting untuk validasi di pertemuan 9.

### Multi-file dengan `require_once`

Satu class per file. File utama memuat semua dependency:

```php
require_once __DIR__ . '/Config.php';
require_once __DIR__ . '/DapatDipinjam.php';
require_once __DIR__ . '/Buku.php';
require_once __DIR__ . '/BukuFisik.php';
require_once __DIR__ . '/BukuDigital.php';
require_once __DIR__ . '/Anggota.php';
require_once __DIR__ . '/Perpustakaan.php';
```

**Urutan penting:** file yang didependensi harus di-require dulu (misal `Buku.php` sebelum `BukuFisik.php`).

### Arsitektur Project

```
contoh/pertemuan-08/
├── Config.php          → constant
├── DapatDipinjam.php   → interface
├── Buku.php            → parent class
├── BukuFisik.php       → extends Buku
├── BukuDigital.php     → extends Buku
├── Anggota.php         → static + instance
├── Perpustakaan.php    → komposisi (has-a)
└── demo.php            → entry point
```

### Kesalahan Umum

| Error | Penyebab | Solusi |
|-------|----------|--------|
| Class not found | Lupa `require_once` | Tambah require di file yang memakai class |
| Cannot redeclare class | `require` bukan `require_once` | Pakai `require_once` |
| Undefined method getInfo | Interface/class tidak match | Pastikan class implement semua method interface |

### Hubungan ke Project Thread

Ini adalah **milestone utama** project: class `Perpustakaan` di `project/perpustakaan-starter/` mengintegrasikan semua konsep pertemuan 1–7.

## Contoh Bertahap

### Langkah 1 — Array kosong di Perpustakaan

```php
class Perpustakaan {
    private array $buku = [];
}
```

### Langkah 2 — Tambah object ke array

```php
public function tambahBuku(DapatDipinjam $buku): void {
    $this->buku[] = $buku;
}
```

### Langkah 3 — Loop tampilkan

```php
public function tampilkanBuku(): void {
    foreach ($this->buku as $b) {
        echo "- {$b->getInfo()}\n";
    }
}
```

## Praktik Terpandu di Kelas

Kerjakan bersama guru (25–45 menit):

1. Buka folder `contoh/pertemuan-08/` — pelajari struktur file
2. Baca `demo.php` — lihat urutan `require_once`
3. Buat class `Perpustakaan` dengan array `$buku` dan `$anggota`
4. Implement `tambahBuku()` dan `tambahAnggota()`
5. Implement `tampilkanBuku()` dengan foreach
6. Implement `cariBuku(string $judul)` — return null jika tidak ada
7. Jalankan `php contoh/pertemuan-08/demo.php`
8. (Opsional) Lihat `demo-error-require.php` — akibat lupa require

## Checkpoint Pemahaman

Jawab lisan sebelum lanjut:

1. Apa beda komposisi (has-a) dan inheritance (is-a)?
2. Mengapa `Perpustakaan` punya array `$buku`, bukan extends `Buku`?
3. Apa fungsi `require_once`?

## Demo Live Coding

```bash
php contoh/pertemuan-08/demo.php
```

Folder demo: [`contoh/pertemuan-08/`](../contoh/pertemuan-08/)

## Struktur 90 Menit

| Waktu | Aktivitas |
|-------|-----------|
| 0–10 | Review semua konsep pertemuan 1–7 |
| 10–25 | Teori komposisi + array of objects + multi-file |
| 25–45 | Praktik terpandu: class `Perpustakaan` |
| 45–50 | Checkpoint pemahaman |
| 50–75 | Siswa mulai project starter |
| 75–85 | Pair review struktur class |
| 85–90 | Refleksi + preview fitur pinjam/kembali |

## Latihan

Lihat: [`latihan/pertemuan-08-latihan.md`](../latihan/pertemuan-08-latihan.md)

## Pertanyaan Diskusi

1. Mengapa class dipisah ke beberapa file?
2. Apa keuntungan type hint `DapatDipinjam` di `tambahBuku()`?
3. Bagaimana cara mencari buku berdasarkan judul di array?
4. Apa yang terjadi jika lupa `require_once`?

## Refleksi Siswa

Diskusikan di kelas setelah praktik (5 menit):

1. Bagaimana perasaan menggabungkan semua class yang sudah dibuat?
2. Bagian integrasi mana yang paling menantang?
3. Mengapa `Perpustakaan` menggunakan komposisi, bukan inheritance?
4. Satu hal yang masih membingungkan: _______________

## Tugas Rumah

Lengkapi class `Perpustakaan` di `project/perpustakaan-starter/`: tambah buku, anggota, tampilkan daftar.

## Ringkasan

- Komposisi (has-a) = class punya object lain sebagai property/array
- Array of objects = kelola banyak object dalam satu class
- `cariBuku()` / `cariAnggota()` = cari object dalam array, return null jika tidak ada
- Multi-file = satu class per file, `require_once` untuk memuat
- Project perpustakaan = integrasi semua konsep OOP pertemuan 1–7

## Checklist Pemahaman

[`checklist/pertemuan-08-checklist.md`](../checklist/pertemuan-08-checklist.md)
