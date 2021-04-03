<?php
namespace App\Models;

use CodeIgniter\Model;

class GioHangModel extends Model
{
    protected $table = 'giohang';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'idkhachhang', 'tonggiatri'
    ];// nhung truong cho phep
    protected $useSoftDeletes = false;

    public function createGioHang($idkhachhang){
        $data = [
            'idkhachhang' => $idkhachhang
        ];
        $this->insert($data);
    }
}

?>