<?php 
class Data_model{
    private $table = '';
    private $db;

    public function __construct($table)
    {
        $this->db = new Database;
        $this->table = $table;
    }

    
    public function login($id = null)
    {
        $query = 'SELECT * FROM '. $this->table;
        if ($id) {
            $query .= " WHERE " ;
        foreach ($id as $key => $value) {
            $query .= $key . "=" . "'" . $value . "'" ;
            
            if (count($id) > 1) $query.= ' AND ';
        }
        $query = rtrim($query, " AND ");
        }
        
        // $filter = ' WHERE id = ' . $id;
        $result = $this->db->getData($query);
        return $result;
    }

    public function getData($id = null)
    {
        $query = 'SELECT * FROM '. $this->table;
        $filter = " WHERE id = '" . $id . "'";
        if ($id != null) { $query .= $filter; }
        $result = $this->db->getData($query);
        return $result;
    }

    public function getDataChat()
    {
        $query = "SELECT chat.id, users.nama AS nama, chat.chat, chat.user_id
                FROM chat
                INNER JOIN users ON chat.user_id = users.id";
        $query .= " ORDER BY chat.id"; // Urutkan jika perlu
        $result = $this->db->getData($query); // Pastikan ini mengambil semua data
        return $result;
    }
    public function getKelas($nrp = null)
    {
        // $query = 'SELECT * FROM '. $this->table . " WHERE kelas = '$kelas'";
        // $result = $this->db->getData($query);
        // return $result;
        // // var_dump($result);
        // // exit;
        $query = 'SELECT * FROM '. $this->table;
        $filter = " WHERE nrp = '$nrp'";
        if ($nrp != null) { $query .= $filter; }
        $result = $this->db->getData($query);
        return $result;
    }

    public function getDataSegment($kelas = null)
    {
        // $query = 'SELECT * FROM '. $this->table . " WHERE kelas = '$kelas'";
        // $result = $this->db->getData($query);
        // return $result;
        // // var_dump($result);
        // // exit;
        $query = 'SELECT * FROM '. $this->table;
        $filter = " WHERE kelas = '$kelas'";
        if ($kelas != null) { $query .= $filter; }
        $result = $this->db->getData($query);
        return $result;
    }
    public function getDataKelasA()
    {
        $query = 'SELECT * FROM '. $this->table;
        $filter = " WHERE kelas = 'A'";
        $gabung =  $query .= $filter; 
        $result = $this->db->getData($gabung);
        return $result;
    }
    public function getDataKelasB()
    {
        $query = 'SELECT * FROM '. $this->table;
        $filter = " WHERE kelas = 'B'";
        $gabung =  $query .= $filter; 
        $result = $this->db->getData($gabung);
        return $result;
    }
    public function getDataKelasC()
    {
        $query = 'SELECT * FROM '. $this->table;
        $filter = " WHERE kelas = 'C'";
        $gabung =  $query .= $filter; 
        $result = $this->db->getData($gabung);
        return $result;
    }

    public function cariData($param = null)
    {
        $query = 'SELECT * FROM '. $this->table;
        $no = 1;
        foreach ($param as $values) {
            foreach ($values as $key => $value) {
                if(strlen($value)<=0)continue;
                if($no == 1){
                    $query .= " WHERE $key LIKE '%$value%'";
                }else {
                    $query .= " AND $key LIKE '%$value%'";
                }
                $no++;
            }
        }
        $result = $this->db->getData($query);
        // var_dump($result);
        // exit;
        return $result;
    }

    public function inputData($data)
    {
        $query = 'INSERT INTO '. $this->table . ' SET ';
        foreach ($data as $key => $value) {
            $query .= $key ."='$value',";
        }
        $query = rtrim($query,",");
        // var_dump($query);
        // exit;
        $result = $this->db->inputData($query);
        return $result;
    }
    public function inputDataGambar($data)
    {
        // Cek apakah ada file yang diupload
        $gambar = $this->uploadGambar();
        if (!$gambar) {
            return false;
        }
        
        
        // Buat query untuk menyimpan data
        $query = 'INSERT INTO '. $this->table . ' SET ';
        foreach ($data as $key => $value) {
            $query .= $key . "='$value',";
        }
        // Jika upload gambar gagal, hentikan eksekusi
        if ($gambar) {
            $query .= "chat='" . $gambar . "' ";
        }
        
        // Tambahkan kolom gambar
        $query = rtrim($query, ",");
        // var_dump($query);
        // exit;   

        // Eksekusi query
        $result = $this->db->inputData($query);
        return $result;
    }


    public function uploadGambar()
    {
        $nameFile = $_FILES['gambar']['name'];  
        $ukuranFile = $_FILES['gambar']['size'];
        $tmpName = $_FILES['gambar']['tmp_name'];
        $error = $_FILES['gambar']['error'];

        // Jika tidak ada gambar yang diupload
        if ($error === 4) {
            echo "<script>
                    alert('Pilih gambar terlebih dahulu!');
                </script>";
            return false;
        }

        // Validasi ekstensi file
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $nameFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>
                    alert('Yang Anda upload bukan gambar!');
                </script>";
            return false;
        }

        // Validasi ukuran file
        if ($ukuranFile > 1000000) {
            echo "<script>
                    alert('Ukuran gambar terlalu besar!');
                </script>";
            return false;
        }

        // Generate nama baru agar tidak menimpa file yang ada
        $nameFileBaru = uniqid();
        $nameFileBaru .= '.';
        $nameFileBaru .= $ekstensiGambar;

        // Pindahkan file ke folder tujuan
        move_uploaded_file($tmpName, 'public/img/' . $nameFileBaru);

        return $nameFileBaru;
    }


    public function updateData($data, $where)
    {
        $gambar = $_FILES['gambar'];
        $gambar = $this->uploadGambar();
        if (!$gambar) {
            return false;
        }
        $query = 'UPDATE '. $this->table . ' SET ' ;
        foreach ($data as $key => $value) {
            $query .= $key ."='$value',";
        }
        // var_dump($gambar);
        // echo "<br>";
        // exit;
        $query.= "gambar='" . $gambar . "' ";
        $query = rtrim($query,",");
        $query.= "WHERE id = '$where'";
        // var_dump($query);
        // exit;
        $result = $this->db->inputData($query);
        return $result;
    }



    public function deleteData($where)
    {
        $query = 'DELETE FROM '. $this->table . " WHERE id = '$where'";
        $result = $this->db->deleteData($query);
        return $result;
    }
}