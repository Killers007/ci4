<?php

namespace App\Models;

use App\Models\Core\Datatable;

class MahasiswaModel extends Datatable
{
    protected $table      = 'sia_m_mahasiswa';
    protected $primaryKey = 'mhsNiu';

    protected $useSoftDeletes = false;

    protected $allowedFields = ['mhsNama', 'mhsNiu'];

    protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [
        // 'mhsNiu' => 'is_unique[sia_m_mahasiswa.mhsNiu, mhsNiu, {mhsNiu}]',
    ];

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
