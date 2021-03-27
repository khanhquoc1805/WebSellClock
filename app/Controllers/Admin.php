<?php

namespace App\Controllers;

use App\Models\HangHoaModel;
use App\Models\QuanTriModel;

class Admin extends BaseController
{
	public function home()
	{
		// kiem tra da dang nhap
		if (isset($_COOKIE['dadangnhap'])) {
			if ($_COOKIE['dadangnhap'] == true) {
				echo view('Admin/admin');
				return;
			}
		}
		echo view("Admin/dangnhap");
	}

	public function dangnhap(){
		if (!isset($_POST['taikhoan']) || !isset($_POST['matkhau'])) {
			if (isset($_COOKIE['dadangnhap'])) {
				echo view("Admin/admin");
				return;
			}
			echo view('Admin/dangnhap');
			return;
		}
		// POST request handle
		$username = $_POST['taikhoan'];
		$password = $_POST['matkhau'];

		$model = new QuanTriModel();
		$dsadmin = $model->getAdmin();
		foreach ($dsadmin as $row) {
			$taikhoan = $row["taikhoan"];
			$matkhaubam = $row["matkhau"];
			if ($username == $taikhoan) {
				// check password
				if (password_verify($password, $matkhaubam)) {
					$cookie_name = 'dadangnhap';
					$cookie_value = true;
					setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
					echo view("Admin/admin.php");
					return;
				};
			}
		}

		
	}

	public function add_product() {
		if (!isset($_POST['masanpham'])
		|| !isset($_POST['tensanpham'])
		|| !isset($_POST['gia'])
		|| !isset($_POST['hinhanh'])) {
			echo view("Admin/add");
		} else {
			$ma = $_POST['masanpham'];
			$ten = $_POST['tensanpham'];
			$gia = $_POST['gia'];
			$hinhanh = $_POST['hinhanh'];
			// add to db
			$model = new HangHoaModel();
			$model->themHangHoa($ma, $ten, $gia, $hinhanh);

			$data['ketqua'] = 'success';
			echo view("Admin/add", $data);
		}
	}

    // domain/admin/delete_product/$ma
	public function delete_product($ma = 'default') {
		if ($ma == 'default') {
			// lay danh sach dong ho
			$model = new HangHoaModel();
			$dongho = $model->getHangHoa();
			$data["dsdongho"] = $dongho;
			echo view("Admin/delete", $data);
		} else {
			$model = new HangHoaModel();
			$model->xoaHangHoa($ma);
			$data['madongho'] = $ma;
			echo view("Admin/delete_single_item", $data);
		}
	}

	public function logout() {
		$cookie_name = "dadangnhap";
		$cookie_value = false;
		setcookie($cookie_name, $cookie_value, time() + 1, "/");
		echo "<script>document.location.href = '/admin/dangnhap';</script>";
	}

}
