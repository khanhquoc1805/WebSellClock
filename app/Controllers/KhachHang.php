<?php

namespace App\Controllers;

use App\Models\HangHoaModel;
use App\Models\KhachHangModel;
use \Firebase\JWT\JWT;

class KhachHang extends BaseController
{

	protected string $key = "this is a secret!!!";
	 
    public function dangki(){
        if(isset($_POST['taikhoan']) && isset($_POST['matkhau']) && isset($_POST['hokh']) && isset($_POST['tenkh'])
        && isset($_POST['gioitinh']) && isset($_POST['sdt']) && isset($_POST['diachi'])){

            $taikhoan = $_POST['taikhoan'];
            $matkhau = $_POST['matkhau']; 
            $hokh = $_POST['hokh']; 
            $tenkh = $_POST['tenkh'];
            $gioitinh = $_POST['gioitinh']; 
            $sdt = $_POST['sdt']; 
            $diachi = $_POST['diachi'];
            $model = new KhachHangModel();
            $model->themTaiKhoan($taikhoan, $matkhau, $hokh, $tenkh, $gioitinh, $sdt, $diachi);

            echo "<script>
            alert('Bạn đã đăng kí thành công!');
            document.location.href = '/KhachHang/dangnhap'
            </script>
            ";
        } else {
            echo view('UserPage/dangki');
        }
    }

    public function dangnhap(){
		if (!isset($_POST['taikhoan']) || !isset($_POST['matkhau'])) {
			if (isset($_COOKIE['dadangnhap'])) {
				echo "<script>document.location.href = '/';</script>";
				return;
			}
			echo view('UserPage/dangnhap');
			return;
		}
		// POST request handle
		$username = $_POST['taikhoan'];
		$password = $_POST['matkhau'];

		$model = new KhachHangModel();
		$dskhachhang = $model->getKhachHang();
		foreach ($dskhachhang as $row) {
			$taikhoan = $row["taikhoan"];
			$matkhaubam = $row["matkhau"];
			if ($username == $taikhoan) {
				// check password
				if (password_verify($password, $matkhaubam)) {
					$cookie_name = 'dadangnhap';
					$key = $this->key;
					$payload = array(
						'usr' => $taikhoan
					);
					$jwt = JWT::encode($payload, $key);

					setcookie($cookie_name, $jwt, time() + (86400 * 30), "/"); // 86400 = 1 day
					echo "<script>document.location.href = '/';</script>";
					return;
				};
			}
		}

        echo view ('UserPage/dangnhap');
	}


	public function dangxuat(){
		$cookie_name = 'dadangnhap';
		setcookie($cookie_name, '', time(), "/");
		echo "<script>document.location.href = '/';</script>";
	}
}

?>