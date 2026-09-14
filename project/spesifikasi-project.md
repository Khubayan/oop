# Spesifikasi Project — Sistem Perpustakaan Mini

Project akhir integrasi semua konsep OOP dari pertemuan 1–9.

---

## Class Wajib

| Class | Konsep OOP | Keterangan |
|-------|------------|------------|
| `Config` | Constant | `NAMA_APP`, `MAX_PINJAM`, `DENDA_PER_HARI` |
| `DapatDipinjam` | Interface | Kontrak pinjam/kembali |
| `Buku` | Abstract class | Parent untuk jenis buku |
| `BukuFisik` | Inheritance | Stok fisik, rak |
| `BukuDigital` | Inheritance | Format file, stok unlimited |
| `Anggota` | Static, Encapsulation | Limit pinjam, data pinjaman private |
| `Perpustakaan` | Komposisi | Kelola buku & anggota |

---

## Fitur Minimum (Wajib)

- [ ] Tambah buku (fisik & digital) ke perpustakaan
- [ ] Tambah anggota
- [ ] Tampilkan daftar buku
- [ ] Tampilkan daftar anggota
- [ ] Pinjam buku — validasi: anggota ada, buku ada, stok cukup, max pinjam
- [ ] Kembalikan buku — update stok fisik, hapus dari pinjaman anggota
- [ ] Hitung denda keterlambatan: `(hari_kembali - lama_pinjam) × DENDA_PER_HARI` jika telat
- [ ] Program jalan tanpa fatal error

---

## Fitur Bonus (+10 poin)

- [ ] Menu CLI interaktif di `main.php`
- [ ] Class `Pegawai` extends `Anggota` dengan limit pinjam lebih besar
- [ ] Log transaksi pinjam/kembali
- [ ] Pencarian buku berdasarkan penulis

---

## Rubrik Penilaian (100 poin)

| Aspek | Poin | Kriteria |
|-------|------|----------|
| Class & Object | 20 | Semua class ada, object dibuat benar |
| Encapsulation | 20 | Data sensitif private, akses lewat method |
| Inheritance | 15 | `BukuFisik`/`BukuDigital` extends `Buku` |
| Polymorphism | 15 | Interface `DapatDipinjam`, array polimorfik |
| Program jalan | 15 | Pinjam/kembali berfungsi, tidak error |
| Struktur kode | 10 | File terorganisir, nama jelas, readable |
| Bonus | +10 | Fitur bonus (max total 110) |

Detail rubrik: [`rubrik/project-akhir.md`](../rubrik/project-akhir.md)

---

## Cara Mengerjakan

1. Fork dari template: `project/perpustakaan-starter/`
2. Lengkapi setiap class (hapus TODO)
3. Uji dengan skenario:
   - Pinjam buku fisik → stok berkurang
   - Pinjam saat stok 0 → gagal
   - Pinjam melebihi MAX_PINJAM → gagal
   - Kembali telat → denda dihitung
   - Pinjam buku digital → selalu berhasil
4. Demo di pertemuan 10

---

## Referensi

- Contoh lengkap: `contoh/pertemuan-08/` sampai `contoh/pertemuan-10/`
- Kunci jawaban guru: `kunci-jawaban/contoh/project-perpustakaan/`
