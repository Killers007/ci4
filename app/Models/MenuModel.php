<?php 

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table      = 'lmmc_nav';
    protected $primaryKey = 'navId';

    protected $useSoftDeletes = false;

    protected $returnType     = 'object';
    protected $allowedFields = ['name', 'email'];

    protected $useTimestamps = true;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Ambil semua menu pada database 
     * @param  string $role [description]
     * @return [type]       [ bentuk nested array ]
     */
    public function getMenu($role = 'superadmin')
    {
        $this->select('navNama as label, navIcon as icon, navUrl as url, navId, navParentid, navModul as modules');
        $this->join('hak_akses', 'modul = navModul', 'left');

        if ($role != 'superadmin')
        {
            $this->groupStart();
            $this->where('role', $role);
            $this->where('hak', 'BACA');
            $this->groupEnd();
        }
        else
        {
            $this->orWhere('navModul !=', '');
        }

        $this->orWhere('navModul', '');

        $this->orderBy('navId', 'asc');
        $data = $this->find();
        
        $res = [];

        foreach ($data as $key => $value) {
            $res[$value->navId] = $value;
        }

        return $this->makeNested($res);
    }

    /**
     * Membuat array list menjadi nested array
     * @param  [type] $source [description]
     * @return [type]         [description]
     */
    private function makeNested($source) 
    {
        $nested = array();

        foreach ( $source as &$s ) {
            if ( is_null($s->navParentid) ) {
                $nested[] = &$s;
            }
            else {
                $pid = $s->navParentid;
                if ( isset($source[$pid]) ) {

                    if ( !isset($source[$pid]->child) ) {
                        $source[$pid]->child = array();
                    }

                    $source[$pid]->child[] = &$s;
                }
            }
        }
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
        return array(
                    'navId' => $idNav,
                    'navNama' => $value['label'],
                    'navUrl' => $value['url'],
                    'navIcon' => $value['icon'],
                    'navModul' => $value['modules'],
                    'navParentid' => $idParent,
                );
    }

    /**
     * Update menu navigasi dengan menghapus dan menambahkan kembali ke tabel database
     * @param  array  $data [description]
     * @return [type]       [description]
     */
    function updateMenu($data = [])
    {
        $listMenu = [];
        $idNav = 1;

        foreach ($data as $key => $valueFirst) 
        {
            if (!isset($valueFirst['children'])) 
            {
                $listMenu[] = $this->menuModel($idNav, $valueFirst);

                $idNav++;
            }
            else
            {
                $parentNavSecond = $idNav;

                $listMenu[] = $this->menuModel($idNav, $valueFirst);

                $idNav++;

                foreach ($valueFirst['children'] as $key => $valueSecond) 
                {
                    if (!isset($valueSecond['children'])) 
                    {
                        $listMenu[] = $this->menuModel($idNav, $valueSecond, $parentNavSecond);

                        $idNav++;
                    }
                    else
                    {
                        $parentNavThird = $idNav;

                        $listMenu[] = $this->menuModel($idNav, $valueSecond, $parentNavSecond);

                        $idNav++;

                        foreach ($valueSecond['children'] as $key => $valueThird) 
                        {
                            $listMenu[] = $this->menuModel($idNav, $valueThird, $parentNavThird);

                            $idNav++;
                        }
                    }
                }
            }
        }

        $this->truncate();
        $this->insertBatch($listMenu);

        return $listMenu;
    }

}