<?php
namespace App\Controllers\Api\V1;

use CodeIgniter\RESTful\ResourceController;


class Cars extends ResourceController
{
    protected $modelName = 'App\Models\Cars';
    protected $format = 'json';

    protected $config = null;

    /** 
     *
     *
     * @return \CodeIgniter\HTTP\ResponseInterface
     *
     */



        public function __construct(){

            $this->config = config('Cars');
        }

    // GET by Index
    public function index()
    {
        $all_data = $this->model->findAll();

        if (!empty($all_data)) {
            return $this->respond($all_data);

        }

        return $this->failNotFound();
    }

    //GET By ID
    public function show($id = null)
    {
        if (!empty($id)) {
            $data = $this->model->find($id);
            if (!empty($data)) {
                
                if ($this->config->show_car_types) {
                   
                    if (!empty($data['car_type_id']) && isset($this->config->car_types[$data['car_type_id']])) {
                        
                        $data['car_type'] = $this->config->car_types[$data['car_type_id']];
                    }
                }
                return $this->respond($data);
            }
        }
        
        return $this->failNotFound();
    }
    
        


    //CREATE 
    public function create()
    {

        $data = $this->request->getJSON(true);

        if (!empty($data)) {

            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');

            $new_id = $this->model->insert($data);




            if ($new_id == false) {
                return $this->failValidationError($this->model->errors());

            } else {
                return $this->respondCreated(['id' => $new_id] + $data);
            }

        }

    }


    //edit
    public function update($id = null)
    {

        if ($id === null) {
            return $this->failValidationError('ID is required');
        }


        $data = $this->request->getJSON(true);


        if (empty($data)) {
            return $this->failValidationError('No data provided');
        }


        $car = $this->model->find($id);


        if (!$car) {
            return $this->failNotFound('Car not found');
        }


        $updated = $this->model->update($id, $data);


        if ($updated) {

            return $this->respondUpdated($data);
        } else {

            return $this->failServerError('Failed to update car');
        }
    }


    // DELETE
    public function delete($id = null)
    {

        if (!empty($id)) {
            $data_exists = $this->model->find($id);


            if (!empty($data_exists)) {

                $delete_status = $this->model->delete($id);

                if ($delete_status === true) {
                    return $this->respondDeleted(['id' => $id]);

                }

            } else {
                return $this->failNotFound();
            }

        }
    }
}
?>