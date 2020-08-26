<?php 

namespace App\Controllers;

use App\Models\MahasiswaModel;
use App\Models\MenuModel;

class Home extends BaseController
{
	public function __construct(){
		$this->mahasiswa = new MahasiswaModel();
		$this->menu = new MenuModel();
	}

	public function index()
	{
		// dd($this->request);
		if ($this->request->isAJAX()) {
			$request =  $this->request->getGet();

			$data = $this->mahasiswa
						->setParams(['juhdi'])
						->generate($request);

			echo json_encode($data);
		}else{
			$this->view
				->setData(['tes' => 'juhdi'])
				->setModules('jalur_masuk')
				->view('welcome_message');
		}
	}

	function tes()
	{
		$data = $this->mahasiswa->limit(100)->find();

						dd($data);
	}

	public function nestable(){
		if ($this->request->isAJAX()) 
		{
			$data = $this->request->getPost('nav');

			$listMenu = $this->menu->updateMenu($data);

			echo json_encode(['status' => 'success', 'message' => 'Menu diperbaharui']);
		}
		else
		{
			$this->view
					->setData(['tes' => 'juhdi'])
					->setModules('navigasi')
					->view('nestable');
		}
	}

}
