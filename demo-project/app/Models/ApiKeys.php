<?php

namespace App\Models;

use CodeIgniter\Model;

class ApiKeys extends Model
{

    public function checkApiKey(string $apiKey): bool
    {
        // Führen Sie eine Datenbankabfrage durch, um den API-Schlüssel zu überprüfen
        $result = $this->where('api', $apiKey)->countAllResults();

        // Wenn mindestens ein Ergebnis vorhanden ist, ist der API-Schlüssel gültig
        return $result > 0;
    }
    protected $table            = 'apikeys';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = ['name', 'api'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
