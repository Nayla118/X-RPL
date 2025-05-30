<?php

class DB {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "dbrestauran";
    private $koneksi;

    public function __construct()
    {
        $this->koneksi = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if (mysqli_connect_errno()) {
            echo "Koneksi database gagal : " . mysqli_connect_error();
        }
    }

    public function getALL($sql)
    {
        $result = mysqli_query($this->koneksi, $sql);
        $rows = array();
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $rows[] = $row;
            }
        }
        return $rows;
    }

    public function getITEM($sql)
    {
        $result = mysqli_query($this->koneksi, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    public function rowCOUNT($sql)
    {
        $result = mysqli_query($this->koneksi, $sql);
        $count = mysqli_num_rows($result);
        return $count;
    }

    public function runSQL($sql)
    {
        $result = mysqli_query($this->koneksi, $sql);
        return $result;
    }
}