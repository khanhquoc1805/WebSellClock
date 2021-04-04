<?php
namespace App\Models;

use CodeIgniter\Model;

class ChiTietGioHangModel extends Model
{
    protected $table = 'chitietgiohang';
    protected $primaryKey = ['idgiohang', 'idhanghoa'];
    protected $allowedFields = [
        'idgiohang', 'idhanghoa', 'soluong', 'thanhtien'
    ];// nhung truong cho phep
    protected $useSoftDeletes = false;


    public function createChiTietGioHang($idgiohang,$idhanghoa,$soluong,$thanhtien){
        $data = [
            'idgiohang' => $idgiohang,
            'idhanghoa' => $idhanghoa,
            'soluong' => $soluong,
            'thanhtien' => $thanhtien
        ];
        $this->insert($data);
    }

    public function getChitietGiohang($idgiohang){
        return $this->where('idgiohang', $idgiohang)->findAll();
    }









}

?>

