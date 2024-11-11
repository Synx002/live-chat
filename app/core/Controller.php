<?php

class Controller
{

    public function view($title, $view, $data = [])
    {
        // session_start();
        // if(!isset($_SESSION['nama'])){
        //     require_once 'app/views/login/index.php';
        // } else {
        //     require_once 'app/views/' . $view . '.php';
        // }
        // Check if the request is for the login pag
        session_start();
        if ($view === 'login/index' || $view === 'register/index') {
            $pieces = explode("/", $view);
            $data['title'] = $title;
            require_once "app/views/". $pieces[0] ."/index.php";
        } else {
            // Check if user is logged in
            if (!isset($_SESSION['nama'])) {
                // User not logged in, show landing page
                require_once 'app/views/home/index.php';
            } else {
                $data['title'] = $title;
                // User logged in, show requested page
                require_once 'app/views/templates/header.php';
                require_once 'app/views/' . $view . '.php';
                require_once 'app/views/templates/footer.php';
            }
        }
    }

    public function model($model)
    {
        require_once 'app/models/' . $model . '.php';
        return new $model;
    }
    public function dataModel($table)
    {
        require_once 'app/models/Data_model.php';
        return new Data_model( $table );
    }
}

// class Flasher
// {

//     public static function setFlash($pesan, $aksi, $tipe)
//     {
//         $_SESSION['flash'] = [
//             'pesan' => $pesan,
//             'aksi' => $aksi,
//             'tipe' => $tipe
//         ];
//     }

//     public static function flash()
//     {
//         if (isset($_SESSION['flash'])) {
//             echo '<div id="alert" class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">Data 
//                     <strong>' . $_SESSION['flash']['pesan'] . '</strong> ' . $_SESSION['flash']['aksi'] . ' 
//                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//                     <span aria-hidden="true">&times;</span>
//                     </button>
//                 </div>';
//             unset($_SESSION['flash']);
//         }
//     }
// }