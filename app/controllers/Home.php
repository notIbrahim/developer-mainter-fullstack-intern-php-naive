<?php
    class Home extends Controllers
    {
        public function index()
        {
            $data['title'] = 'Home';
            $response = $_SERVER['REQUEST_METHOD'];
            $fetchData = new API();
            $passData= $fetchData->wasteType($response);
            $passData = json_decode($passData, true);
            $this->view('layouts/header', $data);
            $this->view('home/index', $passData);
        }

        public function delete()
        {
            if( isset($_GET['url']))
            {
                $URL = rtrim($_GET['url'], '/');
                $URL = filter_var($URL, FILTER_SANITIZE_URL);
                $URL = explode('/',$URL);
            }
            $data['title'] = 'Home';
            $fetchData = new API();
            $response = 'Delete';
            $deleteData = $fetchData->index($response,$URL[2]);
            $deleteData = json_decode($deleteData, true);
            $this->view('layouts/header', $data);
            $this->view('home/index', $deleteData);
        }
    }
?>