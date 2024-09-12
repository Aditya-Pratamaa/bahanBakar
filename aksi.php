<?php
class Shell {
    protected $harga,
            $jumlah,
            $jenis,
            $ppn;

    public function __construct($harga, $jenis) {
        $this->harga = $harga;
        $this->jenis = $jenis;
        $this->ppn = 0.1;
    }

    public function hitungPPN() {
        return ($this->ppn * 100);
    }

    public function hargaPPN() {
        return ($this->hitungTotal() - $this->hitungHargaDasar());
    }

    public function hitungTotal(){
        return ($this->harga * $this->jumlah) * (1 + $this->ppn);
    }

    public function hitungHargaDasar() {
        return ($this->harga * $this->jumlah);
    }

    public function setJumlah($jumlah) {
        $this->jumlah = $jumlah;
    }
}

class Beli extends Shell {
    public function Transaksi() {
        return "---------------------------------------------------<br>
                Anda membeli bahan bakar minyak tipe {$this->jenis}<br>
                Dengan Jumlah : {$this->jumlah} Liter <br>
                PPN : {$this->hitungPPN()}% = Rp. " . number_format($this->hargaPPN(), 0, ',', '.') . "<br>
                Harga perliter : Rp. " . number_format($this->harga, 0, ',', '.') . " <br>
                Harga dasar : Rp. " . number_format($this->hitungHargaDasar(), 0, ',', '.') . " <br>
                Total yang harus anda bayar Rp. " . number_format($this->hitungTotal(), 0, ',', '.') . "<br>
                ---------------------------------------------------<br>";
    }
}

$output = "";
if(isset($_POST['submit'])) {
    $jumlah = $_POST['jumlah'];
    $jenis = $_POST['jenis'];

    $harga = 0;
    switch($jenis) {
        case "Shell Super":
            $harga = 15420;
            break;
        case "Shell V-Power":
            $harga = 16130;
            break;
        case "Shell V-Power Diesel":
            $harga = 18310;
            break;
        case "Shell V-Power Nitro":
            $harga = 16510;
            break;
    }

    $beli = new Beli($harga, $jenis);
    $beli->setJumlah($jumlah);

    $output = $beli->Transaksi();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="aksi.css">
</head>
<body>
    <div class="hasil-transaksi">
        <?php if(isset($output)) echo $output; ?>

        <div class="hapus-button">
        <button id="hapus"><a href="index.php">Kembali</a></button>
        <button id="hapus" onclick="window.print()">Print halaman ini</button>
        </div>

    </div>
</body>
</html>