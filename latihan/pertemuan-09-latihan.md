# Latihan Pertemuan 9 — Fitur Pinjam & Kembali

**Nama:** ______________________ **Kelas:** __________ **Tanggal:** __________

---

## Bagian A — Skenario Uji

Uji project Anda, catat hasil (Berhasil/Gagal):

| No | Skenario | Hasil | Catatan |
|----|----------|-------|---------|
| 1 | Pinjam buku fisik, stok cukup | | |
| 2 | Pinjam buku fisik, stok habis | | |
| 3 | Pinjam buku ke-4 (max 3) | | |
| 4 | Pinjam buku digital | | |
| 5 | Kembali telat 2 hari (denda?) | | |
| 6 | Kembali buku yang tidak dipinjam | | |

---

## Bagian B — Implementasi

Lengkapi method di `Perpustakaan.php`:

```php
public function pinjam(string $idAnggota, string $judulBuku, int $lamaPinjamHari): array
{
    // TODO: validasi anggota, buku, max pinjam, stok
    // return ['sukses' => true/false, 'pesan' => '...']
}

public function kembali(string $idAnggota, string $judulBuku, int $hariKembali): array
{
    // TODO: validasi, hitung denda
    // return ['sukses' => true/false, 'denda' => int, 'hariTelat' => int]
}
```

---

## Bagian C — Pertanyaan

1. Apa yang dilakukan jika pinjam gagal setelah anggota sudah dicatat?

_______________________________________________________________

2. Rumus denda Anda: ___________________________________________

---

## Refleksi

Validasi mana yang menurut Anda paling penting?

_______________________________________________________________
