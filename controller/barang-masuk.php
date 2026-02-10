<?php
require_once "db.php";

class BarangMasukController
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
    public function view($status = "")
    {
        try {
            $query = "SELECT * FROM barang";
            if($status != ""){
                $query .= " WHERE status_barang = ?";
            }
            $stmt = $this->conn->prepare(
                $query
            );
            if($status != ""){
                $stmt->bind_param("s", $status);
            }
                
            $stmt->execute();

            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        } catch (Exception $e) {
            echo "Error: " . $this->conn->error;
            $this->conn->rollback();
            return false;
        }
    }
}
