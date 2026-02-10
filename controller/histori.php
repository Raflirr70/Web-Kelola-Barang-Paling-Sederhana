<?php
include "db.php";
require_once "barang-masuk.php";


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
        try {
            $barang = new BarangMasuk;
            return $barang->view();
        } catch (Exception $e) {
            echo "Error: " . $this->conn->error;
            $this->conn->rollback();
            return false;
        }
    }
}
