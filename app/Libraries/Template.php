<?php

namespace App\Libraries;

use App\Models\Core\MenuModel;

class Template
{
    protected $data = [];

    /**
     * For active menu sidebar
     * @var [type]
     */
    protected $modules;

    /**
     * For count notif sidebar
     * @var [type]
     */
    protected $notif = array(
        ['count' => 2, 'modules' => 'jalur_masuk'],
        ['count' => 10, 'modules' => '9'],
        ['count' => 99, 'modules' => 'bypass'],
        ['count' => 5, 'modules' => 'panduan'],
        ['count' => 5, 'modules' => 'navigasi2'],
    );

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
    public function setData($data = [])
    {
        $this->data = $data;
        return $this;
    }

    /**
     * Set modul untuk mengaktifkan menu
     * @param string $modules [description]
     */
    public function setModules(string $modules)
    {
        $this->modules = $modules;
        return $this;
    }

    const TEXTBOX   = 'textbox';
    const TEXTAREA  = 'textarea';
    const CHECKBOX  = 'checkbox';
    const DROPDOWN  = 'dropdown';

    /**
     * Tampung semua field input
     * @var string
     */
    public $_allFieldInput = '';

    /**
     * layout vertikal dan horizontal
     * @var string
     */
    private $_layout = 'vertical';

    function setVertical()
    {
        $this->_layout = 'vertical';
        return $this;
    }

    function setHorizontal()
    {
        $this->_layout = 'horizontal';
        return $this;
    }

    function getLayout()
    {
        return $this->_layout;
    }

    /**
     * [modifData description]
     * @param  [array] &$data [description]
     * @return [type]        [description]
     */
    function modifData(&$data)
    {
        helper('form');

        $data['layout']         = $this->_layout;

        $data['inputType']      = $data['inputType'] ?? 'textbox';
        $data['data']           = $data['data'] ?? array();
        $data['type']           = $data['type'] ?? 'text';
        $data['field']          = $data['field'] ?? null;
        $data['placeholder']    = $data['placeholder'] ?? '';
        $data['label']          = $data['label'] ?? 'Default';
        $data['attribute']      = $data['attribute'] ?? array();
        $data['required']       = @strstr($data['rules'], 'required') ? '<span class="text-danger">*</span>' : '';
        $data['addon']          = $data['addon'] ?? NULL;
        $data['rounded']        = @$data['rounded'] ? 'rounded' : NULL;

        $this->_allFieldInput   .= view('template/form/input', (array)$data);

        return $this;
    }


    /**
     * Menambahkan textbox
     * Ex. $this->layout->addTextbox(['label' => 'Nama Jalur', 'field' => 'jalurNama', 'type' => 'text', 'required' => true]);
     * @param array $data [description]
     */
    function addTextbox($data = array())
    {
        $data['inputType'] = self::TEXTBOX;

        $this->modifData($data);
    }

    function addTextarea($data = array())
    {
        $data['inputType'] = self::TEXTAREA;

        $this->modifData($data);
    }

    function addCheckbox($data = array())
    {
        $data['inputType'] = self::CHECKBOX;

        $this->modifData($data);
    }

    function addDropdown($data = array())
    {
        $data['inputType'] = self::DROPDOWN;

        $this->modifData($data);
    }

    function generateForm($batch = null)
    {
        if (is_array($batch)) {
            foreach ($batch as $key => $array) {
                $this->modifData($array);
            }
        }

        return $this->_allFieldInput;
    }
}
