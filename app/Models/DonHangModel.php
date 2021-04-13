<?php
namespace App\Models;

use CodeIgniter\Model;

class DonHangModel extends Model
{
    protected $table = 'donhang';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'taikhoan', 'tonggiatri', 'trangthai','thanhtoan'
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
    public function getDsDonHang(){
        return $this->findAll();
    }
}
