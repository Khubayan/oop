# Pertemuan 5 — Inheritance (Pewarisan)

| | |
|---|---|
| **Pertemuan** | 5 dari 10 |
| **Durasi** | 90 menit |
| **Prasyarat** | Pertemuan 4 — encapsulation |

## Tujuan Pembelajaran

Setelah pertemuan ini, siswa mampu:
1. Menjelaskan relasi "is-a" (adalah) untuk inheritance
2. Membuat class turunan dengan keyword `extends`
3. Memanggil constructor parent dengan `parent::__construct()`
4. Override method parent dan memakai `parent::method()`
5. Memahami access modifier `protected`

## Koneksi Pertemuan Sebelumnya

Class `Buku` sudah punya enkapsulasi (stok private, method `pinjam()`). Tapi di perpustakaan ada **beberapa jenis buku**:
- Buku fisik — punya rak, stok terbatas
- Buku digital — punya format (PDF/EPUB), stok "unlimited"

Jika kita buat class terpisah tanpa inheritance, kode `judul`, `penulis`, `info()` akan **terduplikasi**. Inheritance memecahkan ini: class anak mewarisi sifat parent, lalu menambah keunikan sendiri.

## Analogi Dunia Nyata

Anak mewarisi sifat orang tua: `Kucing` **adalah** `Hewan`. Kucing punya sifat hewan (makan, tidur) plus keunikan sendiri (meong). Kucing bukan "memiliki" hewan — kucing **adalah** hewan.

## Materi Teori

### Apa itu Inheritance?

Inheritance (pewarisan) = class anak **mewarisi** property dan method dari class induk, lalu bisa menambah atau mengubah perilaku.

```php
class BukuFisik extends Buku {
    // mewarisi $judul, $penulis, info(), getStok()
    // + tambah property $rak
}
```

### Hierarki Class di Project

```
        Buku (parent)
       /            \
BukuFisik        BukuDigital
(+ rak)          (+ format)
```

### Relasi is-a vs has-a

| Relasi | Arti | Keyword | Contoh |
|--------|------|---------|--------|
| **is-a** | Adalah bagian dari | `extends` | BukuFisik **adalah** Buku |
| **has-a** | Memiliki / punya | property array | Perpustakaan **punya** Buku |

Inheritance untuk relasi **is-a**. Jika relasi **has-a**, gunakan komposisi (dibahas pertemuan 8).

### `parent::` — Memanggil Induk

Saat class anak punya constructor sendiri, **wajib** panggil constructor parent:

```php
class BukuFisik extends Buku {
    public function __construct(string $judul, string $penulis, int $stok, private string $rak) {
        parent::__construct($judul, $penulis, $stok);  // inisialisasi parent dulu
    }
}
```

Untuk override method, pakai `parent::method()` agar tidak menulis ulang seluruh logika:

```php
public function info(): string {
    return parent::info() . " [Fisik, Rak: {$this->rak}]";
}
```

### Override Method

Override = class anak **mengganti** implementasi method parent dengan versi sendiri. Nama method sama, isi berbeda.

PHP **tidak** mendukung method overload (dua method sama nama, parameter beda). Satu class hanya punya satu method dengan nama tertentu.

### `protected` — Akses untuk Anak

| Modifier | Dari class sendiri | Dari class anak | Dari luar |
|----------|-------------------|-----------------|-----------|
| `private` | Ya | Tidak | Tidak |
| `protected` | Ya | Ya | Tidak |
| `public` | Ya | Ya | Ya |

Gunakan `protected` untuk property yang perlu diakses class anak (misal `$judul` di class `Buku`).

### Sebelum vs Sesudah Inheritance

| Aspek | Tanpa inheritance | Dengan inheritance |
|-------|-------------------|-------------------|
| Kode `info()` | Duplikat di setiap class | Satu di parent, override jika perlu |
| Perubahan `Buku` | Harus ubah semua class | Cukup ubah parent |
| Relasi antar class | Tidak jelas | Hierarki is-a jelas |

### Kesalahan Umum

| Error / Masalah | Penyebab | Solusi |
|-----------------|----------|--------|
| Property parent tidak terisi | Lupa `parent::__construct()` | Panggil parent di constructor anak |
| `Cannot access protected property` | Akses dari luar class | Pakai getter/method public |
| Inheritance berlebihan | Relasi sebenarnya has-a | Gunakan komposisi, bukan extends |

### Hubungan ke Project Thread

- `Buku` → class parent dengan property dasar
- `BukuFisik extends Buku` → tambah `$rak`, stok terbatas
- `BukuDigital extends Buku` → tambah `$format`, stok unlimited

## Contoh Bertahap

### Langkah 1 — Parent class

```php
class Buku {
    protected string $judul;
    public function info(): string { return $this->judul; }
}
```

### Langkah 2 — Class anak dengan extends

```php
class BukuFisik extends Buku {
    private string $rak;
    public function info(): string {
        return parent::info() . " [Rak: {$this->rak}]";
    }
}
```

### Langkah 3 — Constructor anak memanggil parent

```php
public function __construct(string $judul, string $rak) {
    parent::__construct($judul);
    $this->rak = $rak;
}
```

## Praktik Terpandu di Kelas

Kerjakan bersama guru (25–45 menit):

1. Buka `contoh/pertemuan-05/BukuInheritance.php` — baca hierarki class
2. Buat class `Buku` parent dengan `protected` property
3. Buat `BukuFisik extends Buku` — panggil `parent::__construct()`
4. Override `info()` dengan `parent::info() . " [Fisik]"`
5. Buat `BukuDigital extends Buku` — override `info()` berbeda
6. Jalankan dan bandingkan output kedua class anak
7. (Opsional) Buka `KesalahanInheritance.php` — lihat akibat lupa `parent::__construct()`

## Checkpoint Pemahaman

Jawab lisan sebelum lanjut:

1. Apa arti relasi "is-a"? Berikan contoh selain buku.
2. Kapan wajib memanggil `parent::__construct()`?
3. Apa beda override dan membuat method baru?

## Demo Live Coding

```bash
php contoh/pertemuan-05/BukuInheritance.php
php contoh/pertemuan-05/KesalahanInheritance.php   # demo error (opsional)
```

File demo:
- [`contoh/pertemuan-05/BukuInheritance.php`](../contoh/pertemuan-05/BukuInheritance.php)
- [`contoh/pertemuan-05/KesalahanInheritance.php`](../contoh/pertemuan-05/KesalahanInheritance.php)

## Struktur 90 Menit

| Waktu | Aktivitas |
|-------|-----------|
| 0–10 | Review enkapsulasi + diskusi "buku fisik vs digital beda apa?" |
| 10–25 | Teori inheritance + tabel is-a vs has-a |
| 25–45 | Praktik terpandu: `BukuFisik` dan `BukuDigital` |
| 45–50 | Checkpoint pemahaman |
| 50–75 | Latihan mandiri: `Kendaraan` → `Mobil`/`Motor` |
| 75–85 | Diskusi: kapan pakai inheritance? |
| 85–90 | Refleksi + ringkasan + preview interface |

## Latihan

Lihat: [`latihan/pertemuan-05-latihan.md`](../latihan/pertemuan-05-latihan.md)

## Pertanyaan Diskusi

1. Apa beda "is-a" dan "has-a"?
2. Kapan sebaiknya pakai `protected` bukan `private`?
3. Mengapa override method parent?
4. Kapan sebaiknya **tidak** pakai inheritance?

## Refleksi Siswa

Diskusikan di kelas setelah praktik (5 menit):

1. Dengan kata-kata sendiri, apa arti inheritance?
2. Mengapa `BukuFisik` extends `Buku`, bukan sebaliknya?
3. Satu kesulitan saat membuat class anak: _______________
4. Bagaimana inheritance membantu project perpustakaan?

## Tugas Rumah

Tambahkan class `BukuAudio` extends `Buku` dengan property `$durasi` (menit).

## Ringkasan

- Inheritance = class anak mewarisi sifat parent (`extends`)
- Relasi **is-a**: BukuFisik **adalah** Buku
- `parent::__construct()` wajib dipanggil di constructor anak
- Override = ganti implementasi method, pakai `parent::method()` untuk memanggil versi induk
- `protected` = bisa diakses class anak, tidak dari luar

## Checklist Pemahaman

[`checklist/pertemuan-05-checklist.md`](../checklist/pertemuan-05-checklist.md)
