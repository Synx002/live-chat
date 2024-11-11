<?php

class Users extends Controller {
    private $table = 'users';
    private $path = 'users';
    private $request;

    public function __construct() {
        $this->request = $this->dataModel($this->table);
    }
    public function index()
    {
        $data[$this->table] = $this->request->getData();
        $this->view("users", "$this->path/index", $data);
    }

   

    // public function test()
    // {
    //     $data[] = [];
        
    //     $this->view("Home", "$this->path/index", $data);
        
    // }
    
}