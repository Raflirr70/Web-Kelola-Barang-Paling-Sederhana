<?php
require_once "db.php";

class BarangMasuk
{
    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function createBarangMasuk($kode_barang, $name, $kategori, $status)
    {
        try {
            $this->conn->begin_transaction();
            
            $stmt = $this->conn->prepare(
                "INSERT INTO barang (kode_barang, nama, id_kategori, status_barang) VALUES (?,?,?,?);"
            );
            $stmt->bind_param("ssis", $kode_barang, $name, $kategori, $status);
            
            $stmt->execute();
            // $stmt->bind_param("ssis", $kode_barang, $name, $id_kategori, $status);
            // $id_barang = $this->conn->insert_id;

            // Insert barang masuk
            // $stmt = $this->conn->prepare(
            //     "INSERT INTO barang_masuk (id_barang, tanggal_masuk) VALUES (?, NOW())"
            // );
            // $stmt->bind_param("i", $id_barang);
            // $stmt->execute();

            $this->conn->commit();
            return true;

        } catch (Exception $e) {
            echo "Error: " . $this->conn->error;
            $this->conn->rollback();
            return false;
        }
    }
}
