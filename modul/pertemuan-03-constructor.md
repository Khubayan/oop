# Pertemuan 3 — Constructor

| | |
|---|---|
| **Pertemuan** | 3 dari 10 |
| **Durasi** | 90 menit |
| **Prasyarat** | Pertemuan 2 — `$this`, multi-instance |

## Tujuan Pembelajaran

Setelah pertemuan ini, siswa mampu:
1. Menjelaskan fungsi constructor (`__construct`)
2. Menginisialisasi property saat object dibuat
3. Menggunakan parameter constructor dengan default value
4. Memakai constructor property promotion (PHP 8+)

## Analogi Dunia Nyata

Constructor = **formulir pendaftaran** yang wajib diisi saat object pertama kali "dilahirkan". Tanpa formulir, data tidak lengkap.

## Materi Teori

### Constructor

Method khusus yang otomatis dipanggil saat `new`:

```php
public function __construct(string $judul, string $penulis) {
    $this->judul = $judul;
    $this->penulis = $penulis;
}
```

### Property Promotion (PHP 8+)

Lebih ringkas — parameter langsung jadi property:

```php
public function __construct(
    public string $judul,
    public string $penulis,
    public int $stok = 0
) {}
```

### Default Value

Parameter dengan default value bersifat opsional:
```php
new Buku("Judul", "Penulis"); // stok = 0
new Buku("Judul", "Penulis", 2026, 5); // stok = 5
```

## Demo Live Coding

Jalankan: `php contoh/pertemuan-03/BukuConstructor.php`

File demo: [`contoh/pertemuan-03/BukuConstructor.php`](../contoh/pertemuan-03/BukuConstructor.php)

## Struktur 90 Menit

| Waktu | Aktivitas |
|-------|-----------|
| 0–10 | Review: masalah set property satu per satu |
| 10–25 | Teori constructor + analogi formulir |
| 25–45 | Demo class `Buku` dengan constructor |
| 45–75 | Latihan class `Anggota` |
| 75–85 | Diskusi: kapan pakai default value? |
| 85–90 | Ringkasan + preview enkapsulasi |

## Latihan

Lihat: [`latihan/pertemuan-03-latihan.md`](../latihan/pertemuan-03-latihan.md)

## Pertanyaan Diskusi

1. Kapan constructor dipanggil?
2. Apa beda set property manual vs lewat constructor?
3. Mengapa default value `$stok = 0` berguna?

## Tugas Rumah

Refactor class `Buku` dari pertemuan 2 agar memakai constructor. Tambahkan validasi: jika stok negatif, set ke 0.

## Checklist Pemahaman

[`checklist/pertemuan-03-checklist.md`](../checklist/pertemuan-03-checklist.md)
