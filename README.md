# Materi OOP PHP — RPL Kelas 12

Repository materi pembelajaran **Object-Oriented Programming (OOP) dengan PHP** untuk siswa pemula.

## Prasyarat

- PHP 8.0 atau lebih baru
- Sudah paham: variabel, array, function, kondisi, perulangan
- Terminal / command line untuk menjalankan script PHP

## Cara Menjalankan Contoh

```bash
php contoh/pertemuan-01/Buku.php
php contoh/pertemuan-02/MultiBuku.php
# ... dan seterusnya
```

## Struktur Folder

| Folder | Isi |
|--------|-----|
| `modul/` | Materi teori per pertemuan (untuk guru) |
| `contoh/` | Kode PHP demo yang bisa dijalankan langsung |
| `latihan/` | Worksheet latihan untuk siswa |
| `checklist/` | Checklist pemahaman per pertemuan + akhir modul |
| `kunci-jawaban/` | Jawaban latihan dan kode referensi (untuk guru) |
| `project/` | Project akhir Sistem Perpustakaan Mini |
| `rubrik/` | Rubrik penilaian latihan dan project |

## Alur 10 Pertemuan

| No | Topik | Milestone Project |
|----|-------|-------------------|
| 1 | Pengenalan OOP | Class `Buku` sederhana |
| 2 | Class & Object | Multi-instance buku |
| 3 | Constructor | Buku dengan data awal |
| 4 | Encapsulation | Stok buku dilindungi |
| 5 | Inheritance | `BukuFisik`, `BukuDigital` |
| 6 | Polymorphism | Interface `DapatDipinjam` |
| 7 | Static & Constant | Class `Anggota` |
| 8 | Integrasi | Class `Perpustakaan` |
| 9 | Fitur Lengkap | Pinjam/kembali + denda |
| 10 | Project Akhir | Demo & evaluasi |

Detail lengkap ada di [`silabus.md`](silabus.md).

## Panduan Guru

1. Baca modul pertemuan sebelum mengajar (`modul/pertemuan-XX-*.md`)
2. Demo live coding dari folder `contoh/pertemuan-XX/`
3. Berikan worksheet latihan dari folder `latihan/`
4. Gunakan checklist di akhir pertemuan untuk evaluasi formatif
5. Kunci jawaban hanya untuk guru — jangan dibagikan sebelum siswa selesai mengerjakan

## Project Akhir

Siswa mengerjakan **Sistem Perpustakaan Mini** mulai pertemuan 8. Template starter ada di `project/perpustakaan-starter/`. Spesifikasi lengkap di `project/spesifikasi-project.md`.

## Bobot Penilaian

| Komponen | Bobot |
|----------|-------|
| Latihan harian | 30% |
| Project akhir | 40% |
| Checklist / kuis | 20% |
| Partisipasi | 10% |
