<?php 

class Register extends Controller {
    private $table = 'users';
    private $request;
    public function __construct() {
        $this->request = $this->dataModel($this->table);
    }
    public function index()
    {
        $data[$this->table] = "register";
        $this->view("Register", "register/index", $data);
    }

    public function reg()
    {
        // var_dump($_POST);
        // exit;
        if( $this->request->inputData($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'dibuat', 'success');
            header('Location: ' . BASEURL . "/login/index");
        } else {
            Flasher::setFlash('gagal', 'dibuat', 'danger');
        } 
    }
}