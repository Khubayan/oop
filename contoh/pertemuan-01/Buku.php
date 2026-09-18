<?php


class Hewan {
    public string $nama = "Mao"; //fallback
    public string $jenis = "Impor";
    public int $stok;

    // promotion construct
    // public function __construct(
    //     public string $nama = "Mao",
    //     public string $jenis = "Impor"
    // ) {}
    // construct biasa
    public function __construct(string $nama, string $jenis, int $stok) {
        $this->nama = $nama;
        $this->jenis = $jenis;

        // CEK APAKAH STOCK DIINPU PAS INSTANTIATE ITU DIBAWAH 0
        if($stok < 0) {
            $this->stok = 0;
        } else  {
            $this->stok = $stok;
        }

       
    }

    public function makan(): void {
        echo "Si-{$this->nama} sedang makan.";
    }
}

$kucing = new Hewan("neko", "kucing", -2);
// $kucing->nama = "Neko";
echo $kucing->stok;
// echo $kucing->nama;
// $kucing->makan();
