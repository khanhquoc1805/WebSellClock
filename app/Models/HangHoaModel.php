<?php
namespace App\Models;

use CodeIgniter\Model;

class HangHoaModel extends Model
{
    protected $table = 'hanghoa';
    protected $primaryKey = 'madongho';
    protected $allowedFields = [
        'madongho', 'tendongho', 'gia', 'image'
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
        return $this->where('madongho', $ma)->first();
    }

    public function themHangHoa($ma, $ten, $gia, $hinh){
        $data = [
            'madongho' => $ma,
            'tendongho' => $ten,
            'gia' => (float)$gia,
            'image' => $hinh
        ];
        $this->insert($data);
    }

    public function xoaHangHoa($ma) {
            $this->delete($ma);
    }
}

?>