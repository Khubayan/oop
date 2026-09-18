# Latihan Pertemuan 7 — Static & Constant

**Nama:** ______________________ **Kelas:** __________ **Tanggal:** __________

---

## Bagian A — Konsep (Isian)

1. Static property milik: _______________ (class / object)

2. Constant dideklarasikan dengan: _______________

3. Akses static dari dalam class: _______________

4. `$anggota->nama` adalah data _______________ (instance / static)

5. `Anggota::$totalAnggota` adalah data _______________ (instance / static)

---

## Bagian B — Guided: Counter

```php
<?php

class Buku {
    public static int $totalBuku = 0;

    public function __construct(public string $judul) {
        self::$______++;
    }

    public static function getTotal(): int {
        return self::$totalBuku;
    }
}

new Buku("OOP");
new Buku("PHP");
new Buku("Algoritma");

echo "Total buku: " . Buku::______() . "\n";
```

---

## Bagian C — Identifikasi Instance vs Static

Tandai (I) untuk Instance atau (S) untuk Static:

| Kode | I / S |
|------|-------|
| `$anggota->nama` | |
| `Anggota::$totalAnggota` | |
| `Config::MAX_PINJAM` | |
| `$anggota->pinjamBuku("OOP")` | |
| `Anggota::getTotalAnggota()` | |

---

## Bagian D — Mandiri: Config & Anggota

Buat class `Config` dengan:
- `const MAX_PINJAM = 3`
- `const NAMA_APP = "Perpustakaan Mini"`

Buat class `Anggota` dengan:
- Constructor: `$nama`, `$idAnggota`
- Static: `$totalAnggota`
- Method: `pinjamBuku(string $judul)` — max sesuai `Config::MAX_PINJAM`
- Method: `profil()` — tampilkan nama, id, jumlah buku dipinjam

```php
<?php

// Kode Anda di sini

```

---

## Bagian E — Refleksi

1. Dengan kata-kata sendiri, apa beda data instance dan static?

_______________________________________________________________

2. Kapan sebaiknya pakai static vs instance property?

_______________________________________________________________

3. Mengapa `MAX_PINJAM` pakai `const` bukan variable biasa?

_______________________________________________________________
