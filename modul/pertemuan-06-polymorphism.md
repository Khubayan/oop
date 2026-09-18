# Pertemuan 6 — Polymorphism (Polimorfisme)

| | |
|---|---|
| **Pertemuan** | 6 dari 10 |
| **Durasi** | 90 menit |
| **Prasyarat** | Pertemuan 5 — inheritance |

## Tujuan Pembelajaran

Setelah pertemuan ini, siswa mampu:
1. Menjelaskan polimorfisme: satu interface, banyak implementasi
2. Membuat interface dengan keyword `interface`
3. Mengimplementasikan interface dengan `implements`
4. Memproses array object berbeda dengan loop yang sama
5. Memahami type hint interface di parameter function

## Koneksi Pertemuan Sebelumnya

Kita sudah punya `BukuFisik` dan `BukuDigital` (inheritance). Masalah baru:

```php
// Harus handle tiap jenis buku secara terpisah — tidak efisien
foreach ($bukuFisik as $b) { $b->pinjam(); }
foreach ($bukuDigital as $b) { $b->pinjam(); }
```

Polimorfisme memecahkan ini: **satu loop** untuk semua jenis buku, karena semua mengimplementasikan interface yang sama.

## Analogi Dunia Nyata

Tombol "Play" di remote — di TV menampilkan gambar, di speaker memutar suara, di lampu menyalakan lampu. Satu aksi (`play()`), perilaku berbeda per perangkat.

## Materi Teori

### Apa itu Polimorfisme?

Polimorfisme = **banyak bentuk, satu cara akses**. Object berbeda jenis bisa diproses dengan kode yang sama karena mereka memenuhi kontrak (interface) yang sama.

### Interface — Kontrak Method

Interface mendefinisikan method yang **harus** diimplementasikan, tanpa isi method:

```php
interface DapatDipinjam {
    public function pinjam(): bool;
    public function kembalikan(): void;
}
```

**Aturan interface:**
- Semua method harus `public`
- Interface tidak punya property (hanya method)
- Class bisa `implements` lebih dari satu interface

### Implementasi Interface

```php
class BukuFisik implements DapatDipinjam {
    public function pinjam(): bool { /* kurangi stok */ }
    public function kembalikan(): void { /* tambah stok */ }
}

class BukuDigital implements DapatDipinjam {
    public function pinjam(): bool { return true; }  // unlimited
    public function kembalikan(): void { /* tidak perlu */ }
}
```

### Alur Polimorfisme

```
Array [BukuFisik, BukuDigital, BukuFisik]
         ↓
    foreach ($koleksi as $item)
         ↓
    prosesPinjam(DapatDipinjam $item)
         ↓
    $item->pinjam()  → perilaku berbeda per class
```

### Type Hint Interface

```php
function prosesPinjam(DapatDipinjam $item): void {
    $item->pinjam(); // PHP pastikan $item punya method pinjam()
}
```

Parameter hanya menerima object yang `implements DapatDipinjam`.

### Interface vs Inheritance

| Aspek | Inheritance (`extends`) | Interface (`implements`) |
|-------|------------------------|--------------------------|
| Relasi | is-a (anak adalah parent) | can-do (bisa melakukan X) |
| Method | Bisa punya implementasi | Hanya kontrak, tanpa isi |
| Jumlah parent | Satu class parent | Bisa banyak interface |
| Contoh | BukuFisik extends Buku | BukuFisik implements DapatDipinjam |

**Keduanya bisa dipakai bersamaan:** `class BukuFisik extends Buku implements DapatDipinjam`

### Sebelum vs Sesudah Polimorfisme

| Aspek | Tanpa polimorfisme | Dengan polimorfisme |
|-------|-------------------|---------------------|
| Loop pinjam | Satu loop per jenis buku | Satu loop untuk semua |
| Tambah jenis baru | Ubah semua loop | Cukup implement interface |
| Type safety | Cek manual per jenis | PHP cek lewat type hint |

### Kesalahan Umum

| Error / Masalah | Penyebab | Solusi |
|-----------------|----------|--------|
| Class must implement interface | Method interface belum diimplementasi | Tambah semua method yang diminta |
| Type error di parameter | Object tidak implements interface | Pastikan class `implements` interface |
| Interface punya property | Interface hanya untuk method | Pindahkan property ke class |

### Hubungan ke Project Thread

- Interface `DapatDipinjam` → kontrak pinjam/kembali
- `BukuFisik` dan `BukuDigital` → implement dengan perilaku berbeda
- `Perpustakaan::pinjam()` → proses semua jenis buku lewat satu method

## Contoh Bertahap

### Langkah 1 — Definisikan interface

```php
interface DapatDipinjam {
    public function pinjam(): bool;
    public function kembalikan(): void;
}
```

### Langkah 2 — Implement di 2 class

```php
class BukuFisik implements DapatDipinjam { /* ... */ }
class BukuDigital implements DapatDipinjam { /* ... */ }
```

### Langkah 3 — Satu loop untuk semua

```php
$koleksi = [new BukuFisik(...), new BukuDigital(...)];
foreach ($koleksi as $item) {
    prosesPinjam($item);  // type hint DapatDipinjam
}
```

## Praktik Terpandu di Kelas

Kerjakan bersama guru (25–45 menit):

1. Buat interface `DapatDipinjam` dengan 3 method
2. Implement di `BukuFisik` — `pinjam()` kurangi stok, return false jika habis
3. Implement di `BukuDigital` — `pinjam()` selalu return true
4. Buat function `prosesPinjam(DapatDipinjam $item)`
5. Buat array berisi fisik + digital, loop dan panggil `prosesPinjam()`
6. Uji skenario stok habis — lihat output "Gagal pinjam"
7. Bandingkan dengan `contoh/pertemuan-06/DapatDipinjam.php`

## Checkpoint Pemahaman

Jawab lisan sebelum lanjut:

1. Apa beda interface dan class?
2. Mengapa `BukuDigital::pinjam()` selalu return true?
3. Apa keuntungan satu loop untuk semua jenis buku?

## Demo Live Coding

```bash
php contoh/pertemuan-06/DapatDipinjam.php
```

File demo: [`contoh/pertemuan-06/DapatDipinjam.php`](../contoh/pertemuan-06/DapatDipinjam.php)

**Eksperimen:** Uncomment bagian skenario stok habis di demo untuk melihat polimorfisme saat pinjam gagal.

## Struktur 90 Menit

| Waktu | Aktivitas |
|-------|-----------|
| 0–10 | Review inheritance + masalah loop buku fisik & digital |
| 10–25 | Teori interface dan polimorfisme |
| 25–45 | Praktik terpandu: interface `DapatDipinjam` |
| 45–50 | Checkpoint pemahaman |
| 50–75 | Latihan mandiri: interface `Bentuk` |
| 75–85 | Diskusi: interface vs inheritance |
| 85–90 | Refleksi + ringkasan + preview static |

## Latihan

Lihat: [`latihan/pertemuan-06-latihan.md`](../latihan/pertemuan-06-latihan.md)

## Pertanyaan Diskusi

1. Apa beda interface dan class?
2. Mengapa `BukuDigital::pinjam()` selalu return true?
3. Kapan polimorfisme berguna di project nyata?
4. Kapan interface lebih tepat daripada inheritance?

## Refleksi Siswa

Diskusikan di kelas setelah praktik (5 menit):

1. Dengan kata-kata sendiri, apa arti polimorfisme?
2. Apa keuntungan interface dibanding inheritance saja?
3. Di project perpustakaan, method apa yang cocok masuk interface?
4. Satu hal yang masih membingungkan: _______________

## Tugas Rumah

Integrasikan interface `DapatDipinjam` ke class `BukuFisik` dan `BukuDigital` project thread.

## Ringkasan

- Polimorfisme = satu cara akses, banyak implementasi berbeda
- Interface = kontrak method yang harus diimplementasikan
- `implements` = class berjanji punya semua method interface
- Type hint interface di parameter = hanya terima object yang implement
- Satu loop bisa proses semua jenis object yang implement interface sama

## Checklist Pemahaman

[`checklist/pertemuan-06-checklist.md`](../checklist/pertemuan-06-checklist.md)
