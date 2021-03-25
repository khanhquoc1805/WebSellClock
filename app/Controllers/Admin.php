<?php

namespace App\Controllers;

use App\Models\HangHoaModel;

class Admin extends BaseController
{
	public function index()
	{
		echo view('Admin/admin');
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

}
