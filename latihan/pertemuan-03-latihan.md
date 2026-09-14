# Latihan Pertemuan 3 — Constructor

**Nama:** ______________________ **Kelas:** __________ **Tanggal:** __________

---

## Bagian A — Konsep (Isian)

1. Constructor adalah method: _______________

2. Constructor dipanggil saat: ___________________________________

3. Default value berguna untuk: __________________________________

---

## Bagian B — Guided: Class Buku dengan Constructor

Lengkapi kode:

```php
<?php

class Buku {
    public function __construct(
        public string $judul,
        public string $penulis,
        public int $tahun,
        public int $stok = ____
    ) {}

    public function info(): string {
        return "{$this->judul} — {$this->penulis} ({$this->tahun}), stok: {$this->stok}";
    }
}

$buku1 = new Buku("Belajar OOP", "Pak Guru", 2026, 5);
$buku2 = new Buku("PHP Dasar", "Budi", 2025); // stok default

echo $buku1->info() . "\n";
echo $buku2->info() . "\n";
```

---

## Bagian C — Mandiri: Class Anggota Perpustakaan

Buat class `Anggota` dengan constructor:
- `$nama` (string)
- `$idAnggota` (string)
- `$email` (string, default: `"tidak-ada@email.com"`)

Method:
- `profil()` — tampilkan semua data
- `tampilkanId()` — return id anggota

Buat 2 object anggota berbeda.

```php
<?php

// Kode Anda di sini

```

---

## Bagian D — Validasi di Constructor

Tambahkan validasi pada class `Buku`: jika `$stok < 0`, set ke `0`.

```php
public function __construct(/* ... */) {
    // tambahkan validasi stok di sini
}
```

---

## Bagian E — Refleksi

Apa keuntungan constructor dibanding set property manual?

_______________________________________________________________
