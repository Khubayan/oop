# Silabus OOP PHP — 10 Pertemuan

**Mata Pelajaran:** Pemrograman Berorientasi Objek  
**Kelas:** XII RPL  
**Durasi:** 10 pertemuan × 90 menit  
**Project Thread:** Sistem Perpustakaan Mini

---

## Capaian Pembelajaran

Setelah menyelesaikan modul ini, siswa mampu:

1. Menjelaskan konsep dasar OOP (class, object, property, method) dengan analogi dunia nyata
2. Membuat class PHP dengan property dan method
3. Menggunakan constructor untuk inisialisasi data object
4. Menerapkan enkapsulasi dengan access modifier (`public`, `private`)
5. Membuat class turunan dengan inheritance (`extends`)
6. Menerapkan polimorfisme dengan interface (`implements`)
7. Menggunakan static property, static method, dan constant
8. Mengintegrasikan beberapa class dalam satu aplikasi CLI sederhana
9. Menyelesaikan project Sistem Perpustakaan Mini secara mandiri

---

## Rincian Pertemuan

### Pertemuan 1 — Pengenalan OOP
- **Konsep:** Class, Object, Property, Method
- **Analogi:** Cetakan kue dan kue hasil cetakan
- **Milestone:** Class `Buku` dengan property public dan method `info()`
- **Capaian:** Siswa membedakan procedural vs OOP dan membuat class pertama

### Pertemuan 2 — Class & Object
- **Konsep:** `$this`, multi-instance, operator `->`
- **Analogi:** Satu resep, banyak kue berbeda rasa
- **Milestone:** 3+ object buku dengan data berbeda
- **Capaian:** Siswa memahami `$this` dan independensi data antar object

### Pertemuan 3 — Constructor
- **Konsep:** `__construct`, parameter, default value, property promotion
- **Analogi:** Formulir pendaftaran wajib diisi saat object dibuat
- **Milestone:** Class `Buku` dengan constructor
- **Capaian:** Siswa inisialisasi property lewat constructor

### Pertemuan 4 — Encapsulation
- **Konsep:** `public`, `private`, getter/setter, validasi
- **Analogi:** Brankas — akses lewat prosedur resmi
- **Milestone:** Stok buku private, akses lewat method
- **Capaian:** Siswa melindungi data dan mencegah manipulasi langsung

### Pertemuan 5 — Inheritance
- **Konsep:** `extends`, `parent::`, method override, `protected`
- **Analogi:** Anak mewarisi sifat orang tua
- **Milestone:** Class `BukuFisik` dan `BukuDigital` extends `Buku`
- **Capaian:** Siswa membuat hierarki class dan override method

### Pertemuan 6 — Polymorphism
- **Konsep:** Interface, `implements`, array polimorfik
- **Analogi:** Satu tombol, perilaku berbeda per alat
- **Milestone:** Interface `DapatDipinjam` diimplementasi buku
- **Capaian:** Siswa memproses object berbeda dengan satu interface

### Pertemuan 7 — Static & Constant
- **Konsep:** `static`, `const`, `self::`, class vs instance property
- **Analogi:** Papan informasi sekolah (satu untuk semua)
- **Milestone:** Class `Anggota` + counter static
- **Capaian:** Siswa membedakan data per-object vs data global class

### Pertemuan 8 — Komposisi & Integrasi
- **Konsep:** Array of objects, relasi antar class, komposisi
- **Analogi:** Perpustakaan punya banyak buku dan anggota
- **Milestone:** Class `Perpustakaan` kelola koleksi
- **Capaian:** Siswa mengintegrasikan class yang sudah dibuat

### Pertemuan 9 — Fitur Lengkap
- **Konsep:** Validasi, error handling sederhana, workflow
- **Analogi:** Prosedur pinjam buku di perpustakaan nyata
- **Milestone:** Pinjam/kembali buku + denda keterlambatan
- **Capaian:** Siswa menyelesaikan alur bisnis sederhana

### Pertemuan 10 — Project Akhir & Evaluasi
- **Konsep:** Integrasi semua pilar OOP
- **Aktivitas:** Demo project, presentasi, evaluasi checklist
- **Milestone:** Project Perpustakaan Mini selesai
- **Capaian:** Siswa presentasi dan lulus checklist akhir modul

---

## Bobot Penilaian

| Komponen | Bobot | Keterangan |
|----------|-------|------------|
| Latihan harian | 30% | Worksheet pertemuan 1–9 |
| Project akhir | 40% | Sistem Perpustakaan Mini |
| Checklist / kuis | 20% | Checklist per pertemuan + kuis konsep |
| Partisipasi | 10% | Diskusi, pair programming, presentasi |

---

## Referensi Materi

- Modul: `modul/pertemuan-XX-*.md`
- Checklist: `checklist/pertemuan-XX-checklist.md`
- Checklist akhir: `checklist/checklist-keseluruhan.md`
- Rubrik project: `rubrik/project-akhir.md`
- Rubrik latihan: `rubrik/latihan-harian.md`
