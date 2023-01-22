<?php
    class Controllers
    {
        function view($view = null, $data = [])
        {
            require_once '../app/views/'.$view.'.php';
        }
    }
?>