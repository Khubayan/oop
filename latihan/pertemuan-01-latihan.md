# Latihan Pertemuan 1 — Pengenalan OOP

**Nama:** ______________________ **Kelas:** __________ **Tanggal:** __________

---

## Bagian A — Konsep (Isian)

1. Class adalah: _______________________________________________

2. Object dibuat dengan keyword: _______________

3. Property adalah: _____________________________________________

4. Method adalah: _______________________________________________

5. Operator untuk akses property/method object: _______________

---

## Bagian B — Guided: Class Produk

Lengkapi kode berikut:

```php
<?php

class Produk {
    public $nama = "Laptop";
    public $harga = 5000000;
    public $stok = 10;

    public function info(): void {
        echo "Produk: {$this->____}, Harga: Rp {$this->____}, Stok: {$this->____}\n";
    }

    public function jual(int $jumlah): void {
        if ($this->stok >= $jumlah) {
            $this->stok -= $jumlah;
            echo "Terjual {$jumlah} unit. Sisa stok: {$this->____}\n";
        } else {
            echo "Stok tidak cukup!\n";
        }
    }
}

$produk = new ______();
$produk->info();
$produk->jual(3);
$produk->info();
```

---

## Bagian C — Mandiri: Class Mobil

Buat class `Mobil` dengan:
- Property: `$merk`, `$warna`, `$tahun`
- Method: `info()` — tampilkan semua data
- Method: `klakson()` — tampilkan "Tut tut!"

Buat **2 object** mobil berbeda, panggil semua method.

**Tulis kode di bawah atau lampirkan file:**

```php
<?php

// Kode Anda di sini

```

---

## Bagian D — Refleksi

Apa yang masih membingungkan?

_______________________________________________________________

_______________________________________________________________
