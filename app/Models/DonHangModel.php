<?php
namespace App\Models;

use CodeIgniter\Model;

class DonHangModel extends Model
{
    protected $table = 'donhang';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'taikhoan', 'tonggiatri', 'trangthai', 'thanhtoan',
    ]; // nhung truong cho phep
    protected $useSoftDeletes = false;

    public function createDonHang($taikhoan, $tonggiatri, $trangthai, $chuthich)
    {
        $data = [
            'taikhoan' => $taikhoan,
            'tonggiatri' => $tonggiatri,
            'trangthai' => $trangthai,
            'chuthich' => $chuthich,
        ];
        return $this->insert($data);
    }
    public function getDsDonHang()
    {
        return $this->findAll();
    }

    public function getdsdonhangtheotaikhoan($taikhoan)
    {
        return $this->where('taikhoan', $taikhoan)->orderBy("id", "desc")->findAll();
    }

    public function updateTrangThai($iddonhang, $trangthai)
    {
        $data = [
            'trangthai' => $trangthai,
        ];

        $this->update($iddonhang, $data);
    }

    public function deleteDonHang($iddonhang){
        return $this->delete($iddonhang);
    }
}
