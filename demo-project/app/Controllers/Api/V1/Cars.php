<?php
namespace App\Controllers\Api\V1;
use CodeIgniter\RESTful\ResourceController;

class Cars extends ResourceController
{
    protected $modelName = 'App\Models\Cars';
    protected $format = 'json';
  
    /** 
    *
    *
    * @return \CodeIgniter\HTTP\ResponseInterface
    *
    */
    
    public function index() {
        $all_data = $this->model->findAll();

        if(!empty($all_data)){
            return $this->respond($all_data);
            
        }

        return $this->failNotFound();
    }

    public function show($id = null) {

        if (!empty($id)){
            $data = $this->model->find($id);
            if(!empty($data)) {
                return $this->respond($data);
            }
        }
        return $this->failNotFound();
    }


    public function post(){

    }

    public function put(){

    }

    public function delete(){

    }




}







?>