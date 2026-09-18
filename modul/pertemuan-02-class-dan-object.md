# Pertemuan 2 — Class & Object


|               |                                      |
| ------------- | ------------------------------------ |
| **Pertemuan** | 2 dari 10                            |
| **Durasi**    | 90 menit                             |
| **Prasyarat** | Pertemuan 1 — class dan object dasar |


## Tujuan Pembelajaran

Setelah pertemuan ini, siswa mampu:

1. Menjelaskan fungsi `$this` sebagai referensi object saat ini
2. Membuat beberapa instance (object) dari satu class
3. Memahami bahwa data antar object saling independen
4. Mengidentifikasi error umum (typo property, lupa `new`)

## Analogi Dunia Nyata

Satu resep kue (class), tapi setiap kue yang dihasilkan (object) bisa punya dekorasi dan rasa berbeda. Mengubah kue A tidak mengubah kue B.

## Materi Teori



### `$this` = "saya sendiri"

Di dalam class, `$this` merujuk ke object yang sedang memanggil method.

```php
public function info(): void {
    echo $this->judul; // property object ini
}
```



### Multi-Instance

```php
$buku1 = new Buku();
$buku1->judul = "OOP";

$buku2 = new Buku();
$buku2->judul = "PHP";

// $buku1 dan $buku2 punya data terpisah
```



### Error Umum


| Error                                  | Penyebab                      |
| -------------------------------------- | ----------------------------- |
| Undefined property                     | Typo nama property            |
| Call to member function on null        | Lupa `new`                    |
| Using $this when not in object context | Method dipanggil tanpa object |




## Demo Live Coding

Jalankan: `php contoh/pertemuan-02/MultiBuku.php`

File demo: `[contoh/pertemuan-02/MultiBuku.php](../contoh/pertemuan-02/MultiBuku.php)`

## Struktur 90 Menit


| Waktu | Aktivitas                         |
| ----- | --------------------------------- |
| 0–10  | Review pertemuan 1 + quiz singkat |
| 10–25 | Teori `$this` dan multi-instance  |
| 25–45 | Demo 3 object buku berbeda        |
| 45–75 | Latihan class `Hewan`             |
| 75–85 | Eksplorasi error (sengaja salah)  |
| 85–90 | Ringkasan + preview constructor   |




## Latihan

Lihat: `[latihan/pertemuan-02-latihan.md](../latihan/pertemuan-02-latihan.md)`

## Pertanyaan Diskusi

1. Apa arti `$this`? Mengapa tidak pakai nama variable biasa?
2. Jika `$buku1->judul` diubah, apakah `$buku2->judul` ikut berubah?
3. Berapa banyak object yang bisa dibuat dari 1 class?



## Tugas Rumah

Lanjutkan thread project: buat 5 object class `Buku` dengan data berbeda, tampilkan semuanya dengan loop `foreach`.

## Checklist Pemahaman

`[checklist/pertemuan-02-checklist.md](../checklist/pertemuan-02-checklist.md)`