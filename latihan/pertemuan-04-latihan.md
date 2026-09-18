# Latihan Pertemuan 4 — Encapsulation

**Nama:** ______________________ **Kelas:** __________ **Tanggal:** __________

---

## Bagian A — Konsep (Isian)

1. Property `private` bisa diakses dari luar class? __________

2. Enkapsulasi artinya: _________________________________________

3. Getter digunakan untuk: ________________________________________

4. Method bisnis (misal `pinjam()`) berbeda dari getter karena: _________________________________

---

## Bagian B — Guided: Class Rekening

Lengkapi kode:

```php
<?php

class Rekening {
    private float $saldo = 0;

    public function setor(float $jumlah): void {
        if ($jumlah > 0) {
            $this->saldo += $jumlah;
        }
    }

    public function tarik(float $jumlah): bool {
        if ($jumlah > 0 && $jumlah <= $this->saldo) {
            $this->saldo -= $jumlah;
            return true;
        }
        return false;
    }

    public function getSaldo(): float {
        return $this->____;
    }
}

$rek = new Rekening();
$rek->setor(100000);
$rek->tarik(25000);
echo "Saldo: Rp " . number_format($rek->getSaldo()) . "\n";
```

---

## Bagian C — Mandiri: Refactor Class Buku

Ubah class `Buku` (dari pertemuan 3) agar:
- `$stok` menjadi **private**
- Tambah `getStok(): int`
- Tambah `tambahStok(int $jumlah): void` — hanya jika jumlah > 0
- Tambah `pinjam(int $jumlah): bool` — kurangi stok jika cukup
- Tambah `kembalikan(int $jumlah): void` — tambah stok

Uji: coba akses `$buku->stok` langsung — catat errornya.

```php
<?php

// Kode Anda di sini

```

---

## Bagian D — Class Akun Sederhana

Buat class `Akun`:
- `$username` → public
- `$password` → private
- Method `login(string $password): bool` — return true jika password cocok
- Method `gantiPassword(string $lama, string $baru): bool` — ganti jika password lama benar

```php
<?php

// Kode Anda di sini

```

---

## Bagian E — Uji Pemahaman Error

Jalankan `php contoh/pertemuan-04/BukuEncapsulated.php`, lalu uncomment baris `$buku->stok = 999`.

1. Pesan error lengkap yang muncul:

_______________________________________________________________

2. Mengapa PHP menolak akses tersebut?

_______________________________________________________________

3. Cara yang benar untuk mengetahui stok buku:

_______________________________________________________________

---

## Bagian F — Refleksi

1. Dengan kata-kata sendiri, apa arti enkapsulasi?

_______________________________________________________________

2. Mengapa password sebaiknya `private`?

_______________________________________________________________

3. Di project perpustakaan, property apa yang sebaiknya private? Mengapa?

_______________________________________________________________
