<?php 

namespace App\Modules\Api\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Modules\Api\Models\TesModel;
use App\Controllers\MyController;

class Mahasiswa extends ResourceController
{
	public function __construct()
	{
		$this->mahasiswa = new TesModel();
	}

	public function index()
	{
		$data = ['mahasiswa' => $this->mahasiswa->limit(100)->find()];

		return $this->respond($data, 200);
	}

	public function get($mhsNiu){
		$data = $this->mahasiswa->where('mhsNiu', $mhsNiu)->find();

		return $this->setResponseFormat('xml')->respond($data, 200);
	}

	public function post($mhsNiu){
		$data = $this->mahasiswa->where('mhsNiu', $mhsNiu)->find();

		return $this->setResponseFormat('json')->respond($data, 200);
	}

	//--------------------------------------------------------------------

}
