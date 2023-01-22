<?php
    class Add extends Controllers
    {
        public function index()
        {
            $data['title'] = 'Add';
            $response = $_SERVER['REQUEST_METHOD'];
            $fetchData = new API();
            $passData= $fetchData->materialType($response);
            $passData = json_decode($passData, true);
            $this->view('layouts/header', $data);
            $this->view('add/index', $passData);
        }

        public function added()
        {
            // Im Sorry I could'nt Finisihed it because testing even more request
            var_dump($_POST);
        }
    }
?>