# Pertemuan 10 — Project Akhir & Evaluasi

| | |
|---|---|
| **Pertemuan** | 10 dari 10 |
| **Durasi** | 90 menit |
| **Prasyarat** | Project Perpustakaan Mini (pertemuan 8–9) |

## Tujuan Pembelajaran

Setelah pertemuan ini, siswa mampu:
1. Menyajikan project OOP secara lisan (demo + penjelasan konsep)
2. Menjelaskan pilar OOP yang dipakai di project
3. Melakukan self-assessment dengan checklist akhir modul
4. Debug error umum secara mandiri

## Koneksi Pertemuan Sebelumnya

Pertemuan 1–9 membangun project Sistem Perpustakaan Mini langkah demi langkah. Pertemuan ini adalah **penutup**: finalisasi, presentasi, evaluasi, dan refleksi atas seluruh perjalanan belajar OOP.

## Materi Teori

### 4 Pilar OOP di Project Perpustakaan

| Pilar | Arti | Contoh di Project |
|-------|------|-------------------|
| **Class & Object** | Blueprint dan instance | `new BukuFisik(...)`, `new Anggota(...)` |
| **Encapsulation** | Data private, akses lewat method | `$stok` private, `pinjam()`, `getStok()` |
| **Inheritance** | Class anak mewarisi parent | `BukuFisik extends Buku` |
| **Polymorphism** | Satu interface, banyak implementasi | `DapatDipinjam`, loop `$koleksi` |

### Panduan Presentasi (3–5 menit)

1. **Demo program jalan** — tampilkan buku, pinjam, kembali, denda
2. **Jelaskan 4 pilar OOP** — tunjuk di kode (buka file, tunjuk baris)
3. **Sebut 1 kesulitan** — dan cara mengatasinya
4. **Struktur presentasi:** intro → demo → penjelasan konsep → penutup

### Debug Sistematis

Saat error, ikuti langkah ini:

```
1. Baca pesan error lengkap (baris, file, jenis error)
2. Cek file yang disebut — apakah ada typo?
3. Cek require_once — class sudah di-load?
4. Cek type hint — object implements interface yang benar?
5. Cek validasi — skenario apa yang memicu error?
```

### FAQ Error Umum

| Error | Penyebab | Solusi |
|-------|----------|--------|
| Class not found | Lupa `require_once` | Tambah require di main.php |
| Cannot access private | Akses langsung property private | Pakai getter/method |
| Call to undefined method | Typo atau belum implement interface | Cek `implements` interface |
| Stok negatif | Validasi pinjam kurang | Cek stok sebelum kurangi |

## Praktik Terpandu di Kelas

### Sesi Debug Bersama (15 menit)

Guru tunjukkan 3 error umum, siswa bantu diagnosa:
1. Hapus satu `require_once` → Class not found
2. Akses `$buku->stok` langsung → Cannot access private
3. Lupa implement method interface → Fatal error

### Latihan Presentasi (10 menit)

Siswa latihan presentasi 3 menit ke partner:
- Demo 1 skenario pinjam
- Tunjuk 1 contoh encapsulation di kode
- Sebut 1 kesulitan

## Checkpoint Pemahaman

Sebelum presentasi, pastikan bisa menjawab:

1. Di mana encapsulation di project Anda?
2. Di mana inheritance di project Anda?
3. Di mana polymorphism di project Anda?

## Demo Referensi

```bash
php contoh/pertemuan-10/demo-perpustakaan.php
```

File demo: [`contoh/pertemuan-10/demo-perpustakaan.php`](../contoh/pertemuan-10/demo-perpustakaan.php)

## Aktivitas Pertemuan

| Waktu | Aktivitas |
|-------|-----------|
| 0–15 | Finalisasi project (buffer waktu) |
| 15–20 | Checkpoint: siap tunjuk 4 pilar OOP di kode |
| 20–55 | Presentasi siswa (3–5 menit/orang atau per kelompok) |
| 55–70 | Peer review + Q&A |
| 70–85 | Checklist akhir modul + refleksi |
| 85–90 | Penutup + preview materi lanjutan (framework PHP) |

## Latihan

Lihat: [`latihan/pertemuan-10-latihan.md`](../latihan/pertemuan-10-latihan.md)

## Pertanyaan Diskusi

1. Konsep OOP mana yang paling sulit dipahami?
2. Konsep OOP mana yang paling berguna di project?
3. Apa yang akan berbeda jika project ini ditulis procedural?
4. Apa yang ingin dipelajari selanjutnya (framework PHP, database)?

## Refleksi Siswa

Isi di worksheet dan diskusikan (10 menit):

1. Konsep OOP mana yang paling sulit?
2. Konsep OOP mana yang paling berguna di project?
3. Satu hal yang saya banggakan dari project ini: _______________
4. Apa yang ingin dipelajari selanjutnya?
5. Jika mulai dari awal, apa yang akan saya lakukan berbeda?

## Evaluasi

- Rubrik project: [`rubrik/project-akhir.md`](../rubrik/project-akhir.md)
- Checklist akhir: [`checklist/checklist-keseluruhan.md`](../checklist/checklist-keseluruhan.md)
- Spesifikasi: [`project/spesifikasi-project.md`](../project/spesifikasi-project.md)

## Ringkasan Modul OOP

- **Class & Object** — fondasi: data dan method dalam satu unit
- **Encapsulation** — lindungi data, validasi di method
- **Inheritance** — hierarki is-a, hindari duplikasi kode
- **Polymorphism** — satu interface, proses berbagai jenis object
- **Static & Constant** — data/aturan milik class
- **Integrasi** — gabungkan semua dalam aplikasi nyata

## Checklist Pemahaman

[`checklist/pertemuan-10-checklist.md`](../checklist/pertemuan-10-checklist.md)
