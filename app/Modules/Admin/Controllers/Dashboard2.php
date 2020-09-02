<?php 

namespace App\Modules\Admin\Controllers;

use App\Controllers\MyController;

use App\Models\MahasiswaModel;
use App\Models\Core\MenuModel;

class Dashboard2 extends MyController
{
	public function __construct(){
		$this->mahasiswa = new MahasiswaModel();
		$this->menu = new MenuModel();
	}

	private function form()
	{
		return array(
			array(
				'inputType' => $this->view::TEXTBOX,
				'label' 	=> 'Jalur Nama',
				'type' 		=> 'text',
				'rules'		=> 'required',
				'field' 	=> 'jalurNama',
				'data' 		=> ['as', 'asasa'],
				
			),
			array(
				// 'inputType' => 'textbox',
				'label' 	=> 'Jalur Tahun',
				'type' 		=> 'number',
				'rules'		=> 'required|numeric',
				'field' 	=> 'jalurTahun',
				'addon' 	=> '<span class="fa fa-pencil"></span>|depan',
				'rounded' 	=> true,
				'attribute' => array('readonly' => 'true', 'value' => 'sipp'),
			),
			array(
				'inputType' => $this->view::CHECKBOX,
				'label' 	=> 'Jenis Kelamin',
				'type' 		=> 'checkbox',
				'required' 	=> true,
				'rules'		=> 'required',
				'field' 	=> 'jk',
				'data' 		=> array('L' => 'Laki - Laki', 'P' => 'Perempuan'),
			),
			array(
				'inputType' => $this->view::CHECKBOX,
				'label' 	=> 'Jenis Kelamin',
				'type' 		=> 'radio',
				'required' 	=> true,
				'rules'		=> 'required',
				'field' 	=> 'jk',
				'data' 		=> array('L' => 'Laki - Laki', 'P' => 'Perempuan'),
			),
		);
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

			$data['formLayout'] = $this->view->setVertical()->getLayout();
			$data['formInput']  = $this->view->generateForm($this->form());

			$this->view
				->setData($data)
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
