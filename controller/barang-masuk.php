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

            $this->conn->commit();
            return true;

        } catch (Exception $e) {
            echo "Error: " . $this->conn->error;
            $this->conn->rollback();
            return false;
        }
    }
    public function view()
    {
        try {
            $this->conn->begin_transaction();
            
            $stmt = $this->conn->prepare(
                "SELECT * FROM barang WHERE status_barang != 'keluar'"
            );
            
            $stmt->execute();

            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        } catch (Exception $e) {
            echo "Error: " . $this->conn->error;
            $this->conn->rollback();
            return false;
        }
    }
}
