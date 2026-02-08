<?php
include "db.php";

class HistoriController
{
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }

    // ambil histori barang masuk
    public function getBarangMasuk()
    {
        $query = "
            SELECT bm.id_barangmasuk, b.kode_barang, b.name AS nama_barang, 
                   k.name AS kategori, bm.date
            FROM barangmasuk bm
            JOIN barang b ON bm.id_barang = b.id_barang
            JOIN kategori k ON bm.id_kategori = k.id_kategori
            ORDER BY bm.date DESC
        ";

        return $this->conn->query($query);
    }

    // ambil histori barang keluar
    public function getBarangKeluar()
    {
        $query = "
            SELECT bk.id_barangkeluar, b.kode_barang, b.name AS nama_barang, 
                   k.name AS kategori, bk.date
            FROM barangkeluar bk
            JOIN barang b ON bk.id_barang = b.id_barang
            JOIN kategori k ON bk.id_kategori = k.id_kategori
            ORDER BY bk.date DESC
        ";

        return $this->conn->query($query);
    }
}
