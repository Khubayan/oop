# Latihan Pertemuan 6 — Polymorphism

**Nama:** ______________________ **Kelas:** __________ **Tanggal:** __________

---

## Bagian A — Konsep (Isian)

1. Interface dideklarasikan dengan keyword: _______________

2. Class mengimplementasikan interface dengan: _______________

3. Polimorfisme artinya: ________________________________________

4. Type hint `DapatDipinjam` di parameter artinya parameter harus: _________________________________

---

## Bagian B — Guided: Interface Bentuk

Lengkapi:

```php
<?php

interface Bentuk {
    public function luas(): float;
}

class Persegi implements ______ {
    public function __construct(private float $sisi) {}

    public function luas(): float {
        return $this->sisi * $this->____;
    }
}

class Lingkaran implements Bentuk {
    public function __construct(private float $jariJari) {}

    public function luas(): float {
        return 3.14 * $this->jariJari * $this->jariJari;
    }
}

$bentuk = [new Persegi(4), new Lingkaran(7)];
foreach ($bentuk as $b) {
    echo "Luas: " . $b->____() . "\n";
}
```

---

## Bagian C — Tracing Output

Tanpa menjalankan, prediksi output (urutan baris):

```php
interface DapatDipinjam { public function pinjam(): bool; }
class A implements DapatDipinjam { public function pinjam(): bool { return true; } }
class B implements DapatDipinjam { public function pinjam(): bool { return false; } }
$items = [new A(), new B()];
foreach ($items as $i) {
    echo $i->pinjam() ? "OK\n" : "Gagal\n";
}
```

Output:
1. __________
2. __________

---

## Bagian D — Mandiri: DapatDipinjam

Buat interface `DapatDipinjam` dengan method `pinjam(): bool` dan `kembalikan(): void`.

Implementasikan di 2 class berbeda (misal `BukuFisik` dan `BukuDigital`).

Buat function `prosesPinjam(DapatDipinjam $item)` yang memanggil `pinjam()`.

```php
<?php

// Kode Anda di sini

```

---

## Bagian E — Refleksi

1. Dengan kata-kata sendiri, apa arti polimorfisme?

_______________________________________________________________

2. Apa beda interface dan class biasa?

_______________________________________________________________

3. Kapan interface lebih tepat daripada inheritance?

_______________________________________________________________
