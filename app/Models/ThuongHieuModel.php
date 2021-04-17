<?php
namespace App\Models;

use CodeIgniter\Model;

class ThuongHieuModel extends Model
{
    protected $table = 'thuonghieu';
    protected $primaryKey = 'idthuonghieu';
    protected $allowedFields = [
        'idthuonghieu', 'tenthuonghieu', 'logo'
    ];
    protected $useSoftDeletes = false;

    public function getThuongHieu($idthuonghieu = false)
    {
        if ($idthuonghieu === false)
        {
            return $this->findAll();
        }

        return $this->asArray()
                    ->where(['idthuonghieu' => $idthuonghieu])
                    ->first();
    }

    public function addThuongHieu($idthuonghieu,$tenthuonghieu,$logothuonghieu){
        $data = [
            'idthuonghieu' => $idthuonghieu,
            'tenthuonghieu' => $tenthuonghieu,
            'logo' => $logothuonghieu,
        ];
        $this->insert($data);
    }

    public function deleteThuongHieu($idthuonghieu) {
        $this->delete($idthuonghieu);
    }
}

?>