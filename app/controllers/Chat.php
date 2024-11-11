<?php

class Chat extends Controller {
    private $table = 'chat';
    private $path = 'users';
    private $request;

    public function __construct() {
        $this->request = $this->dataModel($this->table);
    }

    public function tambah()
    {   

        // var_dump($this->request->inputData($_POST));
        // exit;
        if($this->request->inputData($_POST))
       {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . "/$this->path");
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . "/$this->path");
            exit;
        }
    }
    public function tambahGambar()
    {   

        // var_dump($this->request->inputData($_POST));
        // exit;
        if($this->request->inputDataGambar($_POST))
       {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . "/$this->path");
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . "/$this->path");
            exit;
        }
    }
    
    public function hapus($id)
    {
        if( $this->request->deleteData($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            if($_SESSION["status"] == 0){
                header('Location: ' . BASEURL . "/admin");
                exit;
            }
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            if($_SESSION["status"] == 0){
                header('Location: ' . BASEURL . "/admin");
                exit;
            }
        }
    }

    // public function test()
    // {
    //     $data[] = [];
        
    //     $this->view("Home", "$this->path/index", $data);
        
    // }
    
}