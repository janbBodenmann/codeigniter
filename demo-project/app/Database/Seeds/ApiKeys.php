<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ApiKeys extends Seeder
{
    public function run()
    {
        $example_data =  [ 
            [
                'api' => 'km9uyxeq8pEGPcixfa3teyDHcPoabM',
                'name' => 'Ayri',
                
    
            ]
        ];
        $ApiKeys = new \App\Models\ApiKeys();

        foreach ($example_data as $entry_id => $data) {
            if ($ApiKeys->insert($data) === false) {
                echo "Errors on entry_id ${entry_id}:\n";
                print_r($ApiKeys->errors());
            }
        }
    }
}
