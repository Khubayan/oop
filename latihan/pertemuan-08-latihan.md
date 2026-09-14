# Latihan Pertemuan 8 — Integrasi

**Nama:** ______________________ **Kelas:** __________ **Tanggal:** __________

---

## Bagian A — Konsep (Isian)

1. Perpustakaan punya buku — relasi ini disebut: _______________ (is-a / has-a)

2. Keyword untuk include file PHP: _______________

3. Type hint `DapatDipinjam` di parameter artinya: ___________________________

---

## Bagian B — Guided: Class Perpustakaan Sederhana

Lengkapi:

```php
<?php

class Perpustakaan {
    private array $buku = [];

    public function tambahBuku($buku): void {
        $this->buku[] = $____;
    }

    public function tampilkanBuku(): void {
        foreach ($this->____ as $b) {
            echo "- {$b->getInfo()}\n";
        }
    }
}
```

---

## Bagian C — Mandiri: Project Starter

Di folder `project/perpustakaan-starter/`:

1. Lengkapi `Config.php` dengan 3 constant
2. Lengkapi `Perpustakaan.php`: `tambahBuku`, `tambahAnggota`, `tampilkanBuku`, `tampilkanAnggota`
3. Buat script uji yang menambah 2 buku dan 1 anggota

---

## Refleksi

Mengapa class dipisah ke beberapa file?

_______________________________________________________________
