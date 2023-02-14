<?php
    namespace Html\Mvc\Core;

    class Core {
        private $url;
        private $controller;
        private $routes = [];
        private $params = [];

        public function __construct($url, $controller)
        {
            if($url === null){
                $url = '/';
            }
            if(class_exists($controller)){
                $this->controller = $controller;
            }else{
                echo ('Erro interno: Não foi possivel acessar o Controller');
                exit();
            }
            $this->url = $url;
        }

        public function Routes($rota, $param = [])
        {
            $route = preg_replace('/[\/]/', '\\/', $rota);
            $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);
            $route = '/^' . $route . '$/i';
            $this->routes[$route] = $param;
        }

        private function SearchRoutes()
        {
            foreach ($this->routes as $key => $value) {
                if(preg_match($key, $this->url, $a))
                {
                    if(is_callable(array(new $this->controller, $value[0])))
                    {
                        foreach ($a as $key => $values) {
                            if(is_string($key)){
                                $params[$key] = $values;
                            }
                        }
                        $this->params = $params;
                        return $value[0];
                    }
                    return false;
                }
            }
            return false;
        }

        private function CallPag($pag, $args = []){
            if($args){
                echo call_user_func_array(array(new $this->controller(), $pag), [$args]);
                exit();
            }
            echo call_user_func(array(new $this->controller(), $pag));
            exit();
        }

        public function DispararRotas()
        {
            $resultpag = $this->SearchRoutes();
            if($resultpag){
                if($this->params){
                    return $this->CallPag($resultpag, $this->params);
                }
                return $this->CallPag($resultpag);
            }else{
                header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
                return $this->CallPag('paginaerro');
            }
        }

    }

    /*

        CRIADO POR VITOR GABRIEL E SILVA EM 14/02/2023
        GITHUB: https://github.com/vitor-e-silva
        LINKEDIN: https://www.linkedin.com/in/vitor-silva-8a4ab8226/

        Sobre o framework {
            Esse framework foi pensando para a simplificação de implementação de MVC (MODEL, VIEWS, CONTROLLERS)
            Caso for usar em seu projeto deixe o Copyright.
        }

        Config nginx:
        
          location / {
            root   html;
	        try_files $uri $uri/ /index.php?route=$uri$is_args$args;
            index  index.php;
          }

        COPYRIGHT 2023

    */