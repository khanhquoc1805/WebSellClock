<?php
namespace App\Models;

use CodeIgniter\Model;

class ThongTinHangHoaModel extends Model
{
    protected $table = 'thongtinsanpham';
    // protected $primaryKey = ['iddonhang', 'idhanghoa'];
    protected $allowedFields = [
        'idhanghoa', "kieumay", "nguongoc", "chatlieuvo", "kichco",
        "chatlieuday", "chatlieukinh", "baohiem",
    ]; // nhung truong cho phep
    protected $useSoftDeletes = false;

    public function themthongtin($idhanghoa, $kieumay, $nguongoc, $chatlieuvo, $kichco, $chatlieuday, $chatlieukinh, $baohiem)
    {
        $data = [
            'idhanghoa' => $idhanghoa,
            'kieumay' => $kieumay,
            'nguongoc' => $nguongoc,
            'chatlieuvo' => $chatlieuvo,
            'kichco' => $kichco,
            'chatlieuday' => $chatlieuday,
            'chatlieukinh' => $chatlieukinh,
            'baohiem' => $baohiem
        ];
        $this->insert($data);
    }

    public function getThongTinHangHoa($idhanghoa){
        return $this->where('idhanghoa', $idhanghoa)->first();
    }

}
