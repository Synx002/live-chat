<?php

class Admin extends Controller {
    private $table = 'chat';
    private $path = 'admin';
    private $request;

    public function __construct() {
        $this->request = $this->dataModel($this->table);
    }
    public function index()
    {
        $data[$this->table] = $this->request->getDataChat();
        $this->view("admin", "$this->path/index", $data);
    }

    // public function test()
    // {
    //     $data[] = [];
        
    //     $this->view("Home", "$this->path/index", $data);
        
    // }
    
}