<?php

namespace App\Modules\Admin\Controllers;

use App\Controllers\MyController;

use App\Models\MahasiswaModel;
use App\Models\Core\MenuModel;

class Dashboard extends MyController
{
	public function __construct()
	{
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
		// dd($this->mahasiswa->db);
		if ($this->request->isAJAX()) {
			$request =  $this->request->getGet();

			$data = $this->mahasiswa
				->setParams(['juhdi'])
				->generate($request);

			echo json_encode($data);
		} else {

			$data['formLayout'] = $this->view->setVertical()->getLayout();
			$data['formInput']  = $this->view->generateForm($this->form());

			$this->view
				->setData($data)
				->setModules('jalur_masuk')
				->view('welcome_message');
		}
	}

	public function replace($id = null)
	{
		// dd($this->request);
		$validation =  \Config\Services::validation();

		if ($this->request->isAJAX()) {

		$this->validate([
				'mhsNiu' => ['label' => 'nim', 'rules' => 'required'],
				'mhsNama' => ['label' => 'nama', 'rules' => 'required'],
				'avatar1' => [
					'uploaded[avatar1]',
					'mime_in[avatar1,image/jpg,image/jpeg,image/gif,image/png]',
					'max_size[avatar1,4096]',
				],
				'avatar2' => [
					'uploaded[avatar2]',
					'mime_in[avatar2,image/jpg,image/jpeg,image/gif,image/png]',
					'max_size[avatar2,4096]',
				],
			]);


			if ($validation->run($this->request->getPost())) {
				$request =  $this->request->getPost();

				if ($id) {
					$this->mahasiswa->update($id, $request);
				} else {
					$this->mahasiswa->insert($request);
				}

				$status = $id ? 'Perbaharui' : 'Tambahkan';

				$res = array(
					'status' => 'success',
					'message' => 'Data berhasil di ' . $status,
				);

				echo json_encode($res);
			} else {
				$res = array(
					'status' => 'error',
					'errors' => $validation->getErrors(),
				);
				echo json_encode($res);
			}
		}
	}

	/**
	 * Undocumented function
	 *
	 * @param int $id
	 *
	 * @return void
	 */
	public function delete(int $id)
	{
		if ($this->request->isAJAX()) {
			$this->mahasiswa->delete($id);

			$res = array(
				'status' => 'success',
				'message' => 'Data berhasil di hapus',
			);

			echo json_encode($res);
		}
	}


	function tes()
	{
		$data = $this->mahasiswa->limit(100)->find();

		dd($data);
	}

	public function nestable()
	{
		if ($this->request->isAJAX()) {
			$data = $this->request->getPost('nav');

			$this->menu->updateMenu($data);

			echo json_encode(['status' => 'success', 'message' => 'Menu diperbaharui']);
		} else {
			$this->view
				->setData(['tes' => 'juhdi'])
				->setModules('navigasi')
				->view('nestable');
		}
	}
}