<?php

namespace MVC;

class Router 
{
    public array $get_routes = [];
    public array $post_routes = [];

    public function get($url, $fn){
        $this->get_routes[$url] = $fn;
    }

    public function post($url, $fn){
        $this->post_routes[$url] = $fn;
    }

    public function routes_test(){
        // el uso de ?? significa, si no existe ese valor asigna '/'
        $current_url = $_SERVER['PATH_INFO'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'GET'){
            // leemos la funcion que esta asociada a esa url, apuntando
            // a la llave del array que antes se creo
            $fn_url = $this->get_routes[$current_url] ?? null;
        }

        if ( $fn_url ){
            // significa que la url existe y tiene una funcion asociada
            
            call_user_func($fn_url, $this);
        } else {
            echo "pagina no encontrada";
        }
    }

    public function render($view, $datas = []){
        foreach ($datas as $key => $value) {
            $$key = $value;
        }

        ob_start();

        $content = ob_get_clean();
        include_once __DIR__ . "/views/$view.php";
    }
}