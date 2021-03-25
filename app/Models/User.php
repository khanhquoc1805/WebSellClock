<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['name', 'email'];
    protected $returnType     = 'array';

    public function test() {
        $data = [
            'username' => 'darth',
            'email'    => 'd.vader@theempire.com'
        ];
        
        $userModel->insert($data); 
    }
}

?>