<?php
require_once "db.php";

class BarangKeluarController
{
    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function createBarangKeluar($id_barang, $deskripsi)
    {
        try {
            $this->conn->begin_transaction();
            
            $stmt = $this->conn->prepare(
                "INSERT INTO barang_keluar (id_barang, deskripsi) VALUES (?,?);"
            );
            $stmt->bind_param("is", $id_barang, $deskripsi);
            $stmt->execute();

            $status = "keluar";
            $stmt = $this->conn->prepare(
                "UPDATE barang SET status_barang = ? WHERE id_barang = ?"
            );
            $stmt->bind_param("si", $status, $id_barang);

            $this->conn->commit();
            return true;

        } catch (Exception $e) {
            echo "Error: " . $this->conn->error;
            $this->conn->rollback();
            return false;
        }
    }
}
