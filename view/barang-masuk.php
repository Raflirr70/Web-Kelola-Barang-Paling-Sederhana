<?php
    require_once "../controller/barang-masuk.php";
    
    $barang = new BarangMasuk();

    if (isset($_POST['submit'])) {

        // Ambil data dari form
        $kode_barang   = $_POST['kodebarang'];
        $nama_barang   = $_POST['namabarang'];
        $kategori      = $_POST['kategori'];
        $status_barang = $_POST['statusbarang'];

        // Panggil fungsi
        $result = $barang->createBarangMasuk(
            $kode_barang,
            $nama_barang,
            $kategori,
            $status_barang
        );

        if ($result) {
            echo "<script>alert('Data berhasil disimpan');</script>";
        } else {
            echo "<script>alert('Gagal menyimpan data');</script>" ;
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/barang-masuk.css">
    <title>Barang Masuk | praktikum</title>
</head>
<body>
    <div class="container">
        <div class="kontenHorizontal">
            <div class="konten1">
                <div class="kembali">
                    <a href="index.php">&lt; Kembali</a>
                </div>
                <div class="kontenform">
                    <h3 id="judulform">Form Barang Masuk</h3>
                    <img id="logo" src="../asset/Logo barang masuk.webp" alt="">
                    <form action="" method="post">
                        <table>
                        <tr>
                            <td><label for="kategori">Kategori</label></td>
                            <td style="padding: 0 10px;">:</td>
                            <td>
                                <select name="kategori" id="kategori">
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="Procesor">Processor (CPU)</option>
                                    <option value="VGA">VGA</option>
                                    <option value="RAM">RAM</option>
                                    <option value="Monitor">Monitor</option>
                                    <option value="Keyboard">Keyboard</option>
                                    <option value="Mouse">Mouse</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="kodebarang">kodebarang</label></td>
                            <td style="padding: 0 10px;">:</td>
                            <td><input type="text" name="kodebarang" id="kodebarang"></td>
                        </tr>
                        <tr>
                            <td><label for="namabarang">Nama Barang</label></td>
                            <td style="padding: 0 10px;">:</td>
                            <td><input type="text" name="namabarang" id="namabarang"></td>
                        </tr>
                        <tr>
                            <td><label for="statusbarang">Status barang</label></td>
                            <td style="padding: 0 10px;">:</td>
                            <td><input type="text" name="statusbarang" id="statusbarang"></td>
                        </tr>
                        </table>
                        <button id="submit" name="submit" type="submit">Tambah</button>
                    </form>
                </div>
            </div>
            <div class="konten2">
                <div class="kontenTabel">
                    <h3 id="judultabel">DAFTAR BARANG</h3>
                    <table>
                        <tr>
                            <th style="width: 20px;">No</th>
                            <th style="width: 200px;">Kode Barang</th>
                            <th style="width: 200px;">Nama Barang</th>
                            <th style="width: 150px;">Kategori</th>
                            <th style="width: 50px;">Status</th>
                            <th style="width: 200px;">tanggal</th>
                        </tr>
                        
                        <tr>
                            <td>1</td>
                            <td>ms-0001</td>
                            <td>B100</td>
                            <td>Mouse</td>
                            <td>baik</td>
                            <td>5-10-2025</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>cpu-0002</td>
                            <td>intel core I3 gen2</td>
                            <td>Processor</td>
                            <td>baik</td>
                            <td>2-10-2025</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>cpu-0003</td>
                            <td>intel core I3 gen6</td>
                            <td>Processor</td>
                            <td>baik</td>
                            <td>4-9-2025</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>vga-0001</td>
                            <td>RTX 3060 TI</td>
                            <td>VGA</td>
                            <td>baik</td>
                            <td>16-8-2025</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
