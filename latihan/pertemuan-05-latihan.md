# Latihan Pertemuan 5 — Inheritance

**Nama:** ______________________ **Kelas:** __________ **Tanggal:** __________

---

## Bagian A — Konsep (Isian)

1. Keyword untuk membuat class turunan: _______________

2. Keyword memanggil constructor parent: _______________

3. Relasi inheritance disebut relasi: _______________ (is-a / has-a)

4. `protected` bisa diakses dari: _______________ (class sendiri / class anak / luar class)

---

## Bagian B — Guided: Class Hewan

```php
<?php

class Hewan {
    protected string $nama;

    public function __construct(string $nama) {
        $this->nama = $nama;
    }

    public function makan(): void {
        echo "{$this->nama} sedang makan\n";
    }
}

class Kucing extends ______ {
    public function suara(): void {
        echo "{$this->nama}: Meong!\n";
    }
}

$kucing = new Kucing("Mimi");
$kucing->makan();
$kucing->suara();
```

---

## Bagian C — Tracing Output

Tanpa menjalankan kode, prediksi output:

```php
class Buku {
    protected string $judul;
    public function __construct(string $judul) { $this->judul = $judul; }
    public function info(): string { return $this->judul; }
}
class BukuFisik extends Buku {
    public function info(): string { return parent::info() . " [Fisik]"; }
}
$b = new BukuFisik("OOP");
echo $b->info();
```

Output yang diharapkan: _______________________________________________

---

## Bagian D — Mandiri: Kendaraan

Buat:
- Class `Kendaraan` — `$merk`, `$tahun`, method `info()`
- Class `Mobil extends Kendaraan` — tambah `$jumlahPintu`, override `info()`
- Class `Motor extends Kendaraan` — tambah `$tipe`, override `info()`

```php
<?php

// Kode Anda di sini

```

---

## Bagian E — Override Method

Tambahkan method `biayaServis()` di `Kendaraan` return 0. Override di `Mobil` return 500000, di `Motor` return 150000.

---

## Bagian F — Refleksi

1. Dengan kata-kata sendiri, apa arti inheritance?

_______________________________________________________________

2. Kapan sebaiknya TIDAK pakai inheritance?

_______________________________________________________________

3. Mengapa `BukuFisik` extends `Buku`, bukan sebaliknya?

_______________________________________________________________
