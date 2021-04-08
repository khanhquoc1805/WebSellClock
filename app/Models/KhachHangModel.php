<?php
namespace App\Models;

use CodeIgniter\Model;

class KhachHangModel extends Model
{
    protected $table = 'khachhang';
    protected $primaryKey = 'taikhoan';
    protected $allowedFields = [
        'taikhoan', 'matkhau', 'hokh', 'tenkh', 'gioitinh' , 'sdt', 'diachi', 'anhdaidien'
    ];// nhung truong cho phep
    protected $useSoftDeletes = false;



    public function themTaiKhoan($taikhoan,$matkhau,$hokh,$tenkh,$gioitinh,$sdt,$diachi,$anhdaidien = '') {
        $matkhaudabam = password_hash($matkhau, PASSWORD_BCRYPT);
        $data = [
            'taikhoan' => $taikhoan,
            'matkhau' => $matkhaudabam,
            'hokh' => $hokh,
            'tenkh' => $tenkh,
            'gioitinh' => $gioitinh,
            'sdt' => $sdt,
            'diachi' => $diachi,
            'anhdaidien' => $anhdaidien
        ];
        $this->insert($data);
    }


    public function getKhachHang($idkhachhang = false)
    {
        if ($idkhachhang === false)
        {
            return $this->findAll();
        }

        return $this->asArray()
                    ->where(['taikhoan' => $idkhachhang])
                    ->first();
    }

}

    