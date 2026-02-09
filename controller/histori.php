<?php
require_once "db.php";

class HistoriController
{
    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function ViewBarangMasuk()
    {
        try {
            $this->conn->begin_transaction();
            
            $stmt = $this->conn->prepare(
                "SELECT * FROM barang WHERE status_barang != ?"
            );
            $stmt->bind_param("s", "keluar");
            $stmt->execute();
            
            $this->conn->commit();
            return true;

        } catch (Exception $e) {
            echo "Error: " . $this->conn->error;
            $this->conn->rollback();
            return false;
        }
    }
}
