<?php
namespace App\Models;

use CodeIgniter\Model;

class HangHoaModel extends Model
{
    protected $table = 'hanghoa';
    protected $primaryKey = 'idhanghoa';
    protected $allowedFields = [
        'idhanghoa', 'tenhanghoa', 'gia', 'phai','soluong', 'image'
    ];// nhung truong cho phep
    protected $useSoftDeletes = false;

    public function getHangHoa($slug = false)
    {
        if ($slug === false)
        {
            return $this->findAll();
        }

        return $this->asArray()
                    ->where(['slug' => $slug])
                    ->first();
    }

    public function getHangHoaTheoMa($ma) {
        return $this->where('idhanghoa', $ma)->first();
    }

    public function themHangHoa($ma, $ten, $gia, $hinh){
        $data = [
            'idhanghoa' => $ma,
            'tenhanghoa' => $ten,
            'gia' => (float)$gia,
            'hinhanh' => $hinh
        ];
        $this->insert($data);
    }

    public function xoaHangHoa($ma) {
            $this->delete($ma);
    }
}

?>