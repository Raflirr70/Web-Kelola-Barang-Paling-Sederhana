<?php
    require_once "../controller/histori.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/histori.css">
    <title>Barang Keluar | Praktikum</title>
</head>
<body>
    <div class="container">
        <div class="konten">
            <div class="header">
                <a class="kembali" href="index.php">&lt; Kembali</a>
                <h1 id="judultabel">HISTORI BARANG MASUK KELUAR</h1>
            </div>
            <div class="horizontal">
                <div class="kontenTabel">
                    <h2 class="judul">Barang Masuk</h2>
                    <table>
                        <tr>
                            <th style="width: 20px;">No</th>
                            <th style="width: 200px;">Kode Barang</th>
                            <th style="width: 200px;">Nama Barang</th>
                            <th style="width: 150px;">Kategori</th>
                            <th style="width: 100px;">Status</th>
                            <th style="width: 200px;">tanggal</th>
                        </tr>
                        <?php
                            $masuk = new HistoriController;
                            $datas = $masuk->ViewBarangMasuk();
                            $i = 1;
                            foreach($datas as $data){
                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $data["kode_barang"]; ?></td>
                                <td><?php echo $data["nama"]; ?></td>
                                <td><?php echo $data["id_kategori"]; ?></td>
                                <td><?php echo $data["status_barang"]; ?></td>
                                <td><?php echo $data["tanggal_masuk"]; ?></td>
                            </tr>
                        <?php
                            }
                        ?>
                    </table>
                </div>
                <div class="kontenTabel">
                    <h2 class="judul">Barang Keluar</h2>
                    <table>
                        <tr>
                            <th style="width: 20px;">No</th>
                            <th style="width: 200px;">Kode Barang</th>
                            <th style="width: 200px;">Nama Barang</th>
                            <th style="width: 150px;">Kategori</th>
                            <th style="width: 100px;">Status</th>
                            <th style="width: 200px;">tanggal masuk</th>
                            <th style="width: 200px;">tanggal keluar</th>
                        </tr>
                        <?php
                            $datasOut = $masuk->ViewBarangMasuk("keluar");
                            $i = 1;
                            foreach($datasOut as $data){
                        ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $data["kode_barang"] ?></td>
                            <td><?php echo $data["nama"] ?></td>
                            <td><?php echo $data["id_kategori"] ?></td>
                            <td><?php echo $data["status_barang"] ?></td>
                            <td><?php echo $data["tanggal_masuk"] ?></td>
                            <td><?php echo $data["tanggal_masuk"] ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>