<?php 

class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh;
    private $stmt;
    private $conn;

    public function __construct()
    {
        // data source name
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db_name);

    }

    public function getData($query)
    {
        $result = $this->conn->query($query);
        $data = [];
        while ($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        return $data;
    }

    public function inputData($query)
    {
        $result = $this->conn->query($query);
        return $result;
    }

    public function updateData($query)
    {
        $result = $this->conn->query($query);
        return $result;
    }

    public function deleteData($query)
    {
        $result = $this->conn->query($query);
        return $result;
    }

}