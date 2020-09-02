<?php

namespace App\Modules\Api\Models;

use App\Models\Core\Datatable;

class TesModel extends Datatable
{
    protected $table      = 'sia_m_mahasiswa';
    protected $primaryKey = 'mhsNiu';

    protected $useSoftDeletes = false;

    protected $allowedFields = ['name', 'email'];

    protected $useTimestamps = true;
    protected $createdField  = 'mhsCreateAt';
    protected $updatedField  = 'mhsUpdateAt';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function __construct()
    {
        parent::__construct();
    }

    function datatable($nama = '')
    {
        // $this->limit(4);
        // $this->like('mhsNama', $nama);
        $this->select('mhsNama, mhsNiu');
        return $this->table($this->table);
    }
}
