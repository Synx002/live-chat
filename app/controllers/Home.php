<?php

class Home extends Controller {
    private $table = 'chat';
    private $request;
    private $path = 'home';

    public function __construct() {
        $this->request = $this->dataModel($this->table);
    }

    public function index() {
        // Periksa apakah ini permintaan AJAX
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            // Jika permintaan adalah AJAX, ambil data chat dan kirim sebagai JSON
            $chatData = $this->request->getDataChat();
            
            // Mengembalikan data dalam format JSON
            header('Content-Type: application/json'); // Set header sebagai JSON
            echo json_encode($chatData);
            exit; // Hentikan eksekusi setelah mengirim data JSON
        }

        // Jika bukan permintaan AJAX, tampilkan halaman utama
        $data[$this->table] = $this->request->getDataChat();
        $this->view("Home", "$this->path/index", $data);
    }
}
