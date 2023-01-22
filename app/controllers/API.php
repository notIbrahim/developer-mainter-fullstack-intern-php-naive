<?php
    interface Recycles
    {
        public function materialType($Responses);
        public function wasteType($Response);
    }
    class API implements Recycles
    {
        public function index($Response = null, $Request = null)
        {
            // Here A lies of Problem can't really do anything Deadline 3 Hours
            // So if i don't need database well this happens
            // So my bad code here but atleast it works
            $data = array(
                array(
                    "id" => "TYP-001-KET",
                    "material_id" => "MAT-001-KET",
                    "Kategori" => "Kertas",
                    "name" => "Kertas HVS",
                ),
                
                array(
                    "id" => "TYP-002-PET",
                    "material_id" => "MAT-002-PET",
                    "Kategori" => "Plastik",
                    "name" => "Plastik PET"
                ),
                array(
                    "id" => "TYP-002-KSK",
                    "material_id" => "MAT-002-PLS",
                    "Kategori" => "Plastik",
                    "name" => "Plastik Kresek"
                ),
                array(
                    "id" => "TYP-004-BJR",
                    "material_id" => "MAT-004-BJR",
                    "Kategori" => "Baja",
                    "name" =>"Baja Ringan"
                ),
            );

            if ($Response == "Delete" && $Request)
            {
                $i = 0;
                $passed[] = $Request;
                foreach($data as $key)
                {
                    if($passed[0] === $data[$i]['id'])
                    {
                        unset($data[$i]);
                        break 1;
                    }
                    $i++;
                }
                $newData = array(
                    "types" => $data
                );
                return json_encode($newData);
            }

            if($_SERVER['REQUEST_METHOD'] == 'GET')
            {
                $count = func_num_args();
                if($count == 0)
                {
                    header('Content-Type: application/json', true, 200);
                    echo json_encode($data);       
                }
                else
                {
                    return $data;
                }
                // $data = array(
                //     "types" => $types
                // );
            }
            else
            {
                header('Content-Type: application/json', true, 405);
                return 405;
            }
        }

        public function wasteType($Response = null)
        {
            $args = func_num_args();
            if($_SERVER['REQUEST_METHOD'] == 'GET')
            {
                $apiData = $this->index($Response);

                $data = array(
                    "types" => $apiData
                );

                if($args)
                {
                    return json_encode($data);
                }
                else
                {
                    print json_encode($data);
                }
            }
            else
            {
                header('Content-Type: application/json', true, 405);
                return 405;
            }
        }

        public function materialType($Response = null)
        {
            // This function func_num_args() returns the number of arguments
            // that can be passed
            // Find out this at : https://www.php.net/manual/en/function.func-num-args.php
            $args = func_num_args();
            if($_SERVER['REQUEST_METHOD'] == 'GET')
            {
                $apiData = $this->index($Response);
                $i = 0;
                if ($args)
                {
                    foreach($apiData as $key)
                    {
                        unset($apiData[$i]['id']);
                        $i++;
                    }
                    $data = array(
                        "materials" => $apiData
                    );
                    return json_encode($data);// Actually When its null its kinda off to test API here    
                }
                else
                {
                    foreach($apiData as $key)
                    {
                        unset($apiData[$i]['id']);
                        unset($apiData[$i]['Kategori']);
                        $i++;
                    }
                    $data = array(
                        "materials" => $apiData
                    );
                    print json_encode($data);
                }
            }
            else
            {
                header('Content-Type: application/json', true, 405);
                return 405;
            }
        }
    }
?>