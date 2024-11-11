<?php 

class Login extends Controller {
    private $table = 'pengurus';
    public function login()
    {   
        if(($_POST['status']) == 1)$table = 'users';
        if(($_POST['status']) == 0)$table = 'pengurus';
        if($this->dataModel($table)->login($_POST)){
            session_start();
                unset($_SESSION['nama']);
                foreach ($this->dataModel($table)->login($_POST) as $row) :
                    $_SESSION['nama'] = $row['nama'];
                    $_SESSION['status'] = $row['status'];
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['gambar'] = $row['gambar'];
                endforeach;
                // var_dump($_SESSION['status']);
                // exit;
                if ($_SESSION['status'] == 1){
                    header("Location:" . BASEURL . "/users");
                } else {
                    header("Location:" . BASEURL . "/admin");
                } 
                exit;
                // var_dump('berhasil');
            } else {
                header("Location:" . BASEURL . "/login/index");
            }
    }
    public function index()
    {
        $data[$this->table] = "login";
        $this->view("Login", "login/index", $data);
    }

    public function logout()
    {
        session_start();
        unset($_SESSION['nama']);
        session_destroy();
        header("Location:" . BASEURL . "/login");
    }
}