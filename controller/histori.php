<?php
include "db.php";
require_once "barang-masuk.php";


class HistoriController
{
    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function ViewBarangMasuk($status = "")
    {
        try {
            $barang = new BarangMasukController;
            return $barang->view($status);
        } catch (Exception $e) {
            echo "Error: " . $this->conn->error;
            $this->conn->rollback();
            return false;
        }
    }
}
