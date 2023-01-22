<?php
    class App
    {
        protected $baseController = 'Home';
        protected $method = 'index';
        protected $params = [];

        public function __construct()
        {
            $URL = $this->parseURL();

            if($URL == null)
            {
                $URL[] = $this->baseController;
            }
            
            // $fetchServer = $_SERVER['REQUEST_URI'];
            // $checkURL = rtrim($fetchServer, '/');
            // $checkURL = filter_var($checkURL, FILTER_SANITIZE_URL);
            // $checkURL = explode('/',$checkURL);
            // $i = 0;
            // $j = 0;
            // foreach($checkURL as $key)
            // {
            //     foreach($URL as $secondKey)
            //     {
            //         if ($key === $secondKey)
            //         {
            //             array_shift($URL);
            //             $this->baseController = $URL[0] ;
            //             break 2;
            //         }
            //         $j++;
            //     }
            //     unset($checkURL[$i]);
            //     $i++;
            //     $j = 0;
            // }
            // if($URL[0] == 'Public')
            // {
            //     unset($URL[0]);
            //     $URL[0] = $URL[1];
            //     unset($URL[1]);
            // }

            if(file_exists('../app/controllers/' . $URL[0] . '.php')){
                $this->baseController = $URL[0] ;
                unset($URL[0]);
            }

            require_once '../app/controllers/' . $this->baseController . '.php';
            $this->baseController = new $this->baseController;
            
            if(isset($URL[1]))
            {
                if(method_exists($this->baseController, $URL[1]))
                {
                    $this->method = $URL[1];
                    unset($URL[1]);
                }
            }
            if(!empty($URL))
            {
                $this->params = array_values($URL);
            }

            // Attempt to Read Controllers on app/controllers with class and method given
            call_user_func_array([$this->baseController, $this->method], $this->params);
        }
        public function parseURL()
        {
            if( isset($_GET['url']))
            {
                $URL = rtrim($_GET['url'], '/');
                $URL = filter_var($URL, FILTER_SANITIZE_URL);
                $URL = explode('/',$URL);
                return $URL;
            }
        }
    }
?>