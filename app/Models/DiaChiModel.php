<?php
namespace App\Models;

use CodeIgniter\Model;

class DiaChiModel extends Model
{
    protected $table = 'diachi';
    protected $primaryKey = 'id_diachi';
    protected $allowedFields = [
        'tendiachi'
    ]; // nhung truong cho phep
    protected $useSoftDeletes = false;

    public function createDiaChi($tendiachi){

        $data = [
            "tendiachi" => $tendiachi
        ];
        return $this->insert($data);
    }


}