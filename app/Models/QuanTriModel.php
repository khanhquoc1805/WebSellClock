<?php
namespace App\Models;

use CodeIgniter\Model;

class QuanTriModel extends Model
{
    protected $table = 'quantri';
    protected $primaryKey = 'taikhoan';
    protected $allowedFields = [
        'taikhoan', 'matkhau'
    ];// nhung truong cho phep

    public function getAdmin($slug = false)
    {
        if ($slug === false)
        {
            return $this->findAll();
        }

        return $this->asArray()
                    ->where(['slug' => $slug])
                    ->first();
    }

    
}