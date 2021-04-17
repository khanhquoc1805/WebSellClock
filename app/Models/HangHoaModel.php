<?php
namespace App\Models;

use CodeIgniter\Model;

class HangHoaModel extends Model
{
    protected $table = 'hanghoa';
    protected $primaryKey = 'idhanghoa';
    protected $allowedFields = [
        'idthuonghieu','idhanghoa', 'tenhanghoa', 'gia', 'phai','soluong', 'image'
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


    public function themHangHoa($idthuonghieu, $idsanpham, $tensanpham, $phai, $gia, $soluong, $hinhanh){
        $data = [
            'idthuonghieu' => $idthuonghieu,
            'idhanghoa' => $idsanpham,
            'tenhanghoa' => $tensanpham,
            'phai' => $phai,
            'gia' => (float)$gia,
            'soluong' => $soluong,
            'image' => $hinhanh
        ];
        $this->insert($data);
    }

    public function deleteHangHoa($idsanpham) {
        $this->delete($idsanpham);
    }
}

?>