<?php 

namespace App\Libraries;

use App\Models\MenuModel;

class Template
{
    protected $data = [];
    protected $modules;
	protected $notif = ['count' => 2, 'modules' => 'welcome'];

    public function __construct()
    {
        $this->menu = new MenuModel();
    }

    /**
     * Render View
     * @param  string $page [description]
     * @return [type]       [description]
     */
    public function view(string $page)
    {
        $initModul = [
            'menu' => $this->menu->getMenu(),
            'modules' => $this->modules,
            'notif' => $this->notif,
        ];
        
        $this->data = array_merge($initModul, $this->data);

        echo view('template/header', $this->data);
        echo view('template/sidebar', $this->data);
        echo view($page, $this->data);
        echo view('template/footer', $this->data);
    }

    /**
     * Send data to view
     * @param array $data [description]
     */
    public function setData($data = []){
        $this->data = $data;
        return $this;
    }

    /**
     * Set modul untuk mengaktifkan menu
     * @param string $modules [description]
     */
    public function setModules(string $modules){
        $this->modules = $modules;
        return $this;
    }

    /**
     * Set notif untuk memunculkan notifikasi pada menu
     * @param string $modules [description]
     * @param int    $count   [description]
     */
    public function setNotif(string $modules, int $count){
        $this->notif = ['count' => $count, 'modules' => $modules];
        return $this;
    }

}
