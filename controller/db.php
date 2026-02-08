<?php

class Database
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $db_name = "db_barang";
    public $conn;

    public function connect()
    {
        $this->conn = new mysqli(
            $this->host,
            $this->username,
            $this->password,
            $this->db_name
        );

        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }

        return $this->conn;
    }
}
