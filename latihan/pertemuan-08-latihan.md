# Latihan Pertemuan 8 — Integrasi

**Nama:** ______________________ **Kelas:** __________ **Tanggal:** __________

---

## Bagian A — Konsep (Isian)

1. Perpustakaan punya buku — relasi ini disebut: _______________ (is-a / has-a)

2. Keyword untuk include file PHP: _______________

3. Type hint `DapatDipinjam` di parameter artinya: ___________________________

4. Method `cariBuku()` return `null` jika: _________________________________

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

## Bagian C — Tracing Alur

Urutkan langkah saat menjalankan `demo.php`:

| Langkah | Urutan (1, 2, 3...) |
|---------|---------------------|
| require_once semua class | |
| new Perpustakaan() | |
| tambahBuku() dan tambahAnggota() | |
| tampilkanBuku() dan tampilkanAnggota() | |

---

## Bagian D — Mandiri: Project Starter

Di folder `project/perpustakaan-starter/`:

1. Lengkapi `Config.php` dengan 3 constant
2. Lengkapi `Perpustakaan.php`: `tambahBuku`, `tambahAnggota`, `tampilkanBuku`, `tampilkanAnggota`
3. Buat script uji yang menambah 2 buku dan 1 anggota

---

## Bagian E — Refleksi

1. Mengapa class dipisah ke beberapa file?

_______________________________________________________________

2. Bagian integrasi mana yang paling menantang?

_______________________________________________________________

3. Mengapa `Perpustakaan` menggunakan komposisi, bukan inheritance?

_______________________________________________________________
