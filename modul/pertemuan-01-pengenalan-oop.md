# Pertemuan 1 — Pengenalan OOP


|               |                                                |
| ------------- | ---------------------------------------------- |
| **Pertemuan** | 1 dari 10                                      |
| **Durasi**    | 90 menit                                       |
| **Prasyarat** | Variabel, array, function, kondisi, perulangan |


## Tujuan Pembelajaran

Setelah pertemuan ini, siswa mampu:

1. Menjelaskan perbedaan pemrograman procedural dan OOP dengan analogi sederhana
2. Membedakan class, object, property, dan method
3. Membuat class PHP sederhana dengan property public
4. Membuat object menggunakan keyword `new`
5. Memanggil method object dengan operator `->`

## Analogi Dunia Nyata


| Dunia Nyata       | OOP / PHP    |
| ----------------- | ------------ |
| Cetakan kue       | **Class**    |
| Kue hasil cetakan | **Object**   |
| Rasa, warna kue   | **Property** |
| Kue bisa dimakan  | **Method**   |


**Mengapa OOP?** Data dan fungsi dikelompokkan dalam satu unit (class), sehingga lebih terorganisir saat program membesar.

## Materi Teori



### Procedural vs OOP

**Procedural** — data terpisah dari fungsi:

```php
$judul1 = "PHP Dasar"; $penulis1 = "Budi";
$judul2 = "OOP PHP";   $penulis2 = "Ani";
```

**OOP** — data dan fungsi dalam satu class:

```php
$buku1 = new Buku();
$buku2 = new Buku();
```



### Struktur Class Dasar

```php
class NamaClass {
    public $property;

    public function namaMethod(): void {
        // kode
    }
}
```



###                   Membuat Object

```php
$object = new NamaClass();
$object->property = "nilai";
$object->namaMethod();
```



## Demo Live Coding

Jalankan: `php contoh/pertemuan-01/Buku.php`

File demo: `[contoh/pertemuan-01/Buku.php](../contoh/pertemuan-01/Buku.php)`

## Struktur 90 Menit


| Waktu | Aktivitas                                  |
| ----- | ------------------------------------------ |
| 0–10  | Warm-up: tanya "Apa beda data dan fungsi?" |
| 10–25 | Teori + analogi cetakan kue                |
| 25–45 | Demo live coding class `Buku`              |
| 45–75 | Latihan mandiri (worksheet)                |
| 75–85 | Diskusi: beda `$buku1` dan `$buku2`        |
| 85–90 | Ringkasan + preview pertemuan 2            |




## Latihan

Lihat: `[latihan/pertemuan-01-latihan.md](../latihan/pertemuan-01-latihan.md)`

## Pertanyaan Diskusi

1. Apa perbedaan class dan object? Berikan analogi sendiri.
2. Mengapa kita pakai `->` bukan `.`?
3. Apa yang terjadi jika kita buat 2 object dari class yang sama?
4. Kapan sebaiknya kita pakai OOP?



## Tugas Rumah

Buat class `Mobil` dengan property `$merk`, `$warna` dan method `info()`. Buat 2 object mobil berbeda.

## Checklist Pemahaman

`[checklist/pertemuan-01-checklist.md](../checklist/pertemuan-01-checklist.md)`