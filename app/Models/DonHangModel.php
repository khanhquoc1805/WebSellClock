<?php
namespace App\Models;

use CodeIgniter\Model;

class GioHangModel extends Model
{
    protected $table = 'donhang';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'taikhoan', 'tonggiatri','trangthai'
    ];// nhung truong cho phep
    protected $useSoftDeletes = false;

    public function createDonHang($taikhoan,$tonggiatri,$trangthai){
        $data = [
            'taikhoan' => $taikhoan,
            'tonggiatri' => $tonggiatri,
            'trangthai' => $trangthai
        ];
        $this->insert($data);

    }
}

?>