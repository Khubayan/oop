# Pertemuan 7 — Static & Constant

| | |
|---|---|
| **Pertemuan** | 7 dari 10 |
| **Durasi** | 90 menit |
| **Prasyarat** | Pertemuan 6 — polymorphism |

## Tujuan Pembelajaran

Setelah pertemuan ini, siswa mampu:
1. Membedakan property instance vs static property
2. Menggunakan `static` property dan method
3. Menggunakan `const` untuk nilai tetap
4. Memakai `self::` untuk akses member static/const
5. Membuat class `Anggota` untuk project perpustakaan

## Koneksi Pertemuan Sebelumnya

Class `Anggota` punya data per-orang: nama, id, buku dipinjam. Tapi ada pertanyaan baru:
- **Berapa total anggota** yang terdaftar? (bukan milik satu anggota)
- **Berapa max pinjam** per anggota? (aturan tetap, sama untuk semua)

Data seperti ini tidak cocok disimpan di instance — butuh **static** dan **constant**.

## Analogi Dunia Nyata

**Static** = papan informasi sekolah — satu untuk semua siswa, bukan milik per-orang. Setiap siswa baru terdaftar, angka di papan naik.

**Const** = aturan tetap sekolah — "max pinjam 3 buku" tidak berubah per siswa, tidak bisa diubah siapa pun.

## Materi Teori

### Instance vs Static — Perbedaan Konsep

```
Instance (per object):          Static (per class):
┌─────────┐ ┌─────────┐         ┌──────────────────┐
│ Anggota1│ │ Anggota2│         │ totalAnggota = 2 │
│ nama    │ │ nama    │         │ (satu untuk semua)│
│ pinjam[]│ │ pinjam[]│         └──────────────────┘
└─────────┘ └─────────┘
```

| Aspek | Instance | Static |
|-------|----------|--------|
| Milik | Per object | Per class (satu untuk semua) |
| Akses dari luar | `$obj->prop` | `ClassName::$prop` |
| Akses dari dalam | `$this->prop` | `self::$prop` |
| Contoh | `$anggota->nama` | `Anggota::$totalAnggota` |
| Dibuat saat | `new Class()` | Class pertama kali dipakai |

### Static Property & Method

```php
class Anggota {
    public static int $totalAnggota = 0;

    public function __construct(...) {
        self::$totalAnggota++;  // akses dari dalam class
    }

    public static function getTotalAnggota(): int {
        return self::$totalAnggota;
    }
}

// Akses dari luar:
echo Anggota::$totalAnggota;
echo Anggota::getTotalAnggota();
```

### Constant

Nilai **tidak bisa diubah** setelah didefinisikan:

```php
class Config {
    public const MAX_PINJAM = 3;
    public const NAMA_APP = "Perpustakaan Mini";
}

echo Config::MAX_PINJAM;  // 3
// Config::MAX_PINJAM = 5;  // ERROR!
```

### `self::` — Akses dari Dalam Class

`self::` merujuk ke class saat ini. Dipakai untuk akses static property, static method, dan constant dari dalam class.

### Kapan Pakai Static vs Instance?

| Gunakan instance jika... | Gunakan static jika... |
|--------------------------|------------------------|
| Data berbeda per object | Data sama untuk semua object |
| Contoh: nama anggota | Contoh: total anggota |
| Perlu `new` untuk buat | Bisa diakses tanpa object |

**Kapan TIDAK pakai static:** jika data seharusnya milik per-object (misal nama anggota jangan dijadikan static).

### Kesalahan Umum

| Error / Masalah | Penyebab | Solusi |
|-----------------|----------|--------|
| Akses static pakai `->` | `$obj::$prop` salah | Pakai `ClassName::$prop` |
| Ubah constant | `const` tidak bisa diubah | Pakai variable biasa jika perlu ubah |
| Static untuk data per-user | Data seharusnya per instance | Gunakan instance property |

### Hubungan ke Project Thread

- `Config::MAX_PINJAM` → aturan max pinjam (constant)
- `Anggota::$totalAnggota` → counter total anggota (static)
- `$anggota->nama`, `$anggota->bukuDipinjam` → data per anggota (instance)

## Contoh Bertahap

### Langkah 1 — Constant untuk aturan tetap

```php
class Config {
    public const MAX_PINJAM = 3;
}
```

### Langkah 2 — Static counter

```php
class Anggota {
    public static int $totalAnggota = 0;
    public function __construct(...) {
        self::$totalAnggota++;
    }
}
```

### Langkah 3 — Validasi pakai constant

```php
public function pinjamBuku(string $judul): bool {
    if (count($this->bukuDipinjam) >= Config::MAX_PINJAM) {
        return false;
    }
    $this->bukuDipinjam[] = $judul;
    return true;
}
```

## Praktik Terpandu di Kelas

Kerjakan bersama guru (25–45 menit):

1. Buat class `Config` dengan `MAX_PINJAM` dan `NAMA_APP`
2. Buat class `Anggota` dengan static `$totalAnggota`
3. Di constructor, increment `self::$totalAnggota`
4. Buat method `pinjamBuku()` — validasi max pakai `Config::MAX_PINJAM`
5. Buat 2 anggota, pinjam buku sampai ke-4 (harus gagal)
6. Tampilkan `Anggota::getTotalAnggota()`
7. Bandingkan dengan `contoh/pertemuan-07/Anggota.php`

## Checkpoint Pemahaman

Jawab lisan sebelum lanjut:

1. Apa beda `$anggota->nama` dan `Anggota::$totalAnggota`?
2. Mengapa `MAX_PINJAM` pakai `const` bukan variable?
3. Kapan data sebaiknya static, kapan instance?

## Demo Live Coding

```bash
php contoh/pertemuan-07/Anggota.php
```

File demo: [`contoh/pertemuan-07/Anggota.php`](../contoh/pertemuan-07/Anggota.php)

## Struktur 90 Menit

| Waktu | Aktivitas |
|-------|-----------|
| 0–10 | Review polymorphism + kebutuhan "total anggota" |
| 10–25 | Teori static, const, self:: |
| 25–45 | Praktik terpandu: class `Config` + `Anggota` |
| 45–50 | Checkpoint pemahaman |
| 50–75 | Latihan mandiri: counter static |
| 75–85 | Diskusi: kapan pakai static? |
| 85–90 | Refleksi + ringkasan + preview integrasi project |

## Latihan

Lihat: [`latihan/pertemuan-07-latihan.md`](../latihan/pertemuan-07-latihan.md)

## Pertanyaan Diskusi

1. Apa beda `$anggota->nama` dan `Anggota::$totalAnggota`?
2. Mengapa `MAX_PINJAM` pakai `const` bukan variable?
3. Kapan static property berguna?
4. Kapan sebaiknya **tidak** pakai static?

## Refleksi Siswa

Diskusikan di kelas setelah praktik (5 menit):

1. Dengan kata-kata sendiri, apa beda data instance dan static?
2. Di project perpustakaan, data apa yang cocok jadi constant? Static?
3. Satu hal yang masih membingungkan: _______________
4. Bagaimana `Config::MAX_PINJAM` membantu validasi pinjam?

## Tugas Rumah

Lengkapi class `Anggota`: tambah method `getJumlahPinjam()` dan validasi max pinjam pakai `Config::MAX_PINJAM`.

## Ringkasan

- Instance property = milik per object (`$anggota->nama`)
- Static property = milik class, satu untuk semua (`Anggota::$totalAnggota`)
- Constant = nilai tetap, tidak bisa diubah (`Config::MAX_PINJAM`)
- `self::` = akses static/const dari dalam class
- Pakai static untuk data global class; instance untuk data per-object

## Checklist Pemahaman

[`checklist/pertemuan-07-checklist.md`](../checklist/pertemuan-07-checklist.md)
