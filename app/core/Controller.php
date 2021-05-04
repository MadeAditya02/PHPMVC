<?php

class Controller
{
    public function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }
    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }
}

?>

<!--

Class Controler ini yang mengendalikan view dan model yang dipanggil.
1. View
method view ini dipanggil di file di dalam folder controllers. Contohnya kita membuka controller Mahasiswa method index (http://localhost/phpmvc/mahasiswa/index). Controller Mahasiswa method index
-->