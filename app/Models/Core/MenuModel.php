<?php

namespace App\Models\Core;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $menuRole = 'operator';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Ambil json menu pada folder writtable CI4 
     * @param  string $role [description]
     * @return [type]       [ bentuk nested array ]
     */
    public function getMenu($role = 'superadmin')
    {
        try {
            $res = file_get_contents(WRITEPATH . "menu/{$this->menuRole}.json");
            $res = json_decode($res);
        } catch (\Throwable $th) {
            $res = [];
        }

        $nestedMenu = [];

        foreach ($res as $key => $value) {
            $nestedMenu[$key + 1] = (object)array(
                'modules' =>  $value->navModul,
                'url' =>  $value->navUrl,
                'icon' =>  $value->navIcon,
                'label' =>  $value->navNama,
                'navParentid' =>  $value->navParentid,
                'navId' =>  $value->navId,
            );
        }

        // dd($nestedMenu);
        return $this->makeNested($nestedMenu);
    }

    /**
     * Membuat array list menjadi nested array
     * @param  [type] $source [description]
     * @return [type]         [description]
     */
    private function makeNested($source)
    {
        $nested = array();

        foreach ($source as &$s) {
            if (is_null($s->navParentid)) {
                $nested[] = &$s;
            } else {
                $pid = $s->navParentid;
                if (isset($source[$pid])) {

                    if (!isset($source[$pid]->child)) {
                        $source[$pid]->child = array();
                    }

                    $source[$pid]->child[] = &$s;
                }
            }
        }
        // dd($nested);
        return $nested;
    }

    /**
     * Model menu untuk insert ke database
     * @param  [type] $idNav    [description]
     * @param  [type] $value    [description]
     * @param  [type] $idParent [description]
     * @return [type]           [description]
     */
    private function menuModel($idNav, $value, $idParent = null)
    {
        // echo "<pre>";
        // print_r($value);
        // echo "</pre>";
        return array(
            'navId' => $idNav,
            'navNama' => $value['label'],
            'navUrl' => $value['url'],
            'navIcon' => $value['icon'],
            'navModul' => $value['modules'],
            'navParentid' => $idParent,
        );
    }

    function menuRekursif($data, $idNav, $parntNav)
    {
        $list = [];
        foreach ($data as $value) {
            if (!isset($value['children'])) {
                $list[] = $this->menuModel($idNav, $value, $parntNav);
                $idNav++;

                $this->menuRekursif($value, $idNav, $parntNav);
            } else {

                $list[] = $this->menuModel($idNav, $value, $parntNav);
                $idNav++;

                // $this->menuRekursif($value, $idNav, $parntNav);
            }
        }

        return $list;
    }

    /**
     * Update menu navigasi dengan menghapus dan menambahkan kembali ke tabel database
     * @param  array  $data [description]
     * @return [type]       [description]
     */
    function updateMenu($data = [])
    {
        helper('filesystem');
        $listMenu = [];
        $idNav = 1;

        // $res = $this->menuRekursif($data, $idNav, null);
        // // dd($res);
        // echo "<pre>";
        // print_r($res);
        // echo "</pre>";
        // exit;

        foreach ($data as $valueFirst) {
            if (!isset($valueFirst['children'])) {
                $listMenu[] = $this->menuModel($idNav, $valueFirst);

                $idNav++;
            } else {
                $parentNavSecond = $idNav;

                $listMenu[] = $this->menuModel($idNav, $valueFirst);

                $idNav++;

                foreach ($valueFirst['children'] as $valueSecond) {
                    if (!isset($valueSecond['children'])) {
                        $listMenu[] = $this->menuModel($idNav, $valueSecond, $parentNavSecond);

                        $idNav++;
                    } else {
                        $parentNavThird = $idNav;

                        $listMenu[] = $this->menuModel($idNav, $valueSecond, $parentNavSecond);

                        $idNav++;

                        foreach ($valueSecond['children'] as $valueThird) {
                            $listMenu[] = $this->menuModel($idNav, $valueThird, $parentNavThird);

                            $idNav++;
                        }
                    }
                }
            }
        }

        // echo "<pre>";
        // print_r($listMenu);
        // echo "</pre>";
        // exit;

        write_file(WRITEPATH . "menu/{$this->menuRole}.json", json_encode($listMenu, JSON_PRETTY_PRINT));

        return $listMenu;
    }
}