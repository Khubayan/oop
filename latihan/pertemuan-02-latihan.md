# Latihan Pertemuan 2 — Class & Object

**Nama:** ______________________ **Kelas:** __________ **Tanggal:** __________

---

## Bagian A — Konsep (Isian)

1. `$this` artinya: _____________________________________________
2. Jika `$buku1` dan `$buku2` dari class yang sama, apakah datanya sama? __________
3. Mengubah `$buku1->judul` akan mengubah `$buku2->judul`? __________

---

## Bagian B — Guided: Class Buku dengan Loop

Lengkapi kode untuk menampilkan 3 buku:

```php
<?php

class Buku {
    public $judul;
    public $penulis;

    public function info(): void {
        echo "{$this->judul} — {$this->penulis}\n";
    }
}

$daftar = []; //array

$daftar[] = new Buku();
$daftar[0]->judul = "OOP PHP";
$daftar[0]->penulis = "Budi";

// Tambahkan 2 buku lagi ke array $daftar

echo "=== Daftar Buku ===\n";
foreach ($daftar as $buku) {
    $buku->____();
}
```

---



## Bagian C — Mandiri: Class Hewan

Buat class `Hewan` dengan:

- Property: `$nama`, `$jenis`
- Method: `makan()` → "Si {nama} sedang makan"
- Method: `tidur()` → "Si {nama} sedang tidur"

Buat **minimal 3 object** hewan berbeda.

```php
<?php

// Kode Anda di sini

```

---



## Bagian D — Eksplorasi Error

Jalankan kode salah berikut, catat pesan errornya:

```php
$buku = new Buku;
echo $buku->judul; // property belum di-set, apa outputnya?

$buku2 = new Buku;
$buku2->info(); // jika method info() ada, apa outputnya?
```

Error yang ditemukan: ___________________________________________

---



## Bagian E — Refleksi

Kapan menurut Anda `$this` paling berguna?

---

