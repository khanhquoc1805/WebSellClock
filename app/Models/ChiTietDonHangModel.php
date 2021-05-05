<?php
namespace App\Models;

use CodeIgniter\Model;

class ChiTietDonHangModel extends Model
{
    protected $table = 'chitietdonhang';
    protected $primaryKey = ['iddonhang', 'idhanghoa'];
    protected $allowedFields = [
        'iddonhang', 'idhanghoa', 'soluong', 'thanhtien'
    ];// nhung truong cho phep
    protected $useSoftDeletes = false;

    public function createChiTietDonHang($iddonhang,$idhanghoa,$soluong,$thanhtien){
        $data = [
            'iddonhang' => $iddonhang,
            'idhanghoa' => $idhanghoa,
            'soluong' => $soluong,
            'thanhtien' => $thanhtien,
        ];
        $this->insert($data);
    }

    public function getChiTietDonHang($iddonhang){
        return $this->where('iddonhang', $iddonhang)->findAll();
    }

    public function deleteChiTiet($iddonhang) {
        return $this->where('iddonhang', $iddonhang)->delete();
    }

}

?>