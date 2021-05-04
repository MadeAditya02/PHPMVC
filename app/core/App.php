<?php

class App {
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        if (isset($url)) {
        	// controller
	        if( file_exists('../app/controllers/' . $url[0] . '.php') ) {
	            $this->controller = $url[0];
	            unset($url[0]);
	        }

	        // method
	        if( isset($url[1]) ) {
	            $this->method = $url[1];
	            unset($url[1]);
	        }

	        // params
	        if( !empty($url) ) {
	            $this->params = array_values($url);
	        }
        }

        require_once '../app/controllers/' . $this->controller . '.php';
	    $this->controller = new $this->controller;

        // jalankan controller & method, serta kirimkan params jika ada
	    call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if( isset($_GET['url']) ) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}

?>


<!--

1. Cek jika ada url yang dikirimkan atau tidak
2. Jika ada url, ganti $controller,$method dan $params dengan data yang ada di $url
3. Jadikan $this->controller menjadi sebuah objek. Misalkan controller yang ada adalah Home.
$this->controller = "Home" (awalnya string)
Sekarang $this->controller berisi objek Home bukan string.
4. jalankan controller & method, serta kirimkan params jika ada

-->