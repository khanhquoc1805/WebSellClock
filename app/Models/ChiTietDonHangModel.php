<?php
namespace App\Models;

use CodeIgniter\Model;

class ChiTietDonHangModel extends Model
{
    protected $table = 'chitietdonhang';
    protected $primaryKey = ['iddonhang', 'idhanghoa'];
    protected $allowedFields = [
        'iddonhang', 'idhanghoa', 'soluong', 'thanhtien', 'trangthai'
    ]; // nhung truong cho phep
    protected $useSoftDeletes = false;

    public function createChiTietDonHang($iddonhang, $idhanghoa, $soluong, $thanhtien)
    {
        $data = [
            'iddonhang' => $iddonhang,
            'idhanghoa' => $idhanghoa,
            'soluong' => $soluong,
            'thanhtien' => $thanhtien,
        ];
        $this->insert($data);
    }

    public function getChiTietDonHang($iddonhang)
    {
        return $this->where('iddonhang', $iddonhang)->findAll();
    }

    public function deleteChiTiet($iddonhang)
    {
        return $this->where('iddonhang', $iddonhang)->delete();
    }

    public function delete_single_ChiTiet($iddonhang, $idhanghoa)
    {
        $this->where('iddonhang', $iddonhang);
        $this->where('idhanghoa', $idhanghoa);
        $this->set(['trangthai' => "Đã Xóa"]);
        $this->update();
    }

}
